<?php

namespace App\Models;

use CodeIgniter\Model;

class ECARTDAUModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ECART_DAU';
    protected $primaryKey       = 'ID_ECART_DAU';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\ECARTDAUEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_ECART_DAU',
        'NUMERO_DOMICILIATION',
        'DATE_ECART',
        'MONTANT_DOM',
        'DEVISE_DOM',
        'DATE_DOM',
        'ECART',
        'DEVISE_DIFFERENTE',
        'TAUX_CHANGE_DOM',
        'ECART_ARIARY'
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