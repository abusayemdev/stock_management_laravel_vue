<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

use DB;

class BrandController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $brands = DB::table('brands')->get();

        return view('brand.all', compact('brands'));
    }


    public function create()
    {
        return view('brand.add');
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|max:255',
       
        ]);

        $data = array();
        $data['brand_name'] = $request->brand_name;


        $brand = DB::table('brands')->insert($data);
                
        if ($brand) {
            $notification = array(
                'message' => 'Brand inserted successfully.',
                'alert-type' =>'success'
            );

            return redirect()->route('brand.index')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return back()->with($notification);
        }
        
    }


    public function show($id)
    {
        $brand = DB::table('brands')
                    ->where('id', $id)
                    ->first();


        return view('brand.view', compact('brand'));  
    }


    public function edit($id)
    {
        $edit = DB::table('brands')
                ->where('id', $id)
                ->first();

        return view('brand.edit', compact('edit'));
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|max:255',
       
        ]);


        $data = array();
        $data['brand_name'] = $request->brand_name;


        $update_brand = DB::table('brands')->where('id', $id)->update($data);
                
        if ($update_brand) {
            $notification = array(
                'message' => 'Brand updated successfully.',
                'alert-type' =>'success'
            );

            return redirect()->route('brand.index')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return redirect()->route('brand.index')->with($notification);
        }

    }


    public function destroy($id)
    {
        $delete_brand = DB::table('brands')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_brand) {
            $notification = array(
                'message' => 'Brand deleted successfully.',
                'alert-type' =>'success'
            );

            return redirect()->route('brand.index')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return redirect()->route('brand.index')->with($notification);
        }
    }


    //AJAX REQUEST

    public function getBrandsJson(){
        $brands = DB::table('brands')->get();

        return response()->json([
            'success' => true,
            'data' => $brands
        ], Response::HTTP_OK);
    }
}
