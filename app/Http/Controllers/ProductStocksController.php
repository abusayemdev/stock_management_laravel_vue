<?php

namespace App\Http\Controllers;

use App\Models\ProductStocks;
use App\Models\ProductSizeStock;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Validator;

use DB;

class ProductStocksController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }

    
    public function product_stocks(){
     
        return view('stocks.stocks');
    }

    public function stocks_submit(Request $request){
        $validateData = Validator::make($request->all(),[
            'product_id' => 'required',
            'date' => 'required',
            'status' => 'required',
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

                $data = new ProductStocks();
                $data['product_id'] = $request->product_id;
                $data['date'] = $request->date;
                $data['status'] = $request->status;
                $data['size_id'] = $item['size_id'];
                $data['quantity'] = $item['quantity'];
                $data->save();


               //product stock size update
                $psq= ProductSizeStock::where('product_id', $request->product_id)
                        ->where('size_id', $item['size_id'])
                        ->first();
           
                if ($request->status == 'in') {
                    //stock in
                    $psq->quantity = $psq->quantity + $item['quantity'];

                }else {
                    //stock out
                    $psq->quantity = $psq->quantity - $item['quantity'];

                }

                $psq->save();
            }
        }

        flash()->success('Product stocked successfully.');
      

        return response()->json([
            'success' =>true
        ], Response::HTTP_OK);

    }

    public function stocks_history(){
        $stocks = ProductStocks::with(['product','size'])->orderBy('created_at', 'DESC')->get();

        return view('stocks.history', compact('stocks'));
    }
   
}
