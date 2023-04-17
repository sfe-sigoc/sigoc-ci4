<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Traitements\AvisDeCredits;

class AvisDeCreditsController extends BaseController
{
    public function index()
    {
        $data['name'] = 'John Doe';
        $data['content'] = 'crud/index_crud';
        return view('templates/main', $data);
    }

    public function user_table()
    {
        helper('fonctions_helper');
        $model = new AvisDeCredits();
        $data['users'] = $model->_AgenceBanque('00008', '00490', ['EST_CEDER' => 1]);
        echo view('crud/user_table', $data);
    }
}