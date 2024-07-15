<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;

class API extends ResourceController
{
    protected $usersModel;
    protected $filters = ['cors'];

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->tiketModel = new TiketModel();
    }

    public function getGejala()
    {
        $user = $this->usersModel->findAll();
        return $this->respond($user, 200);
    }

    public function PostUsers()
    {
        $contentType = $this->request->getHeaderLine('Content-Type');
        if ($contentType !== 'application/json') {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Invalid content type']);
        }

        $rawInput = $this->request->getBody();
        $input = json_decode($rawInput);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Invalid JSON format']);
        }

        $nama = $input->nama ?? '';
        $username = $input->username ?? '';
        $password = $input->password ?? '';
        $role_id = $input->role_id ?? 2; 

        if (empty($nama) || empty($username) || empty($password) || empty($role_id)) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Invalid input data']);
        }

        $data = [
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id,
        ];

        $this->usersModel->insert($data);

        $response = [
            'status' => 'success',
            'message' => 'User added successfully',
        ];

        return $this->response->setJSON($response);
    }

    public function pesan()
    {
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }
}
