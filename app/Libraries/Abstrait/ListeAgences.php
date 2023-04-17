<?php

namespace App\Libraries\Abstrait;

abstract class ListeAgences
{
    public function _listeAgencesExiste(array $listeAgences = null, array $array = null)
    {
        if (isset($listeAgences) && !empty($listeAgences)) {
            return $this->_listeAgences($listeAgences, $array);
        }
    }
    abstract public function _listeAgences(array $listeAgences = null, array $array = null);
}
