<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\ListePaiements\ListeADsListePaiements;

class ADsDomiciliation //extends RequeteBase
{


    // use TraitBase;
    private $filtreDom = null;
    // const FILTRE_RECHERCHE = [
    //     'IS_FAKE_SCAN',
    //     'FAKE_SCAN_DONE',
    //     'RETOUR_FONDS',
    //     'ANNEE'
    // ];
    public function __construct(array $filtreDom = null)
    {        // parent::setModelBase(AvisDeDebitModel::class);
        // parent::__construct(AvisDeDebitModel::class);
        // $this->setColNames(self::FILTRE_RECHERCHE);
        // $this->setColDate('DATE_AVIS_DEBIT');
        $this->filtreDom = $filtreDom;
    }
    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $paiements = new PaiementsDomiciliation();
        $listePaiements = $paiements->_numeroDomiciliation($NUMERO_DOMICILIATION, $this->filtreDom);
        $listeACsListePaiements = new ListeADsListePaiements();
        return $listeACsListePaiements->_listePaiementsExiste($listePaiements, $array);
    }
}
