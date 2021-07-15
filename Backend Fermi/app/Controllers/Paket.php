<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PaketModel;

class Paket extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();

        if (!$session->get('username') == null) {
            if ($session->get('level') == 1) {
                $db      = \Config\Database::connect();
                $builder = $db->table('paket');
                $query   = $builder->get()->getResult();
                $data = [
                    'paket' => $query,
                    'nama' => $session->get('nama')
                ];
                return view('/paket/index', $data);
            } else {
                return redirect()->to('/pelanggan');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function create()
    {
        $session = \Config\Services::session();

        if (!$session->get('username') == null) {
            if ($session->get('level') == 1) {
                $data = [
                    'nama' => $session->get('nama')
                ];
                return view('/paket/form', $data);
            } else {
                return redirect()->to('/pelanggan');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function save()
    {
        $paketModel = new PaketModel();
        $paketModel->save([
            'paket' => $this->request->getVar('paket'),
            'harga' => (int)$this->request->getVar('harga')
        ]);

        return redirect()->to('/paket');
    }

    public function edit($id)
    {
        $session = \Config\Services::session();

        if (!$session->get('username') == null) {
            if ($session->get('level') == 1) {
                $paketModel = new PaketModel();
                $paket = $paketModel->where('idPaket', $id)
                    ->first();
                $data = [
                    'paket' => $paket,
                    'nama' => $session->get('nama')
                ];
                return view('/paket/edit', $data);
            } else {
                return redirect()->to('/pelanggan');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function update($id)
    {
        $paketModel = new PaketModel();
        $data = [
            'paket' => $this->request->getVar('paket'),
            'harga' => (int)$this->request->getVar('harga')
        ];
        $paketModel->update($id, $data);

        return redirect()->to('/paket');
    }

    public function delete($id)
    {
        $paketModel = new PaketModel();
        $paketModel->delete($id);

        return redirect()->to('/paket');
    }
}
