<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Libraries\Concrete\DemandeDomiciliations\RegimeRapatriementDemDom;
use App\Libraries\Concrete\DemDomExiste\RegimeRapatDemDomExiste;
use App\Libraries\Strategy\_demandeDomiciliationExiste;
use App\Models\RegimeRapatriementModel;



class RegimeRapatriementDomiciliation
{
    private $filtreDom = null;
    // use TraitBase;
    // const FILTRE_RECHERCHE = [
    //     'ACTIF',
    //     'ANNEE'
    // ];
    public function __construct(array $filtreDom = null)
    {
        // parent::__construct(RegimeRapatriementModel::class);
        // $this->setColNames(self::FILTRE_RECHERCHE);
        // $this->setColDate('DATE_ARRETE');
        $this->filtreDom = $filtreDom;
    }
    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $demandes = new DemDomDomiciliation();
        $demande = $demandes->_numeroDomiciliation($NUMERO_DOMICILIATION, $this->filtreDom);
        $regimeRapatDemDomExiste = new RegimeRapatDemDomExiste();
        return $regimeRapatDemDomExiste->_demDomExiste($demande, $array);
    }
}
