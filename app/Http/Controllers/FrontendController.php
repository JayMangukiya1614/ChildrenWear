<?php

namespace App\Http\Controllers;

use App\Mail\ForgetMail;
use App\Models\UserReg;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Index;
use App\Models\AddCart;
use App\Models\ProductListing;
use App\Models\Wishlist;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;



class FrontendController extends Controller
{
  public function FrontIndex()
  {

    $data = DB::table('product_listings')->orderBy('created_at', 'desc')->paginate(8);
    return view('Frontend.index', compact('data'));
  }

  public function FrontBlog()
  {
    $data = Index::orderBy('created_at', 'desc')->get();
    return view('Frontend.Blog', compact('data'));
  }

  public function FrontShopDetails()
  {

    return view('Frontend.ShopDetails');
  }

  public function FrontShop()
  {
    // return $req->all();
    return view('Frontend.Shop');
  }

  public function FrontContact()
  {

    return view('Frontend.Contact');
  }

  public function FrontWishlistTable()
  {
    $session = Session()->get('ULogin');
    $sessionid = User::find($session);
    $data = Wishlist::where('CI_ID', $sessionid->CI_ID)->get();
    return view('Frontend.WishList', compact('data'));
  }
  public function deletewishlist($id)
  {
    $data = Wishlist::find($id);
    $data->delete();
    return back()->with('success', 'Item Deleted Successfully...');
  }
  public function FrontWishlist($id)
  {

    $session = Session()->get('ULogin');
    $sessionid = User::find($session);
    $admin_id = ProductListing::where('PI_ID', $id)->first();
    $data = new Wishlist();
    $data->CI_ID = $sessionid->CI_ID;
    $data->product_id = $id;
    $data->AD_ID = $admin_id->AD_ID;
    $data->save();

    return back()->with('info', 'Product wish list success');
  }

  public function FrontCart()
  {
    $session = Session()->get('ULogin');
    $sessionid = User::find($session);
    $cartitem = AddCart::where('CI_ID', $sessionid->CI_ID)->orderBy('updated_at', 'desc')->get(); // using for product details form quantity color etc


    return view('Frontend.ShoppingCart', compact('cartitem'));
  }



  public function FrontCheckout()
  {
    $id = Session()->get('ULogin');
    $data = User::find($id);
    $productid = AddCart::where('CI_ID', $data->CI_ID)->get();

    return view('Frontend.Checkout', compact('data', 'productid'));

    // return $productname;
  }


  public function FrontProfile()
  {

    $id = Session()->get('ULogin');
    $Edit = User::find($id);

    return view('Frontend.Profile', compact('Edit'));
  }

  public function FProfileUpdateSave(Request $Req, $id)
  {
    $Req->validate([
      'firstname' => 'required',
      'lastname' => 'required',
      'address' => 'required',
      'phoneno' => 'required | regex:/^[0-9]{10}/|min:10|max:10'


    ]);
    $data = User::find($id);
    $data->FirstName =  $Req->firstname;
    $data->LastName =  $Req->lastname;
    $data->Address =  $Req->address;
    $data->PhoneNo =  $Req->phoneno;

    $data->save();
    return redirect(route('Fprofile'))->with('Profile', 'Profile Update Successfully...');
  }


  public function FrontReg()
  {
    return view('Frontend.Reg');
  }

  public function RegDataSave(Request $req)
  {
    $req->validate([
      'firstname' => 'required |regex:/(^[A-Za-z ]+$)+/',
      'lastname' => 'required |regex:/(^[A-Za-z ]+$)+/',
      'address' => 'required',
      'zipcode' => 'required',
      'state' => 'required',
      'city' => 'required',
      'birthdate' => 'required',
      'phoneno' => 'required |',
      'email' => 'required |regex:/(.+)@(.+)\.(.+)/i',
      'password' => 'required | max:10| min:6 |',

    ]);

    $useremail = User::where([['Email', '=', $req->email]])->get()->first();

    if ($useremail) {
      return back()->with('Email', 'Email is Already Exist !!');
    } else {
      $data = new User();

      $Ci_Id = "CI" . (rand(1000, 9999));
      $CI = User::where('CI_ID', '=', $Ci_Id)->first();

      if ($CI) {
        do {
          $Ci_Id = "BH" . (rand(1000, 9999));
        } while ($Ci_Id == $CI);
      }
      $data['CI_ID'] = $Ci_Id;

      $data->FirstName = $req->firstname;
      $data->LastName = $req->lastname;
      $data->Address = $req->address;
      $data->ZipCode = $req->zipcode;
      $data->State = $req->state;
      $data->City = $req->city;
      $data->BirthDate = $req->birthdate;
      $data->PhoneNo = $req->phoneno;
      $data->Gender = $req->gender;
      $data->Email = $req->email;
      $data->Password = Hash::make($req->password);

      $data->save();

      return redirect(route('Flogin'))->with('Reg', 'Registration successfully...');
    }
  }

