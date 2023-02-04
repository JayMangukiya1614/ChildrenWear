<?php

namespace App\Http\Controllers;

use App\Models\AddCart;
use Illuminate\Http\Request;
use App\Models\ProductListing;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class DropDownController extends Controller
{
    public function Products($id)
    {



        $data = ProductListing::where([['collection', '=', $id]])->get();
        // $dataa = ProductListing::where([['collection', '=', $id]])->get()->first();

        return view('Frontend.Shop', compact('data'));
    }
    public function Product_Detail($id)
    {

        $data = ProductListing::where([['id', '=', $id]])->get()->first();
        return view('Frontend.ShopDetails', compact('data'));
    }

    // public function Latest_Product($id)
    // {

    //     $data = ProductListing::where([['collection', '=', $id]])->get()->latest()->take(5);
    //     return $data;
    //     return view('Frontend.Shop', compact('data'));
    // }
    public function Product_Cart(Request $req, $id)
    {

        $sessionid = Session()->get('ULogin');
        $details = User::find($sessionid);
        $data = AddCart::where([['product_id', '=', $id]])->first();

        if ($data != null) {
            return back()->with('Product', 'You Have Already Selected Product In Add To Cart');
        } else {
            $Add_Cart = new AddCart();
            $Add_Cart->CI_ID = $details->CI_ID;
            $Add_Cart->product_id = $id;
            $Add_Cart->age = $req->age;
            $Add_Cart->color = $req->color;
            $Add_Cart->size = $req->size;
            $Add_Cart->quantity = $req->quantity;
            $Add_Cart->save();

            return redirect(route('Fcart'));
        }
    }
    public function quantity()
    {
        return $id = Session()->get('ULogin');
    }
}
