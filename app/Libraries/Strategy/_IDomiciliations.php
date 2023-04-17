<?php

namespace App\Libraries\Interfaces;

interface IDomiciliations
{
    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null);
    public function _domiciliationExiste($domiciliation = null, array $array = null);
}