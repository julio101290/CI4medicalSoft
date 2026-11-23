<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-4">
        <form action="<?= route_to('profile') ?>" method="post" enctype="multipart/form-data">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <?php
                    $profileImage = user()->profile_image;

                    // Verificar si existe el archivo en el servidor
                    if (!$profileImage || !file_exists(FCPATH . $profileImage)) {
                        $profileImage = 'https://cdn.jsdelivr.net/npm/admin-lte@3.0.2/dist/img/avatar.png';
                    } else {
                        $profileImage = base_url($profileImage);
                    }
                    ?>
                    <div class="text-center position-relative" style="width:150px; margin:auto;">
                        <img id="profileImage" class="profile-user-img img-fluid img-circle"
                             src="<?= $profileImage ?>"
                             alt="User profile picture"
                             style="cursor:pointer;">

                        <!-- Ícono de lápiz -->
                        <div id="editIcon" style="
                             position:absolute;
                             bottom:0;
                             right:0;
                             background:#007bff;
                             color:white;
                             width:35px;
                             height:35px;
                             border-radius:50%;
                             display:flex;
                             align-items:center;
                             justify-content:center;
                             cursor:pointer;
                             border:2px solid white;
                             ">
                            <i class="fas fa-pencil-alt"></i>
                        </div>

                        <!-- Input oculto -->
                        <input type="file" name="profile_image" id="profileImageInput" class="d-none" accept="image/*">
                    </div>

                    <h3 class="profile-username text-center"><?= user()->username ?></h3>
                    <p class="text-muted text-center"><i class="far fa-fw fa-envelope"></i><?= user()->email ?></p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b><?= lang('boilerplate.user.fields.join') ?></b> 
                            <a class="float-right">
                                <?= user()->created_at->toLocalizedString('MMM d, yyyy') . ' ' . user()->created_at->humanize() ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-8">
        <div class="card card-outline">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><?= lang('boilerplate.user.fields.setting') ?></a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <!-- /.tab-pane -->
                    <div class="tab-pane active" id="settings">



                        <?= csrf_field() ?>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label"><?= lang('Auth.email') ?></label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control <?= session('error.email') ? 'is-invalid' : '' ?>" value="<?= user()->email ?>" placeholder="<?= lang('Auth.email') ?>" autocomplete="off">
                                    <?php if (session('error.email')) { ?>
                                        <div class="invalid-feedback">
                                            <h6><?= session('error.email') ?></h6>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label"><?= lang('Auth.username') ?></label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control <?= session('error.username') ? 'is-invalid' : '' ?>" value="<?= user()->username ?>" placeholder="<?= lang('Auth.username') ?>" autocomplete="off">
                                    <?php if (session('error.username')) { ?>
                                        <div class="invalid-feedback">
                                            <h6><?= session('error.username') ?></h6>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-3 col-form-label"><?= lang('Auth.password') ?></label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control <?= session('error.password') ? 'is-invalid' : '' ?>" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    <?php if (session('error.password')) { ?>
                                        <div class="invalid-feedback">
                                            <h6><?= session('error.password') ?></h6>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-3 col-form-label"><?= lang('Auth.repeatPassword') ?></label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" name="pass_confirm" class="form-control <?= session('error.pass_confirm') ? 'is-invalid' : '' ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    <?php if (session('error.pass_confirm')) { ?>
                                        <div class="invalid-feedback">
                                            <h6><?= session('error.pass_confirm') ?></h6>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="float-right">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-sm btn-block btn-primary">
                                            <?= lang('boilerplate.global.save') ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    const profileImage = document.getElementById('profileImage');
    const profileInput = document.getElementById('profileImageInput');
    const editIcon = document.getElementById('editIcon');

// Abrir selector al hacer clic en la imagen o en el lápiz
    profileImage.addEventListener('click', () => profileInput.click());
    editIcon.addEventListener('click', () => profileInput.click());

// Previsualizar la imagen seleccionada
    profileInput.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profileImage.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
<?= $this->endSection() ?>