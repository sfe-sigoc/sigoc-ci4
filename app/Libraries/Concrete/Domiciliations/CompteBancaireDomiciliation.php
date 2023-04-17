<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DomiciliationExiste\CptBqDomiciliationExiste;
use App\Libraries\Concrete\Societes\FirstDomiciliation;

class CompteBancaireDomiciliation extends RequeteBase implements _numeroDomiciliation
{
    private $filtreDom = null;
    // use TraitBase;

    // const FILTRE_RECHERCHE = [
    //     'CLOTURER',
    //     'VALIDE_BANQUE',
    //     'ANNEE'
    // ];

    public function __construct(array  $filtreDom = null)
    {
        // parent::__construct(CompteBancaireModel::class);
        // $this->setColNames(self::FILTRE_RECHERCHE);
        // $this->setColDate('DATE_CREATION');
        $this->filtreDom = $filtreDom;
    }

    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $domiciliations = new FirstDomiciliation();
        $domiciliation = $domiciliations->_numeroDomiciliation($NUMERO_DOMICILIATION,  $this->filtreDom);
        $cptBqDomiciliationExiste = new CptBqDomiciliationExiste();
        return $cptBqDomiciliationExiste->_domiciliationExiste($domiciliation, $array);
    }
}
