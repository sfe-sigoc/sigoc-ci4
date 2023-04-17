<?php

namespace App\Libraries\Abstrait;

abstract class RequeteBase
{
    private $modelbase;
    public function __construct($model = null)
    {
        $this->modelbase = ($model !== null) ? model($model) : null;
    }
    public function setModelBase($model = null)
    {
        $this->modelbase = ($model !== null) ? model($model) : null;
    }
    public function _findAll(array $array = null)
    {
        if (isset($array) && !empty($array)) {
            $this->modelbase->where($array);
        }
        return $this->modelbase->findAll();
    }
    public function _first(array $array = null)
    {
        if (isset($array) && !empty($array)) {
            $this->modelbase->where($array);
        }
        return $this->modelbase->first();
    }
}
