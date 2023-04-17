<?php

namespace App\Libraries\Concrete\PaiementImports;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_idPaiement;
use App\Libraries\Traits\TraitBase;
use App\Models\PaiementImportModel;

class FindAllPaiement extends RequeteBase implements _idPaiement
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'EST_ACOMPTE',
        'DEPASSE_AUTORISATION',
        'ANNEE'
    ];
    public function __construct()
    {
        //parent::setModelBase(PaiementImportModel::class);
        parent::__construct(PaiementImportModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_PAIEMENT');
    }
    public function _idPaiement($ID_PAIEMENT, array $array = null)
    {
        $array1 = ['ID_PAIEMENT' => $ID_PAIEMENT];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}