<?php

namespace App\Libraries\Concrete\Societes;

use App\Libraries\Concrete\Agences\FirstAgenceBanque;
use App\Libraries\Strategy\_Societe;
use App\Libraries\Traits\TraitBase;
use App\Models\AgenceBanqueModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_listeCompteBancaires;

class AgenceBanqueSociete extends RequeteBase implements _Societe, _listeCompteBancaires
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'ACTIF'
    ];

    public function __construct()
    {
        parent::__construct(AgenceBanqueModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
    }

    public function _Societe($NIF, array $array = null)
    {
        $compteBancaires = new CompteBancaireSociete();
        $listeCompteBancaires = $compteBancaires->_Societe($NIF, $array);
        return $this->_listeCompteBancairesExiste($listeCompteBancaires, $array);
    }

    public function _listeCompteBancairesExiste($listeSocietes = null, array $array = null)
    {
        if (isset($listeSocietes) && !empty($listeSocietes)) {
            return $this->_listeCompteBancaires($listeSocietes, $array);
        }
        return null;
    }

    public function _listeCompteBancaires($listeCompteBancaires = null, array $array = null)
    {
        $array1 = array();
        $agences = new FirstAgenceBanque();
        foreach ($listeCompteBancaires as $cptBq)
            array_push($array1, $agences->_AgenceBanque($cptBq->CODE_BANQUE, $cptBq->CODE_AGENCE, $array));
        return array_filter($array1);
    }
}
