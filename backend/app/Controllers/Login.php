<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;

class Login extends ResourceController
{
    protected $usersModel;
    use ResponseTrait;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function login()
    {
        $data = $this->request->getJSON();
        $username = $data->username;
        $password = $data->password;

        $user = $this->usersModel->where('username', $username)->first();

        if ($user && $password === $user['password']) {
            return $this->respond(['message' => 'Login success', 'user' => $user], 200);
        } else {
            return $this->respond(['message' => 'Invalid username or password'], 401);
        }
    }

    public function register()
    {
        $data = $this->request->getJSON();
        $nama = $data->nama;
        $username = $data->username;
        $password = $data->password;
        $role_id = $data->role_id ?? 2;

        $existingUser = $this->usersModel->where('username', $username)->first();

        if ($existingUser) {
            return $this->respond(['message' => 'Username already exists'], 409);
        }

        $newUser = [
            'nama' => $nama,
            'username' => $username,
            'password' => $password, // Simpan password sebagai teks biasa
            'role_id' => $role_id,
        ];

        $this->usersModel->insert($newUser);

        return $this->respond(['message' => 'Registration successful'], 201);
    }
}
