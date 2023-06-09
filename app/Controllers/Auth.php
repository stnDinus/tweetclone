<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth_login');
    }

    public function register()
    {
        return view('auth_register');
    }

    public function addUser()
    {
        return redirect()->to('/');
    }

    public function login()
    {
        return redirect()->to('/');
    }

    public function logout()
    {
        return redirect()->to('/auth');
    }
}
