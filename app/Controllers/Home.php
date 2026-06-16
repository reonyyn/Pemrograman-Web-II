<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\BukuModel;
use App\Models\PeminjamanModel;

class Home extends BaseController
{
    public function index()
    {
        if (!session()->get('login')) {
            return redirect()->to('/login')
                             ->with('error', 'Login terlebih dahulu!');
        }

        $memberModel = new MemberModel();
        $bukuModel = new BukuModel();
        $peminjamanModel = new PeminjamanModel();

        $total_members = $memberModel->countAllResults();
        $total_buku = $bukuModel->countAllResults();

        $peminjaman_list = $peminjamanModel->findAll();

        $peminjaman_aktif = 0;
        $peminjaman_terlambat = 0;

        $hari_ini = new \DateTime();

        foreach ($peminjaman_list as $pinjam) {
            if ($pinjam['status'] == 'Dipinjam') {
                $peminjaman_aktif++;

                $tgl_kembali = new \DateTime($pinjam['tanggal_kembali']);

                if ($hari_ini > $tgl_kembali) {
                    $peminjaman_terlambat++;
                }
            }
        }

        return view('dashboard', [
            'total_members' => $total_members,
            'total_buku' => $total_buku,
            'peminjaman_aktif' => $peminjaman_aktif,
            'peminjaman_terlambat' => $peminjaman_terlambat
        ]);
    }
}