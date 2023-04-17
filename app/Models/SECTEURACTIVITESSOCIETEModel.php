<?php

namespace App\Models;

use CodeIgniter\Model;

class SECTEURACTIVITESSOCIETEModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'SECTEUR_ACTIVITES_SOCIETE';
    // protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\SECTEURACTIVITESSOCIETEEntity::class; //'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'NIF',
        'ID_SECT_ACTIVITE',
        'DATE_CREATION',
        'NB_ENGAGEMENT',
        'MENGAGT',
        'MRAPAT',
        'MENGAGTECHU',
        'MRAPATECHU',
        'MEXIGIBLE',
        'NB_EXIGIBLE',
        'LEVEE',
        'DATE_LIMITE_REGUL',
        'NB_ENGAGT_ECHU',
        'NB_LEVEE_5P'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
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