<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Session extends BaseController
{
    public function sessionCreate()
    {
        $session = \Config\Services::session();
        $Sdata = [
            'name' => 'Vidyut',
            'email'=>'vidyut.star006@gmail.com',
        ];
        $session->set($Sdata);
       return var_dump($session);
    }
    public function sessionCheck()
    {
        $session = \Config\Services::session();
        if($session->has('name')){
            return $session->get('name').", ".$session->get('email');
        } else {
            return "session not exits..";
        }
    }
    public function sessionDestroy()
    {
        $session = \Config\Services::session();
        if($session->has('name')){
            $session->destroy();
            return "Session Destroyed Successfully...";
        } else {
            return "Error Found..";
        }
    }
}
