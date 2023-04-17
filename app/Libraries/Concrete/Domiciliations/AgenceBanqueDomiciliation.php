<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\Societes\FirstDomiciliation;
use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Concrete\DomiciliationExiste\AgenceBanqueDomiciliationExiste;

class AgenceBanqueDomiciliation extends RequeteBase implements _numeroDomiciliation
{
    private $filtreDom = null;
    // use TraitBase;

    // const FILTRE_RECHERCHE = [
    //     'ACTIF'
    // ];

    public function __construct(array $filtreDom = null)
    {
        // parent::__construct(AgenceBanqueModel::class);
        // $this->setColNames(self::FILTRE_RECHERCHE);
        $this->filtreDom = $filtreDom;
    }
    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $domiciliations = new FirstDomiciliation();
        $domiciliation = $domiciliations->_numeroDomiciliation($NUMERO_DOMICILIATION, $this->filtreDom);
        $agenceBanqueDomiciliationExiste = new AgenceBanqueDomiciliationExiste();
        return $agenceBanqueDomiciliationExiste->_domiciliationExiste($domiciliation, $array);
    }
}
