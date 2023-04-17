<?php

namespace App\Models;

use CodeIgniter\Model;

class AgenceBanqueModel extends Model
{
    //protected $DBGroup = 'group_name';
    protected $table     = 'AGENCE';
    protected $primaryKey = 'CODE_AGENCE'; //'id';

    protected $returnType    = \App\Entities\AgenceBanqueEntity::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [ //['name', 'email'];
        'CODE_AGENCE',
        'AGENCE_CODE_BANQUE',
        'DESIGNATION_AGENCE',
        'ADRESSE',
        'CODE_POSTAL',
        'ACTIF',
        'AGENCE_VALIDATION',
    ];
    protected $useTimestamps = false;
    /*
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
*/
    protected $validationRules   = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    protected function initialize()
    {
        //$this->allowedFields[] = 'middlename';
    }
}