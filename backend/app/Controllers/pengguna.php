<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Pengguna extends ResourceController
{
    protected $usersModel;
    protected $format = 'json';
    use ResponseTrait;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $nilaicf = $this->usersModel->findAll();
        return $this->respond($nilaicf, 200);
    }

    public function addUser()
    {
        $input = $this->request->getJSON(true);

        log_message('info', 'Received user data: ' . json_encode($input));

        if (!isset($input['nama']) || !isset($input['username']) || !isset($input['password']) || !isset($input['role_id'])) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Invalid input']);
        }

        $data = [
            'nama' => $input['nama'],
            'username' => $input['username'],
            'password' => $input['password'],
            'role_id' => $input['role_id'],
        ];

        $this->usersModel->insert($data);

        log_message('info', 'User inserted to database: ' . json_encode($data));

        $response = [
            'status' => 'success',
            'message' => 'User added successfully',
        ];

        return $this->response->setJSON($response);
    }
   
}

