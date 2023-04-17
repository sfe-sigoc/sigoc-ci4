<?php

namespace App\Libraries\Concrete\CompteBancaires;

use App\Libraries\Strategy\_CompteBancaire;
use App\Libraries\Traits\TraitBase;
use App\Models\ApurementModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\ListeAC\ApurementListeACs;

class ApurementCompteBancaire extends RequeteBase implements _CompteBancaire
{

    use TraitBase;
    private $filterAC = null;

    public function __construct(array $filterAC = null)
    {
        $this->filterAC = $filterAC;
    }

    public function _CompteBancaire($CODE_BANQUE, $CODE_AGENCE, $NUMERO_COMPTE, array $array = null)
    {
        $array = $this->filterAC == null ? $array : null; //s'il y a déjà un critere sur l'AC pas besoin avec Apurement
        $avisDeCredits = new ACsCompteBancaire();
        $listeAvisDeCredits = $avisDeCredits->_CompteBancaire($CODE_BANQUE, $CODE_AGENCE, $NUMERO_COMPTE, $this->filterAC);
        $apurementListeACs = new ApurementListeACs();
        return $apurementListeACs->_listeACsExiste($listeAvisDeCredits, $array);
    }
}
