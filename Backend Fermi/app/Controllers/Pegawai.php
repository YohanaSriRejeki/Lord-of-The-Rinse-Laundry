<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PaketModel;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    public function landing()
    {
        return view('/pegawai/landingPage');
    }

    public function contact()
    {
        return view('/pegawai/contact');
    }

    public function about()
    {
        return view('/pegawai/about');
    }

    public function login()
    {
        return view('/pegawai/login2');
    }

    public function check()
    {
        $session = \Config\Services::session();
        $pegawaiModel = new PegawaiModel();
        $user = $pegawaiModel->where('username', $_POST["username"])
            ->where('password', sha1($_POST["password"]))
            ->first();

        if ($user == true) {
            $newData = [
                'username' => $user["username"],
                'password' => $user["password"],
                'nama' => $user["nama"],
                'alamat' => $user["alamat"],
                'level' => $user["level"]
            ];
            $session->set($newData);
            if ($user["level"] == 1) {
                echo "<script>
                            alert('login berhasil')
                        </script>";
                return redirect()->to('/dashboard/admin');
            } else if ($user["level"] == 2) {
                echo "<script>
                    alert('Login Berhasil');
                  </script>";
                return redirect()->to('/pelanggan');
            }
        } else {
            echo "<script>
                    alert('Username/Password salah!!!');
                  </script>";
            $error = "Usename/Password salah";
            $data = [
                'error' => $error
            ];
            session()->setFlashdata('error', 'username atau password salah'); //membuat pesan kesalahan
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        $session = \Config\Services::session();

        if (!$session->get('username') == null) {
            if ($session->get('level') == 1) {

                $pager = \Config\Services::pager();

                $currentPage = $this->request->getVar('page_pegawai') ? $this->request->getVar('page_pegawai') : 1;
                $keyword = $this->request->getVar('keyword');
                // $db      = \Config\Database::connect();
                // $builder = $db->table('pegawai');
                // $builder->select('pegawai.id,pegawai.username,pegawai.nama,pegawai.alamat,pegawai.level,role.level');
                // $builder->join('role', 'pegawai.level = role.id');
                // $pegawai   = $builder->get()->getResult();
                // dd($pegawai);

                if ($keyword) {
                    $pegawai = $pegawaiModel->join('role', 'pegawai.level = role.id')->like('nama', $keyword)->paginate(6, 'pegawai');
                } else {
                    $pegawai = $pegawaiModel->join('role', 'pegawai.level = role.idRole')->paginate(6, 'pegawai');
                    // dd($pegawai);
                }

                // dd($pegawai);
                $data = [
                    'pegawai' => $pegawai,
                    'nama' => $session->get('nama'),
                    'pager' => $pegawaiModel->pager,
                    'currentPage' => $currentPage
                ];
                return view('/pegawai/index', $data);
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
                $db      = \Config\Database::connect();
                $builder = $db->table('role');
                $role   = $builder->get()->getResult();
                $data = [
                    'role' => $role,
                    'nama' => $session->get('nama')
                ];
                return view('/pegawai/form', $data);
            } else {
                return redirect()->to('/pelanggan');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function save()
    {
        $pegawaiModel = new PegawaiModel();
        $pegawaiModel->save([
            'username' => $this->request->getVar('username'),
            'password' => sha1($this->request->getVar('password')),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'level' => $this->request->getVar('level')
        ]);

        return redirect()->to('/pegawai');
    }

    public function edit($id)
    {
        $session = \Config\Services::session();

        if (!$session->get('username') == null) {
            if ($session->get('level') == 1) {
                $db      = \Config\Database::connect();
                $builder = $db->table('role');
                $role   = $builder->get()->getResult();
                $pegawaiModel = new PegawaiModel();
                $user = $pegawaiModel->where('id', $id)
                    ->first();
                $data = [
                    'user' => $user,
                    'role' => $role,
                    'nama' => $session->get('nama')
                ];
                return view('/pegawai/edit', $data);
            } else {
                return redirect()->to('/pelanggan');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function update($id)
    {
        $pegawaiModel = new PegawaiModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => sha1($this->request->getVar('password')),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'level' => $this->request->getVar('level')
        ];
        $pegawaiModel->update($id, $data);

        return redirect()->to('/pegawai');
    }

    public function delete($id)
    {
        $pegawaiModel = new pegawaiModel();
        $pegawaiModel->delete($id);

        return redirect()->to('/pegawai');
    }

    public function dash()
    {
        $session = \Config\Services::session();

        if (!$session->get('username') == null) {
            if ($session->get('level') == 1) {
                $db      = \Config\Database::connect();
                $builder = $db->table('pegawai');
                $pegawai   = $builder->get()->getResult();
                $admin = $builder->where('level', 1)->get()->getResult();

                $builder2 = $db->table('pelanggan');
                $pelanggan   = $builder2->get()->getResult();
                $data = [
                    'admin' => $admin,
                    'pegawai' => $pegawai,
                    'pelanggan' => $pelanggan,
                    'nama' => $session->get('nama')
                ];
                return view('/pegawai/dashboard', $data);
            } else {
                return redirect()->to('/pelanggan');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function destroy()
    {
        $session = \Config\Services::session();
        // $session->remove('username');
        // $session->remove('password');
        // $session->remove('nama');
        // $session->remove('alamat');
        // $session->remove('level');
        $session->destroy();
        return redirect()->to('/login');
    }
}
