<?php

namespace App\Libraries\Concrete\Societes;

use App\Libraries\Strategy\_Societe;
use App\Libraries\Traits\TraitBase;
use App\Models\CompteBancaireModel;
use App\Libraries\Abstrait\RequeteBase;

class CompteBancaireSociete extends RequeteBase implements _Societe
{  
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'CLOTURER', 'VALIDE_BANQUE', 'ANNEE'
    ];
    public function __construct()
    {
        parent::__construct(CompteBancaireModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION');
    }
    public function _Societe($NIF, array $array = null)
    {
        $array1 = ['NIF' => $NIF];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }

}
