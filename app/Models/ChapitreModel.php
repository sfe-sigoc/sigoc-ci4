<?php

namespace App\Models;

use CodeIgniter\Model;

class ChapitreModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'SH_CHAPITRE';
    protected $primaryKey       = 'CODE_CHAPITRE';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\ChapitreEntity::class; //'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'CODE_CHAPITRE',
        'LIBELLE_CHAPITRE',
        'CODE_SECTION'
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
