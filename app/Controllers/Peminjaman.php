<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\MemberModel;
use App\Models\BukuModel;

class Peminjaman extends BaseController
{
    public function index()
    {
        if (!session()->get('login')) {
            return redirect()->to('/login');
        }

        $model = new PeminjamanModel();

        $data['peminjaman_list'] = $model
            ->select('peminjaman.*, member.nama as nama_member, buku.judul as judul_buku')
            ->join('member', 'member.id_member = peminjaman.id_member')
            ->join('buku', 'buku.id_buku = peminjaman.id_buku')
            ->orderBy('id_peminjaman', 'DESC')
            ->findAll();

        return view('peminjaman', $data);
    }

    public function form($id = null)
    {
        if (!session()->get('login')) {
            return redirect()->to('/login');
        }

        $memberModel = new MemberModel();
        $bukuModel = new BukuModel();
        $peminjamanModel = new PeminjamanModel();

        $data = [
            'page_title' => 'Tambah Peminjaman',
            'members' => $memberModel->findAll(),
            'buku_list' => $bukuModel->findAll()
        ];

        if ($id) {
            $data['peminjaman'] = $peminjamanModel->find($id);
            $data['page_title'] = 'Edit Peminjaman';
        }

        return view('FormPeminjaman', $data);
    }

    public function save()
    {
        $model = new PeminjamanModel();

        $id = $this->request->getPost('id_peminjaman');

        $data = [
            'id_member' => $this->request->getPost('id_member'),
            'id_buku' => $this->request->getPost('id_buku'),
            'tanggal_kembali' => $this->request->getPost('tanggal_kembali')
        ];

        if ($id) {

            $data['status'] = $this->request->getPost('status');

            $model->update($id, $data);

            return redirect()->to('/peminjaman')
                ->with('success', 'Data peminjaman berhasil diupdate');
        }

        $data['tanggal_peminjaman'] = date('Y-m-d');
        $data['status'] = 'Dipinjam';

        $model->insert($data);

        return redirect()->to('/peminjaman')
            ->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function delete($id)
    {
        $model = new PeminjamanModel();

        $model->delete($id);

        return redirect()->to('/peminjaman')
            ->with('success', 'Peminjaman berhasil dihapus');
    }

    public function kembalikan($id)
    {
        $model = new PeminjamanModel();

        $model->update($id, [
            'status' => 'Dikembalikan'
        ]);

        return redirect()->to('/peminjaman')
            ->with('success', 'Buku berhasil dikembalikan');
    }
}