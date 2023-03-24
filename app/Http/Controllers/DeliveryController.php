<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function Dreg()
    {
        
        return view('Delivery.DReg');
    }
    public function Dlogin()
    {
        
        return view('Delivery.Dlogin');
    }
}
