<?php

namespace App\Libraries\Abstrait;

abstract class ListeCptBqs
{
    public function _listeCptBqsExiste($listeCptBqs = null, array $array = null)
    {
        if (isset($listeCptBqs) && (!empty($listeCptBqs)))
            return $this->_listeCptBqs($listeCptBqs, $array);
        return null;
    }

    abstract public function _listeCptBqs($listeCptBqs, array $array = null);
}
