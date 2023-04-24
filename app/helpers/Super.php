<?php

use App\Models\Mainadmin;


function Super()
{

    $id = Session()->get('Mlogin');
    $data = Mainadmin::find($id);
    return $data->Email;
}
