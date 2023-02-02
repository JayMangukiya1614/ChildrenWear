<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Index;

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
        $image->move(public_path('Index/'), $imagename);
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
        
        return view('MainAdmin.index.index-table',compact('data'));
    }
    public function Indexupdate($id)
    {

         $data = Index::find($id);
         return view('MainAdmin.index.index-update',compact('data'));

    }
    public function Indexupdatesave(Request $request,$id)
    {
        $request->validate([

            'title' =>  'required',
            'subtitle' =>  'required',
        ]);
        $data=Index::find($id);
        if($request->image == NULL)
        {
            // return"work";
            $data->title =$request->title;
            $data->subtitle =$request->subtitle;
            $data->update();
            return  redirect(route('Indextable'))->with('UpdateSave', " Index Data Updated Succesfully Add....!!");


        }
        
        $title = $request->title;
        $subtitle = $request->subtitle;
            $image = $request->image;
            $imagename = time() . '.' . $image->extension();
            $image->move(public_path('Index/'), $imagename);
    
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
}
