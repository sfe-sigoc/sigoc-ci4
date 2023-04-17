<?php

namespace app\Libraries\Concrete\RegimeRapatriements;

use App\Libraries\Strategy\_codeRegimeRapatriement;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Traits\TraitBase;
use App\Models\ApurementModel;

class ApurementRegimeRapatriement extends RequeteBase implements _codeRegimeRapatriement
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(ApurementModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_APUREMENT');
    }

    public function _codeRegimeRapatriement($CODE_REGIME_RAPATRIEMENT, array $array = null)
    {
        $domiciliations = new DomiciliationRegimeRapatriement();
        $listeDomiciliations = $domiciliations->_codeRegimeRapatriement($CODE_REGIME_RAPATRIEMENT, $array);
        return $this->_listeDomiciliationsExiste($listeDomiciliations, $array);
    }

    private function _listeDomiciliationsExiste($listeDomiciliations = null, array $array = null)
    {
        if (isset($listeDomiciliations) && !empty($listeDomiciliations)) {
            return $this->_listeDomiciliations($listeDomiciliations, $array);
        }
        return null;
    }
    private function _listeDomiciliations($listeDomiciliations, array $array = null)
    {
        $array1 = array();
        $apurements = new ApurementDomiciliation();
        foreach ($listeDomiciliations as $domiciliation)
            array_merge($array1, $apurements->_numeroDomiciliation($domiciliation->NUMERO_DOMICILIATION, $array));
        return array_filter($array1);
    }
}
