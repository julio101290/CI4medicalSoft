<?php

namespace julio101290\boilerplate\Controllers\Users;

use julio101290\boilerplate\Controllers\BaseController;
use julio101290\boilerplate\Entities\Collection;
use julio101290\boilerplate\Models\GroupModel;
use julio101290\boilerplate\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Authorization\PermissionModel;
use Myth\Auth\Entities\User;

/**
 * Class UserController.
 */
class UserController extends BaseController
{
    use ResponseTrait;

    /** @var \julio101290\boilerplate\Models\UserModel */
    protected $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return mixed
     */
    public function index()
    {
        if ($this->request->isAJAX()) {
            $start  = $this->request->getGet('start');
            $length = $this->request->getGet('length');
            $search = $this->request->getGet('search[value]');
            $order  = UserModel::ORDERABLE[$this->request->getGet('order[0][column]')] ?? 'id';
            $dir    = $this->request->getGet('order[0][dir]');

            return $this->respond(Collection::datatable(
                $this->users->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject(),
                $this->users->getResource()->countAllResults(),
                $this->users->getResource($search)->countAllResults()
            ));
        }

        return view('julio101290\boilerplate\Views\User\index', [
            'title'    => lang('boilerplate.user.title'),
            'subtitle' => lang('boilerplate.user.subtitle'),
        ]);
    }

