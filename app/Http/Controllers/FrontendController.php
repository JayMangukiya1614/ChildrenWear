<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Index;

class FrontendController extends Controller
{
  public function FrontIndex()
  {
    // $data = Index::all();
    // ,compact('data')
    return view('Frontend.index');
  }

  public function FrontLogin()
  {
    return view('Frontend.Login');
  }

  public function FrontReg()
  {
    return view('Frontend.Reg');
  }

  public function FrontShopDetails()
  {
    return view('Frontend.ShopDetails');
  }

  public function FrontShop()
  {
    return view('Frontend.Shop');
  }

  public function FrontContact()
  {
    return view('Frontend.Contact');
  }

  public function FrontCart()
  {
    return view('Frontend.ShoppingCart');
  }

  public function FrontCheckout()
  {
    return view('Frontend.Checkout');
  }

  public function FrontProfile()
  {
    return view('Frontend.Profile');
  }

 
}