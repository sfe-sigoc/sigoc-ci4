<?php

namespace App\Libraries\Concrete\CompteBancaires;

use App\Libraries\Strategy\_CompteBancaire;
use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\ListeAC\CessionListeACs;

class CessionCompteBancaire extends RequeteBase implements _CompteBancaire
{

    use TraitBase;
    private $filterAC = null;

    public function __construct(array $filterAC = null)
    {
        $this->filterAC = $filterAC;
    }

    public function _CompteBancaire($CODE_BANQUE, $CODE_AGENCE, $NUMERO_COMPTE, array $array = null)
    {
        $avisDeCredits = new ACsCompteBancaire();
        $listeAvisDeCredits = $avisDeCredits->_CompteBancaire($CODE_BANQUE, $CODE_AGENCE, $NUMERO_COMPTE, $this->filterAC);
        $cessionListeACs = new CessionListeACs();
        return $cessionListeACs->_listeACsExiste($listeAvisDeCredits, $array);
    }
}
