<?php

namespace App\Models;

use CodeIgniter\Model;

class StatistiqueModel extends Model
{
    //protected $DBGroup = 'group_name';
    protected $table     = 'STATISTIQUE';
    protected $primaryKey = 'NUMERO_STATISTIQUE'; //'id';

    protected $returnType    = \App\Entities\StatistiqueEntity::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [ //['name', 'email'];
        'NUMERO_STATISTIQUE',
        'NIF',
        'CODE_ACTIVITE',
        'DATE_CREATION_STATISTIQUE',
        'CHEMIN_STATISTIQUE',
        'EST_ASSOCIATION',
        'ACTIF'
    ];
    protected $useTimestamps = false;
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';
    // protected $deletedField = 'deleted_at';

    protected $validationRules   = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;
}