<?php

namespace App\Controllers;

use App\Models\TiketModel;

class Laporan extends BaseController
{
    protected $tiketModel;

    public function __construct()
    {
        $this->tiketModel = new TiketModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar laporan',
            'isi' => 'laporan/index',
            'tiket' => $this->tiketModel->findAll(),
        ];
        return view('layout/v_wrapper', $data);
    }
    
    
}
