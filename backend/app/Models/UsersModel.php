<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'username', 'password', 'role_id'];

    // protected function hashPassword(array $data)
    // {
    //     if (isset($data['data']['password'])) {
    //         $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    //     }
    //     return $data;
    // }

}
