<?php

namespace App\Libraries\Concrete\Agences;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_AgenceBanque;
use App\Libraries\Traits\TraitBase;
use App\Models\DomiciliationModel;
use App\Libraries\Concrete\ListeDemDom\DomiciliationListeDemDoms;

class DomiciliationAgenceBanque extends RequeteBase implements _AgenceBanque
{
    use TraitBase;
    private $filtreDemDom = [];
    const FILTRE_RECHERCHE = [
        'TYPE_DEMANDE',
        'CODE_STATUT',
        'ANNEE',
        'EST_PT',
        'APU_PAR_SCAN_DAU',
        'APU_IMPORT_SANS_DAU',
        'COURS_UPDATED',
        'DEPASSEMENT_AUTORISE',
        'APURER_PAR_TRANSACTION',
        'MODIF_COUNT',
        'NB_RELANCE',
        'INFRACTION_SANS_AMENDE',
        'RETARD_CUMUL'
    ];
    public function __construct(array $filtreDemDom = null)
    {
        parent::__construct(DomiciliationModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION_DOMICILIATION');
        $this->filtreDemDom = $filtreDemDom;
    }
    public function _AgenceBanque($CODE_BANQUE = null, $CODE_AGENCE = null, array $filtreDom = null)
    {
        $demandes      = new DemDomAgenceBanque();
        $listeDemDoms = $demandes->_AgenceBanque($CODE_BANQUE, $CODE_AGENCE, $this->filtreDemDom);
        $domiciliation = new DomiciliationListeDemDoms();
        return $domiciliation->_listeDemDomsExiste($listeDemDoms, $filtreDom);
    }
}
