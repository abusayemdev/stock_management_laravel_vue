<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use TJGazel\Toastr\Facades\Toastr;
use Flash;

use DB;

class CategoryController extends Controller
{

    public function __constract()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $categories = DB::table('categories')->get();

        return view('category.all', compact('categories'));
    }


    public function create()
    {
        return view('category.add');
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category_name' => 'required|max:255',
       
        ]);

        $data = array();
        $data['category_name'] = $request->category_name;


        $category = DB::table('categories')->insert($data);
                
        if ($category) {
  
            $notification = array(
                'message' => 'Category inserted successfully.',
                'alert-type' =>'success'
            ); 

            
            return redirect()->route('category.index')->with($notification);
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
        $category = DB::table('categories')
                    ->where('id', $id)
                    ->first();


        return view('category.view', compact('category'));  
    }


    public function edit($id)
    {
        $edit = DB::table('categories')
                ->where('id', $id)
                ->first();

        return view('category.edit', compact('edit'));
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name' => 'required|max:255',
       
        ]);


        $data = array();
        $data['category_name'] = $request->category_name;


        $update_category = DB::table('categories')->where('id', $id)->update($data);
                
        if ($update_category) {
            $notification = array(
                'message' => 'Category updated successfully.',
                'alert-type' =>'success'
            );

            return redirect()->route('category.index')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return redirect()->route('category.index')->with($notification);
        }

    }


    public function destroy($id)
    {
        $delete_category = DB::table('categories')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_category) {
            $notification = array(
                'message' => 'Category deleted successfully.',
                'alert-type' =>'success'
            );

            return redirect()->route('category.index')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return redirect()->route('category.index')->with($notification);
        }
    }

    //AJAX REQUEST

    public function getCategoriesJson(){
        $categories = DB::table('categories')->get();

        return response()->json([
            'success' => true,
            'data' => $categories
        ], Response::HTTP_OK);
    }










}
