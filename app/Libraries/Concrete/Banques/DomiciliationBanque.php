<?php

namespace App\Libraries\Concrete\Banques;


use App\Libraries\Strategy\_Banque;
use App\Libraries\Traits\TraitBase;
use App\Models\DomiciliationModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\ListeDemDom\DomiciliationListeDemDoms;


class DomiciliationBanque extends RequeteBase implements _Banque
{

    use TraitBase;
    private $filtreBanque = null;
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

    public function __construct(array $filtreBanque = null)
    {
        parent::__construct(DomiciliationModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION_DOMICILIATION');
        $this->filtreBanque = $filtreBanque;
    }

    public function _Banque($CODE_BANQUE, array $array = null)
    {
        $demDoms = new DemDomBanque();
        $listeDemDoms = $demDoms->_Banque($CODE_BANQUE, $this->filtreBanque);
        $domiciliation = new DomiciliationListeDemDoms();
        return $domiciliation->_listeDemDomsExiste($listeDemDoms, $array);
    }
}
