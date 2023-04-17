<?php
namespace App\Libraries\Concrete\Apurements;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_idApurement;
use App\Libraries\Traits\TraitBase;
use App\Models\ApurementModel;

class FirstApurement extends RequeteBase implements _idApurement
{
    use TraitBase;

    const FILTRE_RECHERCHE = [
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(ApurementModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_APUREMENT');
    }

    public function _idApurement($ID_APUREMENT, array $array = null)
    {
        $array1 = [
            'ID_APUREMENT' => $ID_APUREMENT
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_first($array1);
    }
}