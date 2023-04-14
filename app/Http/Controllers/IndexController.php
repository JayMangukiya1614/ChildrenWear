<?php

namespace App\Http\Controllers;

use App\Models\Adminreg;
use Illuminate\Http\Request;
use App\Models\Index;
use Illuminate\Support\Facades\Mail;
use App\Mail\MAPDMail;
use App\Models\ProductListing;
use Illuminate\Contracts\Session\Session;

class IndexController extends Controller
{
    public function indexform()
    {
        return view('MainAdmin.index.index-form');
    }
    public function Indexsave(Request $request)

    {
        $request->validate([

            'title' =>  'required',
            'subtitle' =>  'required',
            'image' =>  'required',
        ]);
        $title = $request->title;
        $subtitle = $request->subtitle;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('ClientCss/img/cloths/index/'), $imagename);
        $data = new Index();
        $data->title = $title;
        $data->subtitle = $subtitle;
        $data->image = $imagename;
        $data->save();
        return back()->with('Save', " Index Data Succesfully Add....!!");
    }

    public function Indextable()
    {
        $data = Index::all();

        return view('MainAdmin.index.index-table', compact('data'));
    }
    public function Indexupdate($id)
    {

        $data = Index::find($id);
        return view('MainAdmin.index.index-update', compact('data'));
    }
    public function Indexupdatesave(Request $request, $id)
    {
        $request->validate([

            'title' =>  'required',
            'subtitle' =>  'required',
        ]);
        $data = Index::find($id);
        if ($request->image == NULL) {
            // return"work";
            $data->title = $request->title;
            $data->subtitle = $request->subtitle;
            $data->update();
            return  redirect(route('Indextable'))->with('UpdateSave', " Index Data Updated Succesfully Add....!!");
        }

        $title = $request->title;
        $subtitle = $request->subtitle;
        $image = $request->image;
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('ClientCss/img/cloths/index/'), $imagename);

        $data->title = $title;
        $data->subtitle = $subtitle;
        $data->image = $imagename;
        $data->update();
        return  redirect(route('Indextable'))->with('UpdateSave', " Index Data Updated Succesfully Add....!!");
    }
    public function Indexdelete($id)
    {
        // return("work");
        $delete = Index::find($id);
        $delete->delete();
        return back()->with('Delete', "  Data  Deleted Succesfully ....!!");
    }

    public function MProductTable()
    {
        $id = Session()->get('Mlogin');
        $sessionid = Adminreg::find($id);
        $data = ProductListing::where('token', 1)->orderBy('updated_at', 'desc')->get();

      
        return view('MainAdmin.index.Main-Product-Table', compact('data','sessionid'));
    }
    public function MainAdminProductListingdelete($id)
    {
        $data = ProductListing::where('id', $id)->first();
        $email = Adminreg::where('AD_ID', '=', $data->AD_ID)->first();
        $mail = $email->email;
        $data->token = 2;

        $details = [
            'PI_ID' => $data->PI_ID
        ];

        Mail::to($mail)->send(new MAPDMail($details));
        //  return "Email sent ";
        $data->save();



        return back()->with('Success', "Product Deleted SuccessFull...");
    }
    public function MDeleteProductTable()
    {
        $data = ProductListing::where([['token', 2]])->orderBy('updated_at', 'desc')->get();

        // return 'not';
        return view('MainAdmin.index.Main-Delete-Product-Table', compact('data'));
    }
}
