<?php

namespace App\Libraries\Concrete\PaiementImports;

use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\PaiementExiste\SocietePaiementExiste;
use App\Libraries\Strategy\_idPaiement;
use App\Models\SocieteModel;

class SocietePaiement extends RequeteBase implements _idPaiement
{

    use TraitBase;
    private $filtrePaiement = null;
    const FILTRE_RECHERCHE = [
        'CLOTURER', 'VALIDE_BANQUE', 'ANNEE'
    ];
    public function __construct(array $filtrePaiement = null)
    {
        parent::__construct(SocieteModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION');
        $this->filtrePaiement = $filtrePaiement;
    }

    public function _idPaiement($ID_PAIEMENT, ?array $array = null)
    {
        $paiements = new AvisDeDebitPaiement();
        $paiement = $paiements->_idPaiement($ID_PAIEMENT, $this->filtrePaiement);
        $societePaiementExiste = new SocietePaiementExiste();
        return $societePaiementExiste->_paiementExiste($paiement, $array);
    }
}
