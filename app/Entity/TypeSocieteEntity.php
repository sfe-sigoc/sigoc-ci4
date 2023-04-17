<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class TypeSocieteEntity extends Entity
{
    public $societes;
    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->societes = [];
    }
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
