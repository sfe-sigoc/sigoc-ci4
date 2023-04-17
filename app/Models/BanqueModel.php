<?php

namespace App\Models;

use CodeIgniter\Model;

class BanqueModel extends Model
{
    //protected $DBGroup = 'group_name';
    protected $table     = 'BANQUE';
    protected $primaryKey = 'CODE_BANQUE'; //'id';

    protected $returnType    = \App\Entities\BanqueEntity::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [ //['name', 'email'];
        'CODE_BANQUE',
        'LIBELLE',
        'SIGLE',
        'ADRESSE',
        'TYPE_BANQUE',
        'BOITE_POSTALE',
        'ACTIF',
        'MAIL',
        'TELEPHONE',
    ];
    protected $useTimestamps = false;
    /*protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';*/

    protected $validationRules   = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;
}