<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    public function index()
    {
        if (!session()->get('login')) {
            return redirect()->to('/login')
                ->with('error', 'Login terlebih dahulu!');
        }

        $model = new BukuModel();

        $data['buku_list'] = $model
            ->orderBy('id_buku', 'DESC')
            ->findAll();

        return view('Buku', $data);
    }

    public function form($id = null)
    {
        if (!session()->get('login')) {
            return redirect()->to('/login')
                ->with('error', 'Login terlebih dahulu!');
        }

        $model = new BukuModel();

        $data = [];

        if ($id) {
            $data['buku'] = $model->find($id);

            if (!$data['buku']) {
                return redirect()->to('/buku')
                    ->with('error', 'Data buku tidak ditemukan');
            }
        }

        if ($this->request->is('post')) {

            $rules = [
                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul harus diisi'
                    ]
                ],
                'pengarang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pengarang harus diisi'
                    ]
                ],
                'penerbit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Penerbit harus diisi'
                    ]
                ],
                'tahun_terbit' => [
                    'rules' => 'required|numeric|greater_than[1800]|less_than_equal_to[2024]',
                    'errors' => [
                        'required' => 'Tahun terbit harus diisi',
                        'numeric' => 'Tahun terbit harus berupa angka',
                        'greater_than' => 'Tahun terbit harus lebih besar dari 1800',
                        'less_than_equal_to' => 'Tahun terbit maksimal 2024'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $saveData = [
                'judul' => $this->request->getPost('judul'),
                'pengarang' => $this->request->getPost('pengarang'),
                'penerbit' => $this->request->getPost('penerbit'),
                'isbn' => $this->request->getPost('isbn'),
                'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                'jumlah_stok' => $this->request->getPost('jumlah_stok')
            ];

            if ($id) {
                $model->update($id, $saveData);

                return redirect()->to('/buku')
                    ->with('success', 'Data buku berhasil diupdate');
            }

            $model->insert($saveData);

            return redirect()->to('/buku')
                ->with('success', 'Buku berhasil ditambahkan');
        }

        return view('FormBuku', $data);
    }

    public function delete($id)
    {
        if (!session()->get('login')) {
            return redirect()->to('/login');
        }

        $model = new BukuModel();

        $model->delete($id);

        return redirect()->to('/buku')
            ->with('success', 'Data buku berhasil dihapus');
    }
}