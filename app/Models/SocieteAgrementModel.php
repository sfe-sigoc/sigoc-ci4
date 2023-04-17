<?php

namespace App\Models;

use CodeIgniter\Model;

class SocieteAgrementModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'SOCIETE_AGREMENT';
    protected $primaryKey       = 'ID_SOC_AGREMENT';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\SocieteAgrementEntity::class; //'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_SOC_AGREMENT',
        'ID_SECT_ACTIVITE',
        'NIF',
        'ID_DEMANDE_DOMICILIATION',
        'VALIDE',
        'DATE_DEBUT_VALIDITE',
        'DATE_FIN_VALIDITE',
        'SCAN',
        'AES',
        'REF_AGREMENT',
        'DATE_CREATION',
        'LOGIN_USER',
        'DATE_EDITION',
        'CATEGORIE'
    ];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}