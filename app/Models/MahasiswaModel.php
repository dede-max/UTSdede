<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nim',
        'nama',
        'jurusan'
    ];

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $skipValidation = true;
}