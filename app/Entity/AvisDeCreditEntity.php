<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class AvisDeCreditEntity extends Entity
{
    public $cessions; //cession normale, derogation cession
    public $apurements;
    public function __construct()
    {
        $this->cessions = [];
        $this->apurements = [];
    }
}