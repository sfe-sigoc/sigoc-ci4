<?php

namespace App\Libraries\Concrete\ListeDemDom;

use App\Libraries\Abstrait\ListeDemDoms;
use App\Libraries\Concrete\Agences\FirstAgenceBanque;

class AgenceBanqueListeDemDoms extends ListeDemDoms
{
    public function _listeDemDoms($listeDemandes, array $array  = null)
    {
        if (isset($listeDemandes) && !empty($listeDemandes)) {
            $arrayAgences = array_column($listeDemandes, 'CODE_AGENCE', 'AGENCE_CODE_BANQUE');
            $AgBqs = new FirstAgenceBanque();
            $agenceBanques = array_map(fn ($banque, $agence) => $AgBqs->_AgenceBanque($banque, $agence, $array), array_keys($arrayAgences), array_values($arrayAgences));
            return array_unique(array_filter($agenceBanques), SORT_REGULAR);
        }
        return null;
    }
}
