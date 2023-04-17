<?php

namespace App\Libraries\Strategy;

interface _listeACs
{
    public function _listeACsExiste(array $listeACs = null, array $array = null);
    public function _listeACs(array $listeACs, array $array = null);
    public function _avisDeCreditExiste($avis = null, array $array = null);
}