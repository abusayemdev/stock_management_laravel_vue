<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Validator;

use DB;

class UserController extends Controller
{

    public function __constract()
    {
        $this->middleware('auth');

    }


    public function index()
    {
         $users = User::orderby('created_at', 'DESC')->get();
         return view('user.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:20|confirmed',
            
       
        ]);

        if ($validateData->fails()) {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return back()->with($notification);
        }else {
            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);


            $insert = DB::table('users')->insert($data);

            if ($insert) {
                $notification = array(
                    'message' => 'Admin added successfully.',
                    'alert-type' =>'success'
                );

                return redirect()->route('user.index')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return back()->with($notification);
            }
        }

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('users')
                ->where('id', $id)
                ->first();

        return view('user.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $validateData = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:8|max:20|confirmed',
            
       
        ]);

        if ($validateData->fails()) {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return back()->with($notification);
        }else {
            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            if ($request->has('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $update = DB::table('users')->where('id', $id)->update($data);

            if ($update) {
                $notification = array(
                    'message' => 'Admin updated successfully.',
                    'alert-type' =>'success'
                );

                return redirect()->route('user.index')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return back()->with($notification);
            }
        }

    }


    public function destroy($id)
    {
        $delete_user = DB::table('users')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_user) {
            $notification = array(
                'message' => 'Admin deleted successfully.',
                'alert-type' =>'success'
            );

            return redirect()->route('user.index')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
