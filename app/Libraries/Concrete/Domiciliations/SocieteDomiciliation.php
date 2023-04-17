<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Models\SocieteModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DomiciliationExiste\SocieteDomiciliationExiste;
use App\Libraries\Concrete\Societes\FirstDomiciliation;

class SocieteDomiciliation extends RequeteBase  implements _numeroDomiciliation
{
    private $filtreDom = null;
    // use TraitBase;  
    // const FILTRE_RECHERCHE = [
    //     'ACTIF', 'EST_OA', 'VALIDE_FINEX', 'ANNEE'
    // ];
    public function __construct(array $filtreDom = null)
    {
        // parent::__construct(SocieteModel::class);
        // $this->setColNames(self::FILTRE_RECHERCHE);
        // $this->setColDate('DATE_CREATION');
        $this->filtreDom = $filtreDom;
    }

    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $domiciliations = new FirstDomiciliation();
        $domiciliation = $domiciliations->_numeroDomiciliation($NUMERO_DOMICILIATION, $this->filtreDom);
        $societeDomiciliationExiste = new SocieteDomiciliationExiste();
        return $societeDomiciliationExiste->_domiciliationExiste($domiciliation, $array);
    }
}