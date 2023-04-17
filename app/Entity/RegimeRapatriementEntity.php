<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class RegimeRapatriementEntity extends Entity
{
    public $domiciliations;
    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->domiciliations = [];
    }
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
