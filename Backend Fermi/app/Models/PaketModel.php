<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table      = 'paket';
    protected $primaryKey = 'idPaket';
    protected $allowedFields = ['paket', 'harga'];
}
