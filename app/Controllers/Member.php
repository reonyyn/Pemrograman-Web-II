<?php

namespace App\Controllers;
use App\Models\MemberModel;

class Member extends BaseController
{
    public function index()
    {
        if (!session()->get('login')) {
            return redirect()->to('/login');
        }

        $memberModel = new MemberModel();

        $data['members'] = $memberModel
            ->orderBy('id_member', 'DESC')
            ->findAll();

        return view('member', $data);
    }

    public function form($id = null)
    {
        if (!session()->get('login')) {
            return redirect()->to('/login');
        }

        $memberModel = new MemberModel();

        $data = [
            'page_title' => 'Tambah Member'
        ];

        if ($id != null) {

            $member = $memberModel->find($id);

            if (!$member) {
                return redirect()->to('/member')
                    ->with('error', 'Member tidak ditemukan');
            }

            $data['member'] = $member;
            $data['page_title'] = 'Edit Member';
        }

        return view('FormMember', $data);
    }

    public function save()
    {
        if (!session()->get('login')) {
            return redirect()->to('/login');
        }

        $memberModel = new MemberModel();

        $id = $this->request->getPost('id_member');

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat')
        ];

        if ($id) {

            $memberModel->update($id, $data);

            return redirect()->to('/member')
                ->with('success', 'Data member berhasil diupdate');
        }

        $data['tanggal_daftar'] = date('Y-m-d');

        $memberModel->insert($data);

        return redirect()->to('/member')
            ->with('success', 'Member berhasil ditambahkan');
    }

    public function delete($id)
    {
        if (!session()->get('login')) {
            return redirect()->to('/login');
        }

        $memberModel = new MemberModel();

        $memberModel->delete($id);

        return redirect()->to('/member')
            ->with('success', 'Member berhasil dihapus');
    }
}