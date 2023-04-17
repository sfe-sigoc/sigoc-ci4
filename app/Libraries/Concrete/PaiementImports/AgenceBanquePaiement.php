<?php

namespace App\Libraries\Concrete\PaiementImports;

use App\Libraries\Concrete\Agences\FirstAgenceBanque;
use App\Libraries\Strategy\_Societe;
use App\Libraries\Traits\TraitBase;
use App\Models\AgenceBanqueModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\PaiementExiste\AgenceBanquePaiementExiste;
use App\Libraries\Strategy\_idPaiement;
use App\Libraries\Strategy\_listeCptBqs;

class AgenceBanquePaiement extends RequeteBase implements _idPaiement
{

    use TraitBase;
    private $filtrePaiement;
    const FILTRE_RECHERCHE = [
        'ACTIF'
    ];

    public function __construct(array $filtrePaiement = null)
    {
        parent::__construct(AgenceBanqueModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->filtrePaiement = $filtrePaiement;
    }

    public function _idPaiement($ID_PAIEMENT, array $array = null)
    {
        $paiements = new AvisDeDebitPaiement();
        $paiement = $paiements->_idPaiement($ID_PAIEMENT, $this->filtrePaiement);
        $agenceBanquePaiementExiste = new AgenceBanquePaiementExiste();
        return $agenceBanquePaiementExiste->_paiementExiste($paiement, $array);
    }
}
