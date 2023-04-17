<?php

namespace App\Libraries\Concrete\Cessions;

use App\Libraries\Concrete\AvisDeDebitExiste\ACsCessionExiste;
use App\Libraries\Strategy\_idCession;

class ACsCession implements _idCession
{
    private $filtreCession = null;
    public function __construct(array $filtreCession = null)
    {
        $this->filtreCession = $filtreCession;
    }
    public function _idCession($ID_CESSION, array $array = null)
    {
        $cessions = new FirstCession();
        $cession = $cessions->_idCession($ID_CESSION, $this->filtreCession);
        $aCsCessionExiste = new ACsCessionExiste();
        return $aCsCessionExiste->_cessionExiste($cession, $array);
    }
}
