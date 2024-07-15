<?php

namespace App\Controllers;

use App\Models\TiketModel;

class Tiket extends BaseController
{
    protected $tiketModel;

    public function __construct()
    {
        $this->tiketModel = new TiketModel();
    }

    public function getTiket()
    {
        $jadwal = $this->tiketModel->findAll();
        return $this->response->setJSON($jadwal);
    }

    public function create()
    {
        try {
            $data = $this->request->getJSON();

            // Validasi data yang diterima

            // Pastikan tipe data sesuai dengan yang diharapkan
            $data->Harga_tiket = (int)$data->Harga_tiket;
            $data->status = (int)$data->status;
            $data->id_user = (int)$data->id_user;
            $data->Anak = (int)$data->Anak;
            $data->Dewasa = (int)$data->Dewasa;
            $data->Motor = (int)$data->Motor;
            $data->Mobil = (int)$data->Mobil;
            $data->Tanggal = !empty($data->Tanggal) ? $data->Tanggal : null; // Pastikan Tanggal memiliki nilai yang benar

            // Simpan data ke database
            $tiketModel = new TiketModel();
            $tiketModel->insert($data);

            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Pesan tiket berhasil.'
                ]
            ];

            return $this->response->setStatusCode(201)->setJSON($response);
        } catch (\Exception $e) {
            // Log pesan error
            $this->logger->error('Error saat menambahkan tiket: ' . $e->getMessage());

            // Kirim respons kesalahan server
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }




    public function index()
    {
        $data = [
            'title' => 'Data Tiket',
            'isi' => 'tiket/index',
            'tiket' => $this->tiketModel->where('status', 0)->findAll(),
        ];
        return view('layout/v_wrapper', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Calon Keucik',
            'isi' => 'tiket/tambah',
        ];
        return view('layout/v_wrapper', $data);
    }
    public function simpan()
    {
        $data = [
            'Pelabuhan_asal' => $this->request->getPost('Pelabuhan_asal'),
            'Pelabuhan_tujuan' => $this->request->getPost('Pelabuhan_tujuan'),
            'Data_penumpang' => $this->request->getPost('Data_penumpang'),
            'Harga_tiket' => $this->request->getPost('Harga_tiket'),

        ];

        $this->tiketModel->insert($data);
        return redirect()->to(base_url('tiket'))->with('success', 'tiket berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $tiket = $this->tiketModel->find($id);
        if (!$tiket) {
            return redirect()->to(base_url('tiket'))->with('error', 'Tiket tidak ditemukan.');
        }

        $data = ['status' => 1];

        $this->tiketModel->update($id, $data);

        return redirect()->to(base_url('tiket'))->with('success', 'Status tiket berhasil diubah.');
    }
    public function update($id)
    {
        $data = [
            'Pelabuhan_asal' => $this->request->getPost('Pelabuhan_asal'),
            'Pelabuhan_tujuan' => $this->request->getPost('Pelabuhan_tujuan'),
            'Data_penumpang' => $this->request->getPost('Data_penumpang'),
            'Harga_tiket' => $this->request->getPost('Harga_tiket'),

        ];

        $this->tiketModel->update($id, $data);

        return redirect()->to(base_url('tiket'))->with('success', 'tiket berhasil diperbarui.');
    }
    public function updateStatus($id)
    {
        $tiket = $this->tiketModel->find($id);
        if (!$tiket) {
            return redirect()->to(base_url('tiket'))->with('error', 'Tiket tidak ditemukan.');
        }

        $data = ['status' => 1];

        $this->tiketModel->update($id, $data);

        return redirect()->to(base_url('tiket'))->with('success', 'Status tiket berhasil diubah.');
    }

    public function delete($id)
    {
        $tiket = $this->tiketModel->find($id);
        if (!$tiket) {
            return redirect()->to(base_url('tiket'))->with('error', 'tiket tidak ditemukan.');
        }

        $this->tiketModel->delete($id);

        return redirect()->to(base_url('tiket'))->with('success', 'tiket berhasil dihapus.');
    }
}
