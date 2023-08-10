<?php

namespace App\Http\Controllers;

use App\Models\ReturnProduct;
use App\Models\ProductSizeStock;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Validator;

use DB;

class ReturnProductController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }

    
    public function return_product(){
     
        return view('return_product.return');
    }

    public function return_product_submit(Request $request){
        $validateData = Validator::make($request->all(),[
            'product_id' => 'required',
            'date' => 'required',
            'items' => 'required',
            
        ]);

        if ($validateData->fails()) {
            return json([
                'success' =>false,
                'errors' => $validate->errors()
            ]);
        }

        foreach ($request->items as $item) {
            if ($item['quantity'] && $item['quantity'] > 0) {

                $data = new ReturnProduct();
                $data['product_id'] = $request->product_id;
                $data['date'] = $request->date;
                $data['size_id'] = $item['size_id'];
                $data['quantity'] = $item['quantity'];
                $data->save();


               //product stock size update
                $psq= ProductSizeStock::where('product_id', $request->product_id)
                        ->where('size_id', $item['size_id'])
                        ->first();
           
                
                //stock in
                $psq->quantity = $psq->quantity + $item['quantity'];


                $psq->save();
            }
        }

        flash()->success('Product stored successfully.');

        return response()->json([
            'success' =>true
        ], Response::HTTP_OK);

    }

    public function return_product_history(){
        $return_products = ReturnProduct::with(['product','size'])->orderBy('created_at', 'DESC')->get();

        return view('return_product.history', compact('return_products'));
    }
   
}
