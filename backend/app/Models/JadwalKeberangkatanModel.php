<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalKeberangkatanModel extends Model
{
    protected $table      = 'jadwal_keberangkatan';
    protected $primaryKey = 'Id';
    protected $allowedFields = [
        'Hari',
        'Tanggal',
        'Bulan',
        'Tahun',
        'Pelabuhan',
        'Kapal',
    ];

    protected $useTimestamps = false;
}
