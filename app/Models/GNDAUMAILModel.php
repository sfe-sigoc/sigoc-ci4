<?php

namespace App\Models;

use CodeIgniter\Model;

class GNDAUMAILModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'GN_DAU_MAIL';
    protected $primaryKey       = 'ID_REQUETE_DAU';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\GNDAUMAILEntity::class; //'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_REQUETE_DAU',
        'CODE_BANQUE',
        'ID_TASK',
        'NIF',
        'REFERENCE_DAU',
        'LOGIN_DEMANDE',
        'DATE_CREATION'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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
