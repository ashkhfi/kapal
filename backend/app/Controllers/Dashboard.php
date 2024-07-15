<?php

namespace App\Controllers;

// use App\Models\GejalaModel;
use App\Models\PenyakitModel;

class Dashboard extends BaseController
{
    protected $gejalaModel;
    protected $penyakitModel;

    public function __construct()
    {
        // $this->gejalaModel = new GejalaModel();
        // $this->penyakitModel = new PenyakitModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Dasboard',
            'isi' => 'dashboard',
            // 'gejala' => $this->gejalaModel->countAllResults(),
            // 'penyakit' => $this->penyakitModel->countAllResults(),
        ];
        return view('layout/v_wrapper', $data);
    }
}