    /**
     * Show profile user or update.
     *
     * @return mixed
     */
    public function profile()
    {
        $userId = user()->id;

        if (strtoupper($this->request->getMethod()) === 'POST') {
            $validationRules = [
                'email'         => "required|valid_email|is_unique[users.email,id,$userId]",
                'username'      => "required|alpha_numeric_space|min_length[3]|is_unique[users.username,id,$userId]",
                'phone'         => 'if_exist|max_length[32]',
                'password'      => 'if_exist',
                'pass_confirm'  => 'matches[password]',
                'profile_image' => 'if_exist|is_image[profile_image]|max_size[profile_image,2048]',
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $user = new \Myth\Auth\Entities\User();

            if ($this->request->getPost('password')) {
                $user->password = $this->request->getPost('password');
            }

            $user->email    = $this->request->getPost('email');
            $user->username = $this->request->getPost('username');

            if ($this->request->getPost('phone') !== null) {
                $user->phone = $this->request->getPost('phone');
            }

            $uploadPath = WRITEPATH . 'uploads/profiles/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image = $this->request->getFile('profile_image');
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $uploadPath          = WRITEPATH . 'uploads/profiles';
                $imageName           = $image->getRandomName();
                $image->move($uploadPath, $imageName);
                $user->profile_image = 'uploads/profiles/' . $imageName;
            } else {
                $currentUser         = $this->users->asArray()->find($userId);
                $user->profile_image = $currentUser['profile_image'] ?? null;
            }

            if ($this->users->skipValidation(true)->update($userId, $user)) {
                return redirect()->back()->with('sweet-success', lang('boilerplate.user.msg.msg_update'));
            }

            return redirect()->back()->withInput()->with('sweet-error', lang('boilerplate.user.msg.msg_get_fail'));
        }

        $currentUser = $this->users->find($userId);
        $publicPath  = FCPATH . 'uploads/profiles/';

        if (!is_dir($publicPath)) {
            mkdir($publicPath, 0755, true);
        }

        if (!empty($currentUser->profile_image)) {
            $imageName  = basename($currentUser->profile_image);
            $sourcePath = WRITEPATH . $currentUser->profile_image;
            $destPath   = $publicPath . $imageName;

            if (file_exists($sourcePath) && !file_exists($destPath)) {
                copy($sourcePath, $destPath);
            }

            $currentUser->profile_image = 'uploads/profiles/' . $imageName;
        }

        if ($currentUser->profile_image == 'uploads/profiles/') {
            unset($currentUser->profile_image);
        }

        return view('julio101290\boilerplate\Views\User\profile', [
            'title' => lang('boilerplate.user.fields.profile'),
            'user'  => $currentUser,
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title'       => lang('boilerplate.user.title'),
            'subtitle'    => lang('boilerplate.user.add'),
            'permissions' => $this->authorize->permissions(),
            'permission'  => (new PermissionModel())->getPermissionsForUser(-1) ?? [],
            'roles'       => $this->authorize->groups(),
            'role'        => (new GroupModel())->getGroupsForUser(-1) ?? [],
            'user'        => $this->users->asArray()->find(-1) ?? [
                'firstname' => '',
                'lastname'  => '',
                'phone'     => '',
                'active'    => 1,
                'email'     => '',
                'username'  => '',
            ],
        ];

        return view('julio101290\boilerplate\Views\User\create', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return mixed
     */
    public function create()
    {
        $validationRules = [
            'active'       => 'required',
            'username'     => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
            'email'        => 'required|valid_email|is_unique[users.email]',
            'phone'        => 'permit_empty|max_length[32]',
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
            'permission'   => 'required',
            'role'         => 'required',
        ];

        $permissions = $this->request->getPost('permission') ?? [];
        $roles       = $this->request->getPost('role') ?? [];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('admin/user/manage/new'))
                ->withInput()
                ->with('error', $this->validator->getErrors());
        }

        $this->db->transBegin();

        try {
            $id = $this->users->insert(new User([
                'active'    => $this->request->getPost('active'),
                'email'     => $this->request->getPost('email'),
                'firstname' => $this->request->getPost('firstname'),
                'lastname'  => $this->request->getPost('lastname'),
                'phone'     => $this->request->getPost('phone'),
                'username'  => $this->request->getPost('username'),
                'password'  => $this->request->getPost('password'),
            ]));

            foreach ($permissions as $permission) {
                $this->authorize->addPermissionToUser($permission, $id);
            }

            foreach ($roles as $role) {
                $this->authorize->addUserToGroup($id, $role);
            }

            $this->db->transCommit();
        } catch (\Exception $e) {
            $this->db->transRollback();
            return redirect()->back()->withInput()->with('sweet-error', $e->getMessage());
        }

        return redirect()->to(base_url('admin/user/manage'))
            ->with('sweet-success', lang('boilerplate.user.msg.msg_insert'));
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        $data = [
            'title'       => lang('boilerplate.user.title'),
            'subtitle'    => lang('boilerplate.user.edit'),
            'permissions' => $this->authorize->permissions(),
            'permission'  => (new PermissionModel())->getPermissionsForUser($id),
            'roles'       => $this->authorize->groups(),
            'role'        => (new GroupModel())->getGroupsForUser($id),
            'user'        => $this->users->asArray()->find($id),
        ];

        return view('julio101290\boilerplate\Views\User\update', $data);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function clone($id)
    {
        $data = [
            'title'       => lang('boilerplate.user.title'),
            'subtitle'    => lang('boilerplate.user.add'),
            'permissions' => $this->authorize->permissions(),
            'permission'  => (new PermissionModel())->getPermissionsForUser($id),
            'roles'       => $this->authorize->groups(),
            'role'        => (new GroupModel())->getGroupsForUser($id),
            'user'        => $this->users->asArray()->find($id),
        ];

        return view('julio101290\boilerplate\Views\User\create', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function update($id)
    {
        $validationRules = [
            'active'       => 'required',
            'username'     => "required|alpha_numeric_space|min_length[3]|is_unique[users.username,id,$id]",
            'email'        => "required|valid_email|is_unique[users.email,id,$id]",
            'phone'        => 'permit_empty|max_length[32]',
            'password'     => 'if_exist',
            'pass_confirm' => 'matches[password]',
            'permission'   => 'if_exist',
            'role'         => 'if_exist',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $this->db->transBegin();

        try {
            $user = new User();

            if ($this->request->getPost('password')) {
                $user->password = $this->request->getPost('password');
            }

            $user->active    = $this->request->getPost('active');
            $user->email     = $this->request->getPost('email');
            $user->username  = $this->request->getPost('username');
            $user->firstname = $this->request->getPost('firstname');
            $user->lastname  = $this->request->getPost('lastname');
            $user->phone     = $this->request->getPost('phone');

            $this->users->skipValidation(true)->update($id, $user);

            $this->db->table('auth_users_permissions')->where('user_id', $id)->delete();

            foreach (($this->request->getPost('permission') ?? []) as $permission) {
                $this->authorize->addPermissionToUser($permission, $id);
            }

            $this->db->table('auth_groups_users')->where('user_id', $id)->delete();

            foreach (($this->request->getPost('role') ?? []) as $role) {
                $this->authorize->addUserToGroup($id, $role);
            }

            $this->db->transCommit();
        } catch (\Exception $e) {
            $this->db->transRollback();
            return redirect()->to(base_url('admin/user/manage'))->with('sweet-error', $e->getMessage());
        }

        return redirect()->to(base_url('admin/user/manage'))->with('sweet-success', lang('boilerplate.user.msg.msg_update'));
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        if (!$found = $this->users->delete($id)) {
            return $this->failNotFound(lang('boilerplate.user.msg.msg_get_fail'));
        }

        return $this->respondDeleted($found, lang('boilerplate.user.msg.msg_delete'));
    }
}