<?php

use App\Models\Adminreg;


function Profile()
{

    $id = Session()->get('Alogin');
    if($id != null)
    {

        $sessionid = Adminreg::find($id);
        $profile =$sessionid->profileimage;
        return $profile;
    }
    return $profile = 'default.jpg';
}