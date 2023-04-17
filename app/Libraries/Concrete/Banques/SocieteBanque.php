<?php

namespace App\Libraries\Concrete\Banques;

use App\Libraries\Strategy\_Banque;
use App\Libraries\Traits\TraitBase;
use App\Models\SocieteModel;
use App\Libraries\Concrete\Societes\FirstSociete;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_listeCptBqs;

class SocieteBanque extends RequeteBase implements _Banque, _listeCptBqs
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'ACTIF',
        'EST_OA',
        'VALIDE_FINEX',
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(SocieteModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION');
    }

    public function _Banque($CODE_BANQUE, array $array = null)
    {
        $compteBancaireBanques = new CompteBancaireBanque();
        $listeCptBqs = $compteBancaireBanques->_Banque($CODE_BANQUE, $array);
        return $this->_listeCptBqsExiste($listeCptBqs, $array);
    }

    public function _listeCptBqsExiste($listeCptBqs = null, array $array = null)
    {
        if (isset($listeCptBqs) && !empty($listeCptBqs)) {
            return $this->_listeCptBqs($listeCptBqs, $array);
        }
        return null;
    }

    public function _listeCptBqs($listeCptBqs = null, array $array = null)
    {
        $array1 = array();
        $societes = new FirstSociete();
        foreach ($listeCptBqs as $cptBq) {
            array_push($array1, $societes->_Societe($cptBq->NIF, $array));
        }
        return array_unique(array_filter($array1));
    }
}
