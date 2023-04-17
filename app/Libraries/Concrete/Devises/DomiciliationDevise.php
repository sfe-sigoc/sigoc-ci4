<?php

namespace App\Libraries\Concrete\Devises;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\ListeDemDom\DomiciliationsListeDemDoms;
use App\Libraries\Strategy\_codeDevise;

class DemDomDevise extends RequeteBase implements _codeDevise
{
    private $filtreDevise = null;
    public function __construct(array $filtreDevise = null)
    {
        $this->filtreDevise = $filtreDevise;
    }
    function _codeDevise($CODE_DEVISE, array $array = null)
    {
        $demandes = new DemDomDevise();
        $listeDemandes = $demandes->_codeDevise($CODE_DEVISE, $this->filtreDevise);
        $domiciliationsListeDemDoms = new DomiciliationsListeDemDoms();
        return $domiciliationsListeDemDoms->_listeDemDomsExiste($listeDemandes, $array);
        // $array_ID_DEMANDE_DOMICILIATION = array_column($listeDemandes, 'ID_DEMANDE_DOMICILIATION');
        // $domiciliations = new DomiciliationDemDom();
        // $array_domiciliations = array_map(fn ($item) => $domiciliations->_idDemandeDomiciliation($item, $array), $array_ID_DEMANDE_DOMICILIATION);
        // return array_filter($array_domiciliations);
    }
}
