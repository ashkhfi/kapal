<?php

namespace App\Controllers;

use App\Models\JadwalKeberangkatanModel;
use CodeIgniter\RESTful\ResourceController;


class Jadwal extends BaseController
// class Jadwal extends ResourceController
{
    protected $jadwalModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalKeberangkatanModel();
    }



    public function getJadwal()
    {
        $jadwal = $this->jadwalModel->findAll();
        return $this->response->setJSON($jadwal);
    }



    public function index()
    {
        $data = [
            'title' => 'Data Calon Keucik',
            'isi' => 'jadwal/index',
            'jadwal' => $this->jadwalModel->findAll(),
        ];
        return view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Calon Keucik',
            'isi' => 'jadwal/tambah',
        ];
        return view('layout/v_wrapper', $data);
    }
    public function simpan()
    {
        $data = [
            'Hari' => $this->request->getPost('Hari'),
            'Tanggal' => $this->request->getPost('Tanggal'),
            'Bulan' => $this->request->getPost('Bulan'),
            'Tahun' => $this->request->getPost('Tahun'),
            'Pelabuhan' => $this->request->getPost('Pelabuhan'),
            'Kapal' => $this->request->getPost('Kapal'),
        ];

        $this->jadwalModel->insert($data);
        return redirect()->to(base_url('Jadwal'))->with('success', 'Jadwal berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $Jadwal = $this->jadwalModel->find($id);
        if (!$Jadwal) {
            return redirect()->to(base_url('Jadwal'))->with('error', 'Jadwal tidak ditemukan.');
        }
        $data = [
            'title' => 'Edit Calon Keucik',
            'isi' => 'Jadwal/edit',
            'Jadwal' => $Jadwal,

        ];
        return view('layout/v_wrapper', $data);
    }
    public function update($id)
    {
        $Jadwal = $this->jadwalModel->find($id);

        $data = [
            'Hari' => $this->request->getPost('Hari'),
            'Tanggal' => $this->request->getPost('Tanggal'),
            'Bulan' => $this->request->getPost('Bulan'),
            'Tahun' => $this->request->getPost('Tahun'),
            'Pelabuhan' => $this->request->getPost('Pelabuhan'),
            'Kapal' => $this->request->getPost('Kapal'),
        ];

        $this->jadwalModel->update($id, $data);

        return redirect()->to(base_url('Jadwal'))->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function delete($id)
    {
        $Jadwal = $this->jadwalModel->find($id);
        if (!$Jadwal) {
            return redirect()->to(base_url('Jadwal'))->with('error', 'Jadwal tidak ditemukan.');
        }

        $this->jadwalModel->delete($id);

        return redirect()->to(base_url('Jadwal'))->with('success', 'Jadwal berhasil dihapus.');
    }
}
