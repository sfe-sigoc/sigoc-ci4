<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SocieteEntity extends Entity
{
    // protected $datamap = [];
    // protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    // protected $casts   = [];
    public $domiciliations;
    public $statistiques;
    public $societeAgrements; //SocieteAgrementModel
    public $secteurActivites;
    public $notifications;
    public $compteBancaires;
    public $users;


    public function __construct(array $data = null)
    {
        parent::__construct($data);
        // Initialiser la liste d'agences avec un tableau vide.
        $this->domiciliations = [];
        $this->statistiques = [];
        $this->societeAgrements = [];
        $this->secteurActivites = [];
        $this->notifications = [];
        $this->compteBancaires = [];
        $this->users = [];
    }
}
