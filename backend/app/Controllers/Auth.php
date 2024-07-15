<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->usersModel->where('username', $username)->first();

        if ($user) {
            if ($password === $user['password']) {
                session()->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'logged_in' => true,
                ]);

             
                if ($user['role_id'] == 1) { 
                    return redirect()->to(base_url('Dashboard'));
                } 
            } else {
               
                session()->setFlashdata('error', 'Invalid username or password.');
                return redirect()->to(base_url('Auth'));
            }
        } else {
            session()->setFlashdata('error', 'Invalid username or password.');
            return redirect()->to(base_url('Auth'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Auth'));
    }
}
