<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function FrontIndex()
  {
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

}