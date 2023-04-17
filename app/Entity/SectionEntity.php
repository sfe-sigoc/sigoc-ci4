<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SectionEntity extends Entity
{

    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public $chapitres;
    public $nomenclatures;
    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->chapitres = [];
        $this->nomenclatures = [];
    }
}
