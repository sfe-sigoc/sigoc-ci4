<?php

namespace App\Libraries\Concrete\ListeDemDom;

use App\Libraries\Abstrait\ListeDemDoms;
use App\Libraries\Concrete\Banques\FindAllBanque;
use App\Libraries\Concrete\Banques\FirstBanque;
use App\Libraries\Concrete\DemandeDomiciliations\BanqueDemDom;

class BanqueListeDemDoms extends ListeDemDoms
{
    public function _listeDemDoms($listeDemandes, array $array = null)
    {
        if (isset($listeDemandes) && !empty($listeDemandes)) {
            $array_CODE_BANQUE = array_unique(array_column($listeDemandes, 'AGENCE_CODE_BANQUE'));
            $banques = new FirstBanque();
            $arrayBanques = array_map(
                fn ($item) =>  $banques->_Banque($item, $array),
                $array_CODE_BANQUE
            );
            return  array_filter($arrayBanques);
        }
        return null;
    }
}
