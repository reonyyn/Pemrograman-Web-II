<?php

namespace App\Models;

use CodeIgniter\Model as CI_Model;

class Model extends CI_Model
{
    public function getData()
    {
        return [
            'nama'       => 'Aulia Az Zahra',
            'nim'        => '2410817120021',
            'prodi'      => 'Teknologi Informasi',
            'hobi'       => 'Singing, Traveling, Music, Desain Grafis',
            'skill'      => 'HTML, CSS, PHP',
        ];
    }
}