<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table      = 'pegawai';
    protected $allowedFields = ['username', 'password', 'nama', 'alamat', 'level'];
}
