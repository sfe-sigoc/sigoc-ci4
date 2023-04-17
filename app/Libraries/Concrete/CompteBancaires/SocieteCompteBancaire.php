<?php

namespace App\Libraries\Concrete\CompteBancaires;

use App\Libraries\Strategy\_CompteBancaire;
use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\CompteBancaireExiste\SocieteCompteBancaireExiste;

class SocieteCompteBancaire extends RequeteBase implements _CompteBancaire
{

    use TraitBase;
    private  $filtreCptBq = null;

    public function __construct(array $filtreCptBq = null)
    {
        $this->filtreCptBq = $filtreCptBq;
    }

    public function _CompteBancaire($CODE_BANQUE, $CODE_AGENCE, $NUMERO_COMPTE, array $array = null)
    {
        $comptebancaires = new FirstCompteBancaire();
        $compteBancaire = $comptebancaires->_CompteBancaire($CODE_BANQUE, $CODE_AGENCE, $NUMERO_COMPTE, $this->filtreCptBq);
        $societeCompteBancaireExiste = new SocieteCompteBancaireExiste();
        return $societeCompteBancaireExiste->_compteBancaireExiste($compteBancaire, $array);
    }
}
