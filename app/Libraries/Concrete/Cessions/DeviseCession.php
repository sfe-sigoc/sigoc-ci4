<?php

namespace App\Libraries\Concrete\Cessions;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\AvisDeDebitExiste\DeviseCessionExiste;
use App\Libraries\Strategy\_idCession;

class FindAllCession extends RequeteBase implements _idCession
{
    private $filtreCession = null;
    public function __construct(array $filtreCession = null)
    {
        $this->filtreCession =  $filtreCession;
    }
    public function _idCession($ID_CESSION, array $array = null)
    {
        $cessions = new FirstCession();
        $cession = $cessions->_idCession($ID_CESSION,  $this->filtreCession);
        $deviseCessionExiste = new DeviseCessionExiste();
        return $deviseCessionExiste->_cessionExiste($cession, $array);
    }
}
