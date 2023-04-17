<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ChapitreEntity extends Entity
{

    protected $datamap = [];
    //protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    public function __construct(array $data = null)
    {
        parent::__construct($data);
    }
}
