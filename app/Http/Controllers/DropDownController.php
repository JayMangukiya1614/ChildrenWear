<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductListing;
use Illuminate\Support\Facades\DB;

class DropDownController extends Controller
{
    public function Products($id)
    {

        $data = ProductListing::where([['collection', '=', $id]])->get();
        $dataa = ProductListing::where([['collection', '=', $id]])->get()->first();

        return view('Frontend.Shop', compact('data', 'dataa'));
    }
    public function Product_Detail($id)
    {
        $data = ProductListing::where([['id', '=', $id]])->get()->first();
        return view('Frontend.ShopDetails', compact('data'));
    }

    public function Latest_Product($id)
    {

        $data = ProductListing::where([['collection', '=', $id]])->get()->latest()->take(5);
        return $data;
        return view('Frontend.Shop', compact('data'));
    }
    public function Product_Cart($id)
    {
        $data = ProductListing::where([['id', '=', $id]])->get()->first();
        return view('Frontend.ShoppingCart', compact('data'));


    }
}
