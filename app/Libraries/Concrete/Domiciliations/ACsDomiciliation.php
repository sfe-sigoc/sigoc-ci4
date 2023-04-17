<?php

namespace App\Libraries\Concrete\Domiciliations;


use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\CompteBancaireExiste\ACsCompteBancaireExiste;


class ACsDomiciliation extends RequeteBase
{
    private $filtreDom = null;

    public function __construct(array $filtreDom = null)
    {
        $this->filtreDom = $filtreDom;
    }

    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $compteBancaires = new CompteBancaireDomiciliation();
        $compteBancaire = $compteBancaires->_numeroDomiciliation($NUMERO_DOMICILIATION, $this->filtreDom); // ----$array?--------
        $aCsCompteBancaireExiste = new ACsCompteBancaireExiste();
        return $aCsCompteBancaireExiste->_compteBancaireExiste($compteBancaire, $array);
    }
}
