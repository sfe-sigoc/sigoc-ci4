<?php

namespace App\Libraries\Concrete\AvisDeDebits;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_referenceAvisDebit;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeDebitModel;

class FirstAvisDebit extends RequeteBase implements _referenceAvisDebit
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'IS_FAKE_SCAN',
        'FAKE_SCAN_DONE',
        'RETOUR_FONDS',
        'ANNEE'
    ];
    public function __construct()
    {
        // parent::setModelBase(AvisDeDebitModel::class);
        parent::__construct(AvisDeDebitModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_AVIS_DEBIT');
    }
    public function _referenceAvisDebit($REFERENCE_AVIS_DEBIT, array $array = null)
    {
        $array1 = ['REFERENCE_AVIS_DEBIT' => $REFERENCE_AVIS_DEBIT];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_first($array1);
    }
}
