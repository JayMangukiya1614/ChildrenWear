<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminProfileRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Adminreg;
use App\Models\ProductListing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function AdminLogin()
  {
    return view('admin.login')->with('LogOut', 'LogOut Successfully....!');
  }
  public function Alogindata(Request $request)
  {
    $request->validate([
      'email' => 'required',
      'password' => 'required',

    ]);

    $data = DB::table('adminregs')->where([['email', '=', $request->email]])->get()->first();
    if ($data) {

      if ($data->token == 1) {
        if (Hash::check($request->password, $data->password)) {

          $request->Session()->put('Alogin', $data->id);
          return redirect(route('dashboard-analytics'))->with('LoginSuccess', "Login Successfully......!");
        } else {
          return back()->with('Password', 'Password not matched');
        }
      } elseif ($data->token == 0) {

        return back()->with('Token0', 'Your Request Has Been Pending....!');
      } elseif ($data->token == 2) {


        return back()->with('Token2', 'Your Request Has Been Deleted....!');
      }
    } else {
      return back()->with('E_mail', 'Email not matched');
    }
  }

  public function AdminProfile()
  {
    $id = Session()->get('Alogin');
    $data = Adminreg::find($id);
    return view('admin.Profile', compact('data'));
  }

  public function AdminProfileSave(AdminProfileRequest $req, $id)
  {

    //  dd($req->validated());

    //    return $data =AdminReg::find($id);


    $data = $req->validated();
    if ($req->profileimage != null) {
      $imagename = time() . '.' . $data['profileimage']->extension();
      $data['profileimage']->move(public_path('images'), $imagename);
      $data['profileimage'] = $imagename;
      Adminreg::whereId($id)->update($data);

      return back()->with('Update', 'Profile Upated Successfully...');
    }

    Adminreg::whereId($id)->update($data);
    return back()->with('Update', 'Profile Upated Successfully...');
  }
  public function AdminReg()
  {
    return view('admin.Registeration');
  }

  public function AdminRegSave(AdminRequest $req)
  {
    $data = $req->validated();
    $Ad_Id = "BH" . (rand(1000, 9999));
    $AD = Adminreg::where('AD_ID', '=', $Ad_Id)->first();

    if ($AD) {
      do {
        $Ad_Id = "BH" . (rand(1000, 9999));
      } while ($Ad_Id == $AD);
    }
    $data['AD_ID'] = $Ad_Id;
    $data['token'] = 0;
    $data['password'] = Hash::make($data['password']);
    if ($req->profileimage != null) {
      $imagename = time() . '.' . $data['profileimage']->extension();
      $data['profileimage']->move(public_path('images'), $imagename);
      $data['profileimage'] = $imagename;
    }
    Adminreg::create($data);

    return back()->with("message", 'Your Request Has Been Pending');
  }
  public function Adminlogout()
  {
    if (Session()->has('Alogin')) {
      Session()->pull('Alogin');
      return redirect(route('Admin-Login'))->with('Logout', 'Logout Successfullhy.....');
    } else {
      return "Please log-in account";
    }
  }

  public function AdminProductListing()
  {
    return view('admin.listing');
  }

  public function AdminProductSave(ProductRequest $req)
  {
    $data = $req->validated();
    $id = Session()->get('Alogin');
    $check = Adminreg::find($id);
    if ($check->AD_ID == $req->AD_ID) {
      $sell = ($data['price'] * $data['discount']) / 100;
      $data['selling'] = $data['price'] - $sell;
      $data['token']  = 1;
      $data['age']  = json_encode($req->age);
      $data['size']  = json_encode($req->size);
      $data['color']  = json_encode($req->color);
      if ($des = str_word_count($data['description']) > 500) {
        return back()->with('Description', 'Your Description is Long.. Maximum Use 500 Word');
      }
      $imagename = time() . '.' . $data['productimage']->extension();
      $data['productimage']->move(public_path('ProductImages'), $imagename);
      $data['productimage'] = $imagename;
      if (str_word_count($data['Ldescription']) > 1000) {
        return back()->with('LDescription', 'Your Long Description is Also Long.. Maximum Use  1000 Word');
      }
      ProductListing::create($data);

      return redirect(route('Admin-Product-table'))->with('Success', "Product Entry SuccessFull...");
    } else {
      return back()->with('Id', 'Please Enter A Valid Id');
    }
  }

  public function AdminProductTable()
  {
    $id = Session()->get('Alogin');
    $checka = Adminreg::find($id);
    $data = ProductListing::where([['AD_ID', '=', $checka->AD_ID]])->get();
    if ($data == NULL) {
      $data = 0;
      return view('admin.Product-table', compact('data'));
    }
    // $data = ProductListing::where([['AD_ID', '=', $check->AD_ID]])->get();
    return view('admin.Product-table', compact('data'));
  }

  public function AdminProductListingShow($id)
  {
    $data = ProductListing::find($id);
    return view('admin.listing-update', compact('data'));
  }

  public function AdminProductListingUpdate(ProductRequest  $req, $id)
  {
    $data = $req->validated();
    $id = Session()->get('Alogin');
    $check = Adminreg::find($id);
    if ($check->AD_ID == $req->AD_ID) {
      if ($req->productimage == NUll) {
        return "ds";
        //     $sell = ($data['price'] * $data['discount']) / 100;
        // $data['selling'] = $data['price'] - $sell;
        // $data['token']  = 1;
        // $data['age']  = json_encode($req->age);
        // $data['size']  = json_encode($req->size);
        // $data['collection']  = json_encode($req->collection);
        // $data['color']  = json_encode($req->color);
        ProductListing::whereId($id)->update($data);

        return  redirect(route('Admin-Product-table'))->with('Update', "  Product Updated Succesfully....!!");
      }
      $sell = ($data['price'] * $data['discount']) / 100;
      $data['selling'] = $data['price'] - $sell;
      $data['token']  = 1;
      $data['age']  = json_encode($req->age);
      $data['size']  = json_encode($req->size);
      $data['collection']  = json_encode($req->collection);
      $data['color']  = json_encode($req->color);
      $imagename = time() . '.' . $data['productimage']->extension();
      $data['productimage']->move(public_path('ProductImages'), $imagename);
      $data['productimage'] = $imagename;
      ProductListing::whereId($id)->update($data);

      return  redirect(route('Admin-Product-table'))->with('Update', " Product Updated Succesfully....!!");
    } else {
      return back()->with('Id', 'Please Enter A Valid Id');
    }
  }
}