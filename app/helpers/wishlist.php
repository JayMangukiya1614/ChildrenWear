<?php

use App\Models\Wishlist;
use App\Models\User;

function wishlist()
{

    $id = Session()->get('ULogin');
    if($id != null)
    {
        $sessionid = User::find($id);
        $wishlist = Wishlist::where('CI_ID', $sessionid->CI_ID)->get();
        return $wishlist;

    }
    return $wishlist = array();

}
