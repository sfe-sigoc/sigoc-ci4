<?php

namespace App\Libraries\Concrete\AvisDeDebits;

use App\Models\AgenceBanqueModel;
use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\AvisDeDebitExiste\AgenceBanqueAdExiste;
use App\Libraries\Strategy\_referenceAvisDebit;

class AgenceBanqueAvisDeDebits extends RequeteBase implements _referenceAvisDebit
{

    use TraitBase;
    private $filtreADs = [];
    const FILTRE_RECHERCHE = [
        'ACTIF'
    ];
    public function __construct(array $filtreADs = null)
    {
        parent::__construct(AgenceBanqueModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->filtreADs = $filtreADs;
    }
    public function _referenceAvisDebit($REFERENCE_AVIS_DEBIT, array $filtreAgence = null)
    {
        $avisDeDebits = new FirstAvisDebit();
        $avis = $avisDeDebits->_referenceAvisDebit($REFERENCE_AVIS_DEBIT, $this->filtreADs);
        $agence = new AgenceBanqueAdExiste();
        return $agence->_avisDeDebitExiste($avis, $filtreAgence);
    }
}
