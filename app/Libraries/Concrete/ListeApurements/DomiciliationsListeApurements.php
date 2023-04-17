<?php

namespace App\Libraries\Concrete\ListeDemDom;

use App\Libraries\Abstrait\ListeApurements;
use App\Libraries\Concrete\Societes\FirstDomiciliation;

class DomiciliationsListeApurements extends ListeApurements
{
    public function _listeApurements($listeApurements = null, array $array = null)
    {
        if (isset($listeApurements) && !empty($listeApurements)) {
            $domiciliations = new FirstDomiciliation();
            $arrayNUMERO_DOMICILIATION = array_column($listeApurements, 'NUMERO_DOMICILIATION');
            $arrayDomiciliations = array_map(fn ($item) => $domiciliations->_numeroDomiciliation($item, $array), $arrayNUMERO_DOMICILIATION);
            return array_filter($arrayDomiciliations);
        }
        return null;
    }
}
