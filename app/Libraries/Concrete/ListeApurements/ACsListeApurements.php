<?php

namespace App\Libraries\Concrete\ListeDemDom;

use App\Libraries\Abstrait\ListeApurements;
use App\Libraries\Concrete\Apurements\ACsApurement;

class ACsListeApurements extends ListeApurements
{
    public function _listeApurements($listeApurements = null, array $array = null)
    {
        if (isset($listeApurements) && !empty($listeApurements)) {
            $avisDeCredits = new ACsApurement();
            $arrayApurements = array_column($listeApurements, 'ID_APUREMENT');
            $arrayAvisCredits = array_map(fn ($item) => $avisDeCredits->_idApurement($item, $array), $arrayApurements);
            return array_filter($arrayAvisCredits);
        }
        return null;
    }
}
