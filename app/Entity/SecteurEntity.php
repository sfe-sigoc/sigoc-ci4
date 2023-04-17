<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SecteurEntity extends Entity
{
    public $nomenclatures;
    public function __construct(array $data = null)
    {
        parent::__construct($data);
        // Initialiser la liste d'agences avec un tableau vide.
        $this->nomenclatures = [];
    }
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
