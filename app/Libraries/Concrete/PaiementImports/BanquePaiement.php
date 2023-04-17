<?php

namespace App\Libraries\Concrete\PaiementImports;

use App\Libraries\Traits\TraitBase;
use App\Models\BanqueModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\PaiementExiste\BanquePaiementExiste;
use App\Libraries\Strategy\_idPaiement;

class BanquePaiement extends RequeteBase implements _idPaiement
{

    use TraitBase;
    private $filtrePaiement;
    const FILTRE_RECHERCHE = [
        'ACTIF'
    ];

    public function __construct(array $filtrePaiement = null)
    {
        parent::__construct(BanqueModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->filtrePaiement = $filtrePaiement;
    }

    public function _idPaiement($ID_PAIEMENT, array $array = null)
    {
        $paiements = new AvisDeDebitPaiement();
        $paiement = $paiements->_idPaiement($ID_PAIEMENT, $this->filtrePaiement);
        $banquePaiementExiste = new BanquePaiementExiste();
        return $banquePaiementExiste->_paiementExiste($paiement, $array);
    }
}
