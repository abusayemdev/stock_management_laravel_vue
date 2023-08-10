<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

use DB;

class SizeController extends Controller
{

    public function __constract()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $sizes = DB::table('sizes')->get();

        return view('size.all', compact('sizes'));
    }


    public function create()
    {
        return view('size.add');
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'size' => 'required|max:50',
       
        ]);

        $data = array();
        $data['size'] = $request->size;


        $size = DB::table('sizes')->insert($data);
                
        if ($size) {
            $notification = array(
                'message' => 'Size inserted successfully.',
                'alert-type' =>'success'
            );

            return redirect()->route('size.index')->with($notification);
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
        $size = DB::table('sizes')
                    ->where('id', $id)
                    ->first();


        return view('size.view', compact('size'));  
    }


    public function edit($id)
    {
        $edit = DB::table('sizes')
                ->where('id', $id)
                ->first();

        return view('size.edit', compact('edit'));
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'size' => 'required|max:50',
       
        ]);


        $data = array();
        $data['size'] = $request->size;


        $update_size = DB::table('sizes')->where('id', $id)->update($data);
                
        if ($update_size) {
            $notification = array(
                'message' => 'Size updated successfully.',
                'alert-type' =>'success'
            );

            return redirect()->route('size.index')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return redirect()->route('size.index')->with($notification);
        }

    }


    public function destroy($id)
    {
        $delete_size = DB::table('sizes')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_size) {
            $notification = array(
                'message' => 'Size deleted successfully.',
                'alert-type' =>'success'
            );

            return redirect()->route('size.index')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return redirect()->route('size.index')->with($notification);
        }
    }


        //AJAX REQUEST

        public function getSizesJson(){
            $sizes = DB::table('sizes')->get();
    
            return response()->json([
                'success' => true,
                'data' => $sizes
            ], Response::HTTP_OK);
        }
}
