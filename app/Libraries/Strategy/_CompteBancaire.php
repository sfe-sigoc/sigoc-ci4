<?php

namespace App\Libraries\Strategy;

interface _CompteBancaire
{
    public function _CompteBancaire($CODE_BANQUE, $CODE_AGENCE, $NUMERO_COMPTE, array $array = null);
}