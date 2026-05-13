<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function index()
    {
        return view('mahasiswa_view');
    }

    public function data()
    {
        $model = new MahasiswaModel();

        $data = $model->findAll();

        return $this->response->setJSON($data);
    }

    public function save()
    {
        $model = new MahasiswaModel();

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan')
        ];

        $insert = $model->insert($data);

        if($insert)
        {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Data berhasil disimpan'
            ]);
        }
        else
        {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Data gagal disimpan'
            ]);
        }
    }

    public function delete()
    {
        $model = new MahasiswaModel();

        $id = $this->request->getPost('id');

        $model->delete($id);

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}