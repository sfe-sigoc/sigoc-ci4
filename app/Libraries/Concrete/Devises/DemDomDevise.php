<?php

namespace App\Libraries\Concrete\Devises;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_codeDevise;
use App\Libraries\Traits\TraitBase;
use App\Models\DemandeDomiciliationModel;

class DemDomDevise extends RequeteBase implements _codeDevise
{
    use TraitBase;

    const FILTRE_RECHERCHE = [
        'TYPE_DEMANDE',
        'CODE_STATUT',
        'ANNEE',
        'ACCEPT_PERCEPTION',
        'EST_CREATION_OPERATEUR',
        'NO_PAIEMENT_ETR'
    ];
    public function __construct()
    {
        parent::__construct(DemandeDomiciliationModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION_DEMANDE');
    }
    function _codeDevise($CODE_DEVISE, array $array = null)
    {
        $array1 = [
            'CODE_DEVISE' => $CODE_DEVISE
        ];
        $array =  $array ?? ['ANNEE' => date("Y")];
        $array = array_key_exists('ANNEE',  $array) ?  $array : array_merge($array, ['ANNEE' => date("Y")]);
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}
