<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table      = 'pelanggan';
    protected $allowedFields = ['nama', 'berat', 'idPaket', 'tglMasuk', 'tglKeluar', 'status'];

    // public function getPelanggan()
    // {
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('pelanggan');
    //     $builder->select('pelanggan.id,pelanggan.nama,pelanggan.berat,paket.paket,paket.harga,pelanggan.tglMasuk,pelanggan.tglKeluar,pelanggan.status');
    //     $builder->join('paket', 'pelanggan.idPaket = paket.id');
    //     $pelanggan = $builder->get()->paginate(10);
    //     return $builder;
    // }
}