  public function FrontLogin()
  {
    return view('Frontend.Login');
  }

  public function CheckLogin(Request $req)
  {
    $req->validate([

      'email' => 'required |regex:/(.+)@(.+)\.(.+)/i',
      'password' => 'required | max:10| min:6',


    ]);


    $CheckLogin = DB::table('users')->where([['Email', '=', $req->email]])->get()->first();

    if ($CheckLogin) {
      if (Hash::check($req->password, $CheckLogin->Password)) {
        $check = Session()->get('ULogin');
        if ($check == null) {

          $req->Session()->put('ULogin', $CheckLogin->id);
          return redirect(route('Findex'))->with('LoginSuccess', "Login Successfully......!");
        }
        return redirect(route('Findex'))->with('error', "You Have Already Login");
      } else {
        return back()->with('Password', 'Password is not matched');
      }
    } else {
      return back()->with('Email', 'Email is not matched');
    }
  }

  public function FLogout()
  {
    if (Session()->has('ULogin')) {
      Session()->pull('ULogin');
      return redirect(route('Findex'))->with('success', 'Logout Successfullhy.....');
    } else {
      return "Please log-in account";
    }
  }

  //Change Password
  public function FPassword()
  {

    return view('Frontend.ChangePassword');
  }

  public function FChangePassword(Request $req)
  {

    $req->validate([

      'currentpass' => 'required | max:15| min:4',
      'newpass' => 'required | max:15| min:4',
      'confirmpass' => 'required | max:15| min:4',

    ]);

    $id = Session()->get('ULogin');
    $data = User::find($id);
    $session = Session()->get('ULogin');
    $sessionid = User::find($session);
    $Cart = AddCart::where([['CI_ID', '=', $sessionid->CI_ID]])->get();

    if (Hash::Check($req->currentpass, $data->Password)) {
      // dd($req->currentpass);
      if ($req->newpass == $req->confirmpass) {
        $data->Password = Hash::make($req->newpass);
        $data->update();
        return redirect(route('Fprofile'))->with('PasswordUpdate', 'Password Updated Successfully..');
      } else {
        return back()->with('NewPswdNMatch', 'New and Confirm Password not matched!!');
      }
    } else {

      return back()->with('CurrentPswdNMatch', 'Current Password not matched!!');
    }
  }

  //forget password
  public function FForgetPassword()
  {


    return view('Frontend.Forget-Password.ForgetPassword');

    return view('Frontend.Forget-Password.ForgetPassword');
  }
  public function ForgetPEmail()
  {
    return view('Frontend.Forget-Password.Forget-Email');
  }

  public function ForgetPEmailSend(Request $req)
  {
    $req->validate([
      'email' => 'required'
    ]);

    $data = User::where('Email', '=', $req->email)->first();
    if ($data != null) {
      $mail = $data->Email;
      $Forget = "FP-" . (rand(1000, 9999));

      $details = [
        'otp' => $Forget
      ];
      $req->Session()->put('F-Password', $data->id);
      $req->Session()->put('Forget', $Forget);

      Mail::to($mail)->send(new ForgetMail($details));
      return back()->with('Check', 'Email Sent Successfully.. Please Check Your Email Box');
    } else {
      return back()->with('Not', 'This Email Id is Not Avvailable On Database');
    }
  }

  public function ForgetPasswordSave(Request $req)
  {
    $req->validate([
      'newpass' => 'required | max:10| min:4 ',
      'confirmpass' => 'required | max:10| min:4',
      'otp' => 'required',


    ]);

    $id = Session()->get('F-Password');



    $data = User::find($id);
    $forget = Session()->get('Forget');
    if ($req->otp == $forget) {

      if ($req->newpass == $req->confirmpass) {
        $data->Password = Hash::make($req->newpass);
        $data->update();
        Session()->pull('F-Password');
        Session()->pull('Forget');

        return redirect(route('Flogin'))->with('Forget-Password-Update', 'Password Update Successfully....');
      } else {
        return back()->with('NewPswdNMatch', 'New and Confirm Password not match');
      }
    } else {
      return back()->with('error', 'Your Varification Code Is Not Matched...');
    }
  }
  public function productdetails($id)
  {
    return $id;
  }
}
