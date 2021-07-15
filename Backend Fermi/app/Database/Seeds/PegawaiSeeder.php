<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password'    => sha1('admin'),
                'nama' => 'admin',
                'alamat' => 'admin',
                'level' => 1
            ],
            [
                'username' => 'kasir1',
                'password'    => sha1('kasir1'),
                'nama' => 'kasir1',
                'alamat' => 'kasir1',
                'level' => 2
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO pegawai (username, password, nama, alamat, level) VALUES(:username:, :password:, :nama:, :alamat:, :level:)", $data);

        // Using Query Builder
        // $this->db->table('users')->insert($data);
        $this->db->table('pegawai')->insertBatch($data);
    }
}
