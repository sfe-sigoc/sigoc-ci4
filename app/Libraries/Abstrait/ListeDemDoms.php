<?php

namespace App\Libraries\Abstrait;

abstract class ListeDemDoms
{
    public  function _listeDemDomsExiste($listeDemandes = null, array $array = null)
    {
        if (isset($listeDemandes) && !empty($listeDemandes)) {
            return $this->_listeDemDoms($listeDemandes, $array);
        }
        return null;
    }
    abstract public  function _listeDemDoms($listeDemDoms, array $array = null);
}
