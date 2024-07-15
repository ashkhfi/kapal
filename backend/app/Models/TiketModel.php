<?php

namespace App\Models;

use CodeIgniter\Model;


    class TiketModel extends Model
    {
        protected $table = 'tiket';
        protected $primaryKey = 'Id';
        protected $allowedFields = [
            'Data_penumpang',
            'Pelabuhan_asal',
            'Pelabuhan_tujuan',
            'Kapal',
            'Harga_tiket',
            'status',
            'id_user',
            'Anak',
            'Dewasa',
            'Motor',
            'Mobil',
            'Tanggal' // Perbaiki kesalahan penulisan di sini
        ];
    }
    

