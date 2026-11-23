<?php

namespace julio101290\boilerplate\Controllers;

/**
 * Class DashboardController.
 */
class DashboardController extends BaseController {

    public function index() {

        helper('auth');

        $idUser = user()->id;
        $user = user()->username;

        $data = [
            'title' => 'Dashboard',
            'userName' => $user,
        ];

        return view('julio101290\boilerplate\Views\dashboard', $data);
    }
}
