<?php

namespace App\Libraries\Concrete\Banques;

use App\Libraries\Concrete\CompteBancaires\ApurementCompteBancaire;
use App\Libraries\Strategy\_Banque;
use App\Libraries\Traits\TraitBase;
use App\Models\ApurementModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_listeCptBqs;

class ApurementBanque extends RequeteBase implements _Banque, _listeCptBqs
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(ApurementModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_APUREMENT');
    }

    public function _Banque($CODE_BANQUE, array $array = null)
    {
        $compteBancaires = new CompteBancaireBanque();
        $listeCptBqs = $compteBancaires->_Banque($CODE_BANQUE, $array);
        return $this->_listeCptBqsExiste($listeCptBqs, $array);
    }

    public function _listeCptBqsExiste($listeCptBqs = null, array $array = null)
    {
        if (isset($listeCptBqs) && !empty($listeCptBqs)) {
            return $this->_listeCptBqs($listeCptBqs, $array);
        }
        return null;
    }

    public function _listeCptBqs($listeCptBqs, array $array = null)
    {
        $apurements = new ApurementCompteBancaire();
        $array1 = array();
        foreach ($listeCptBqs as $cptBq)
            array_push($array1, $apurements->_CompteBancaire($cptBq->AGENCE_CODE_BANQUE, $cptBq->CODE_AGENCE, $cptBq->NUMERO_COMPTE, $array));
        return array_filter($array1);
    }
}
