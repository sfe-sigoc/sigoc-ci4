<?php

namespace App\Libraries\Concrete\CompteBancaireExiste;

use App\Libraries\Concrete\CompteBancaires\ACsCompteBancaire;
use App\Libraries\Strategy\_compteBancaireExiste;

class ACsCompteBancaireExiste implements _compteBancaireExiste
{
    public function _compteBancaireExiste($compteBancaire = null, array $array = null)
    {
        if (isset($compteBancaire)) {
            $avisDeCredits = new ACsCompteBancaire();
            return $avisDeCredits->_CompteBancaire($compteBancaire->AGENCE_CODE_BANQUE, $compteBancaire->CODE_AGENCE, $compteBancaire->NUMERO_COMPTE, $array);
        }
    }
}
