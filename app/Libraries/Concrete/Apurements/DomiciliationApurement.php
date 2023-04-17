<?php

namespace App\Libraries\Concrete\Apurements;

use App\Libraries\Strategy\_idApurement;
use App\Libraries\Traits\TraitBase;
use App\Models\DomiciliationModel;
use App\Libraries\Abstrait\RequeteBase;

class DomiciliationApurement extends RequeteBase implements _idApurement
{

    use TraitBase;

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

    public function __construct()
    {
        parent::__construct(DomiciliationModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION_DOMICILIATION');
    }

    public function _idApurement($ID_APUREMENT, array $array = null)
    {
        $apurements = new FirstApurement();
        $apurement = $apurements->_idApurement($ID_APUREMENT, $array);
        $domiciliationApurementExiste = new DomiciliationApurementExiste();
        return $domiciliationApurementExiste->_apurementExiste($apurement, $array);
    }
}
