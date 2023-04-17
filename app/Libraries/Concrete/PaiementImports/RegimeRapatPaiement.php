<?php

namespace App\Libraries\Concrete\PaiementImports;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\PaiementExiste\RegimeRapatPaiementExiste;
use App\Libraries\Concrete\PaiementImports\DemDomPaiement;
use App\Libraries\Strategy\_idPaiement;
use App\Libraries\Traits\TraitBase;
use App\Models\RegimeRapatriementModel;

class RegimeRapatPaiement extends RequeteBase implements _idPaiement
{
    use TraitBase;
    private $filtrePaiement = null;
    const FILTRE_RECHERCHE = [
        'ACTIF',
        'ANNEE'
    ];
    public function __construct(array $filtrePaiement = null)
    {
        // parent::setModelBase(PaiementImportModel::class);
        parent::__construct(RegimeRapatriementModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_ARRETE');
        $this->filtrePaiement = $filtrePaiement;
    }
    public function _idPaiement($ID_PAIEMENT, ?array $array = null)
    {
        $paiements = new DemDomPaiement();
        $paiement = $paiements->_idPaiement($ID_PAIEMENT, $this->filtrePaiement);
        $regimeRapatPaiementExiste = new RegimeRapatPaiementExiste();
        return $regimeRapatPaiementExiste->_paiementExiste($paiement, $array);
    }
}
