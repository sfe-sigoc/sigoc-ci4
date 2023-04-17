<?php

namespace App\Libraries\Concrete\Apurements;

use App\Libraries\Strategy\_idApurement;
use App\Libraries\Traits\TraitBase;
use App\Models\BanqueModel;
use App\Libraries\Concrete\Banques\FirstBanque;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_avisDeCreditExiste;
use App\Libraries\Concrete\AvisDeCreditExiste\BanqueAcExiste;

class BanqueApurement extends RequeteBase implements _idApurement
{

    use TraitBase;
    private $filtreApurement = [];

    const FILTRE_RECHERCHE = [
        'TYPE_BANQUE',
        'ACTIF'
    ];

    public function __construct(array $filtreApurement = null)
    {
        parent::__construct(BanqueModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->filtreApurement = $filtreApurement;
    }

    public function _idApurement($ID_APUREMENT, array $array = null)
    {
        $avisDeCredits = new ACsApurement();
        $avis = $avisDeCredits->_idApurement($ID_APUREMENT, $array);
        $banque = new BanqueAcExiste();
        return $banque->_avisDeCreditExiste($avis, $this->filtreApurement);
        // return $this->_avisDeCreditExiste($avis, $array);
    }

    // public function _avisDeCreditExiste($avis = null, array $array = null)
    // {
    //     if (isset($avis)) {
    //         $banques = new FirstBanque();
    //         return $banques->_Banque($avis->AGENCE_CODE_BANQUE, $array);
    //     }
    //     return null;
    // }
}
