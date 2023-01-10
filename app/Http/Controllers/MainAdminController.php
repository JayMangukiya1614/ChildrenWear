<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminreg;
use Illuminate\Support\Facades\Hash;

class MainAdminController extends Controller
{
    public function read()
    {
        $data = Adminreg::all();
        return view('MainAdmin.read',compact('data'));
    }
    public function MshowAdmin($id)
    {
        $data = Adminreg::find($id);
        return view('MainAdmin.Request',compact('data'));
    }
    public function acceptrequest($id)
    {
        // return $id;
        $data  =  Adminreg::find($id);
        $data->token = 1;
        // $data->profileimage = $imagename;

        $data->save();
       
        return redirect(route('main-admin-read'));
    }
    public function cancelrequest( $id)
    {

        $delete  =  Adminreg::find($id);
        $delete->delete();
        return redirect(route('main-admin-read'));



    }
}
