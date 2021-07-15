<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PaketModel;
use App\Models\PegawaiModel;
use App\Models\RoleModel;

class Role extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();

        if (!$session->get('username') == null) {
            if ($session->get('level') == 1) {
                $db      = \Config\Database::connect();
                $builder = $db->table('role');
                $role   = $builder->get()->getResult();
                $data = [
                    'role' => $role,
                    'nama' => $session->get('nama')
                ];
                return view('/role/index', $data);
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
                return view('/role/form', $data);
            } else {
                return redirect()->to('/pelanggan');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function save()
    {
        $roleModel = new RoleModel();
        $roleModel->save([
            'level' => $this->request->getVar('level')
        ]);

        return redirect()->to('/role');
    }

    public function edit($id)
    {
        $session = \Config\Services::session();

        if (!$session->get('username') == null) {
            if ($session->get('level') == 1) {
                $roleModel = new RoleModel();
                $user = $roleModel->where('idRole', $id)
                    ->first();
                $data = [
                    'user' => $user,
                    'nama' => $session->get('nama')
                ];
                return view('/role/edit', $data);
            } else {
                return redirect()->to('/pelanggan');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function update($id)
    {
        $roleModel = new RoleModel();
        $data = [
            'level' => $this->request->getVar('level')
        ];
        $roleModel->update($id, $data);

        return redirect()->to('/role');
    }

    public function delete($id)
    {
        $roleModel = new RoleModel();
        $roleModel->delete($id);

        return redirect()->to('/role');
    }
}
