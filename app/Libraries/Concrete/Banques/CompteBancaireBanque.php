<?php
namespace App\Libraries\Concrete\Banques;

use App\Libraries\Strategy\_Banque;
use App\Libraries\Traits\TraitBase;
use App\Models\CompteBancaireModel;
use App\Libraries\Abstrait\RequeteBase;

class CompteBancaireBanque extends RequeteBase implements _Banque
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'CLOTURER',
        'VALIDE_BANQUE',
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(CompteBancaireModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION');
    }

    public function _Banque($CODE_BANQUE, array $array = null)
    {
        $array1 = [
            'AGENCE_CODE_BANQUE' => $CODE_BANQUE
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findall($array1);
    }
}

