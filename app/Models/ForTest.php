<?php

namespace App\Models;

use CodeIgniter\Model;

class ForTest extends Model
{
    protected $DBGroup              = 'default';
    protected $primaryKey           = 'id';
    protected $table                = 'for_test';
    protected $allowedFields        = ['c1','c2','c3'];
    protected $useTimestamps        = true;
    protected $validationRules      = [];
    protected $validationMessages   = [];
}
    