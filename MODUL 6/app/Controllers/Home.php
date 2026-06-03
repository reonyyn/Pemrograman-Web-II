<?php

namespace App\Controllers;

use App\Models\Model;

class Home extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function index()
    {
        $data = $this->model->getData();
        $data['title'] = 'Beranda';
        
        return view('Beranda', $data);
    }

    public function profil()
    {
        $data = $this->model->getData();
        $data['title'] = 'Profil Praktikan';
        
        return view('Profil', $data);
    }
}