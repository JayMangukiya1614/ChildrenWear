<?php

use App\Models\AddCart;
use App\Models\User;

function cart()
{

    $id = Session()->get('ULogin');
    if($id != null)
    {

        $sessionid = User::find($id);
        $cartitem = AddCart::where('CI_ID', $sessionid->CI_ID)->get();
        return $cartitem;
    }
    return $cartitem = array();
}
