<?php

namespace App\Http\Controllers;

use App\Models\UserReg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Index;

class FrontendController extends Controller
{
  public function FrontIndex()
  {
    $data = Index::all();
    return view('Frontend.index',compact('data'));
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

  public function FrontReg()
  {
    return view('Frontend.Reg');
  }

  public function RegDataSave(Request $req)
  {
    $data = new UserReg();

    $data->FirstName = $req->firstname;
    $data->LastName = $req->lastname;
    $data->Address = $req->address;
    $data->BirthDate = $req->birthdate;
    $data->PhoneNo = $req->phoneno;
    $data->Gender = $req->gender;
    $data->Email = $req->email;
    $data->Password = Hash::make($req->password);

    $data->save();

    return redirect(route('Flogin'));

  }

  public function FrontLogin()
  {
    return view('Frontend.Login');
  }

  public function CheckLogin(Request $req)
  {
    $CheckLogin = DB::table('user_regs')->where([['Email', '=', $req->email]])->get()->first();

    if ($CheckLogin) {
      if (Hash::check($req->password, $CheckLogin->Password)) {
        $req->Session()->put('SLogin', $CheckLogin->id);
        return view('Frontend.index');
      } else {
        return back()->with('Password', 'Password is not matched');
      }
    } else {
      return back()->with('Email', 'Email is not matched');
    }
  }

}