<?php

namespace App\Models;

use App\Entities\SocieteEntity;
use CodeIgniter\Model;
use Faker\Container\Container;

class ApurementModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'APUREMENT';
    protected $primaryKey       = 'ID_APUREMENT';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\ApurementEntity::class; // 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'NUMERO_DOMICILIATION',
        'NUMERO_AVIS_CREDIT',
        'ID_APUREMENT',
        'MONTANT_APUREMENT',
        'DATE_APUREMENT',
        'LOGIN_USER',
        'RETARD',
        'BANQUE_APUREUR',
        'DEPASSE_AUTORISATION',
        'DATE_MODIFICATION',
        'TAUX_PARITE',
        'TAUX_PARITE_TMP'
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