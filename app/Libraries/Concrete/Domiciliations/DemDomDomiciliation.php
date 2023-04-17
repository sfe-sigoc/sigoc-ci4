<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Concrete\DemandeDomiciliations\FirstDemandeDomiciliation;
use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Models\DemandeDomiciliationModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DomiciliationExiste\DemDomDomiciliationExiste;
use App\Libraries\Concrete\Societes\FirstDomiciliation;
use App\Libraries\Strategy\_domiciliationExiste;

class DemDomDomiciliation extends RequeteBase  implements _numeroDomiciliation
{

    use TraitBase;
    private $filtreDom = null;
    // const FILTRE_RECHERCHE = [
    //     'TYPE_DEMANDE',
    //     'CODE_STATUT',
    //     'ANNEE',
    //     'ACCEPT_PERCEPTION',
    //     'EST_CREATION_OPERATEUR',
    //     'NO_PAIEMENT_ETR'
    // ];

    public function __construct(array $filtreDom = null)
    {
        // parent::__construct(DemandeDomiciliationModel::class);
        // $this->setColNames(self::FILTRE_RECHERCHE);
        // $this->setColDate('DATE_CREATION_DEMANDE');
        $this->filtreDom = $filtreDom;
    }

    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $domiciliations = new FirstDomiciliation();
        $domiciliation = $domiciliations->_numeroDomiciliation($NUMERO_DOMICILIATION,  $this->filtreDom);
        $demDomDomiciliationExiste = new DemDomDomiciliationExiste();
        return $demDomDomiciliationExiste->_domiciliationExiste($domiciliation, $array);
    }
}
