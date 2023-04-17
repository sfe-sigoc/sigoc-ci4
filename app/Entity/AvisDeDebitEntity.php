<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class AvisDeDebitEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];


    public $paiementImports;
    public function __construct($data)
    {
        parent::__construct($data);
        $this->paiementImports = [];
    }
}
