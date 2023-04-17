<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ApurementEntity extends Entity
{
    public $avisDeCredits;
    public $domiciliations;
    public function __construct(array $data = null)
    {
        parent::__construct($data);
        // Initialiser la liste d'agences avec un tableau vide.
        $this->avisDeCredits = [];
        $this->notifications = [];
        $this->users = [];
    }
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
