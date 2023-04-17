<?php

namespace App\Libraries\Concrete\PaiementImports;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\AvisDeDebitExiste\PaiementAdExiste;
use App\Libraries\Strategy\_idPaiement;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeDebitModel;

class AvisDeDebitPaiement extends RequeteBase implements _idPaiement
{
    use TraitBase;
    private $filtrePaiement = null;
    const FILTRE_RECHERCHE = [
        'EST_ACOMPTE',
        'DEPASSE_AUTORISATION',
        'ANNEE'
    ];
    public function __construct(array $filtrePaiement = null)
    {
        //parent::setModelBase(PaiementImportModel::class);
        parent::__construct(AvisDeDebitModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_AVIS_DEBIT');
    }
    public function _idPaiement($ID_PAIEMENT, array $array = null)
    {
        $paiements = new FirstPaiement();
        $paiement = $paiements->_idPaiement($ID_PAIEMENT, $this->filtrePaiement);
        $paie = new PaiementAdExiste();
        return $paie->_avisDeDebitExiste($paiement, $array);
    }
}
