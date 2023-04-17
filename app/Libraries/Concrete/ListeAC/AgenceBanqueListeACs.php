<?php

namespace App\Libraries\Concrete\ListeAC;

use App\Libraries\Abstrait\ListeACs;
use App\Libraries\Concrete\Agences\FirstAgenceBanque;
use App\Libraries\Concrete\Societes\CompteBancaireSociete;

class AgenceBanqueListeACs extends ListeACs
{
    public function _listeACs($listeAvisDeCredits, array $array = null)
    {
        if (isset($listeAvisDeCredits) && !empty($listeAvisDeCredits)) {
            if (isset($listeAvisDeCredits) && !empty($listeAvisDeCredits)) {
                $arrayAgences = array_column($listeAvisDeCredits, 'CODE_AGENCE', 'AGENCE_CODE_BANQUE');
                $AgBqs = new FirstAgenceBanque();
                $agenceBanques = array_map(fn ($banque, $agence) => $AgBqs->_AgenceBanque($banque, $agence, $array), array_keys($arrayAgences), array_values($arrayAgences));
                return array_unique(array_filter($agenceBanques), SORT_REGULAR);
            }
            return null;
        }
        return null;
    }
}
