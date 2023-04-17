<?php
namespace App\Libraries\Traits;

/**
 */
trait TraitBase
{

    private $nomsVariables;

    private $colDate;

    private function setColNames($nomVars)
    {
        $this->nomsVariables = $nomVars;
        return $this;
    }

    private function setColDate($colDate)
    {
        $this->colDate = $colDate;
        return $this;
    }

    private function _extract(array $array = null)
    {
        if (isset($array)) {
            return $this->_extract_($array);
        }
        return array();
    }

    private function _extract_(array $array): ?array
    {
        $array1 = array();
        extract($array, EXTR_SKIP);
        foreach ($this->nomsVariables as $variable) {
            if (isset(${$variable})) {
                if ($variable == 'ANNEE')
                    $array1 = array_merge($array1, [
                        'EXTRACT(YEAR FROM ' . $this->colDate . ')' => $ANNEE
                    ]);
                else
                    $array1 = array_merge($array1, [
                        "$variable" => ${$variable}
                    ]);
            }
        }
        return ($array1);
    }
}