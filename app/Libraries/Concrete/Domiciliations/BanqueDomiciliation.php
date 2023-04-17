<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Traits\TraitBase;
use App\Models\BanqueModel;
use App\Libraries\Concrete\Domiciliations\DemDomDomiciliation;
use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DemDomExiste\BanqueDemDomExiste;

class BanqueDomiciliation extends RequeteBase  implements _numeroDomiciliation
{
    private $filtreDom = null;

    // use TraitBase;
    // private $filtreDemdom = null;
    // const FILTRE_RECHERCHE = [
    //     'TYPE_BANQUE',
    //     'ACTIF'
    // ];

    public function __construct(array $filtreDom = null)
    {
        // parent::__construct(BanqueModel::class);
        // $this->setColNames(BanqueDomiciliation::FILTRE_RECHERCHE);
        $this->filtreDom = $filtreDom;
    }

    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $demDoms = new DemDomDomiciliation();
        $demande = $demDoms->_numeroDomiciliation($NUMERO_DOMICILIATION,  $this->filtreDom);
        $banqueDemDomExiste = new BanqueDemDomExiste();
        return $banqueDemDomExiste->_demDomExiste($demande, $array);
    }
}
