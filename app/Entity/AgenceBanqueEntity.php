<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class AgenceBanqueEntity extends Entity
{
    public $societes;
    public $notifications;
    public $users;
    public $compteBancaires;
    public $domiciliations;
    public $demandeDomiciliationModel;
    public function __construct(array $data = null)
    {
        parent::__construct($data);
        // Initialiser la liste d'agences avec un tableau vide.
        $this->societes = [];
        $this->notifications = [];
        $this->users = [];
        $this->compteBancaires = [];
        $this->domiciliations = [];
        $this->demandeDomiciliationModel = [];
    }
}