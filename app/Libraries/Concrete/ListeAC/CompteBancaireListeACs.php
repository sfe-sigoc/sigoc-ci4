<?php

namespace App\Libraries\Concrete\ListeAC;

use App\Libraries\Abstrait\ListeACs;
use App\Libraries\Concrete\Societes\CompteBancaireSociete;

class CompteBancaireListeACs extends ListeACs
{
    public function _listeACs($listeAvisDeCredits, array $array = null)
    {
        if (isset($listeAvisDeCredits) && !empty($listeAvisDeCredits)) {
            $arrayComptes = array_column($listeAvisDeCredits, 'NIF', 'NUMERO_COMPTE');
            $comptes = new CompteBancaireSociete();
            $compteBanques = array_map(fn ($nif) => $comptes->_Societe($nif, $array), array_values($arrayComptes));
            $compteBanques = array_merge(...$compteBanques);
            return array_unique(array_filter($compteBanques, function ($item) use (&$arrayComptes) {
                return array_key_exists($item->NUMERO_COMPTE, $arrayComptes);
            }), SORT_REGULAR);
        }
        return null;
    }
}
