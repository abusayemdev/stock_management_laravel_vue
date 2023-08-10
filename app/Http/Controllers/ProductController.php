<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Validator;

use DB;

class ProductController extends Controller
{

    public function __constract()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $products = DB::table('products')
                          ->join('categories','products.category_id','=','categories.id')
                          ->join('brands','products.brand_id','=','brands.id')
                          ->select('products.*','categories.category_name','brands.brand_name')
                          ->get();

        return view('product.all', compact('products'));
    }


    public function create()
    {
        return view('product.add');
    }


    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(),[
            'category_id' => 'required',
            'brand_id' => 'required',
            'sku' => 'required',
            'product_name' => 'required',
            'cost_price' => 'required',
            'retail_price' => 'required',
            'description' => 'required',
            'year' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        if ($validateData->fails()) {
            return json([
                'success' =>false,
                'errors' => $validate->errors()
            ]);
        }


        $data = array();
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['sku'] = $request->sku;
        $data['product_name'] = $request->product_name;
        $data['cost_price'] = $request->cost_price;
        $data['retail_price'] = $request->retail_price;
        $data['description'] = $request->description;
        $data['year'] = $request->year;
        $data['status'] = $request->status;

        $image=$request->file('image');
        if ($image) {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['image']=$image_url;

                
                $product_id=DB::table('products')->insertGetId($data);
                
            }

        } 

            //store product size stocks
            

            if ($request->items) {
                $stock_size = array();
                foreach (json_decode($request->items) as $item) {
                    $stock_size['product_id'] = $product_id;
                    $stock_size['size_id'] = $item->size_id;
                    $stock_size['location'] = $item->location;
                    $stock_size['quantity'] = $item->quantity;
                    $insert=DB::table('product_size_stocks')->insert($stock_size); 
                }
                

            }


            flash()->success('Product inserted successfully.');

            return response()->json([
                'success' => true
            ]);

        
    }


    public function show($id)
    {
        $product = DB::table('products')
                    ->where('products.id', $id)
                    ->join('categories','products.category_id','=','categories.id')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->select('products.*','categories.category_name','brands.brand_name')
                    ->first();

        $product_stocks = DB::table('product_size_stocks')
                    ->where('product_size_stocks.product_id', $id)
                    ->join('sizes','product_size_stocks.size_id','=','sizes.id')
                    ->select('product_size_stocks.*','sizes.size')
                    ->get();
        


        return view('product.view', compact('product', 'product_stocks'));  
    }


    public function edit($id)
    {
         $edit_product = DB::table('products')
                ->where('products.id', $id)
                ->join('categories','products.category_id','=','categories.id')
                ->join('brands','products.brand_id','=','brands.id')
                ->select('products.*','categories.*','brands.*','products.id as id','categories.id as category_id','brands.id as brand_id')
                ->first();
        
        $edit_stocks = DB::table('product_size_stocks')
                ->where('product_size_stocks.product_id', $id)
                ->join('sizes','product_size_stocks.size_id','=','sizes.id')
                ->select('product_size_stocks.*','sizes.size')
                ->get();

        $product_image = asset($edit_product->image);
 

        return view('product.edit', compact('edit_product','edit_stocks','product_image'));
    }


    public function update(Request $request, $id)
    {
        $validateData = Validator::make($request->all(),[
            'category_id' => 'required',
            'brand_id' => 'required',
            'sku' => 'required',
            'product_name' => 'required',
            'cost_price' => 'required',
            'retail_price' => 'required',
            'description' => 'required',
            'year' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        if ($validateData->fails()) {
            return json([
                'success' =>false,
                'errors' => $validate->errors()
            ]);
        }


        $data = array();
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['sku'] = $request->sku;
        $data['product_name'] = $request->product_name;
        $data['cost_price'] = $request->cost_price;
        $data['retail_price'] = $request->retail_price;
        $data['description'] = $request->description;
        $data['year'] = $request->year;
        $data['status'] = $request->status;

        $image=$request->file('image');
        if ($image) {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                 $data['image']=$image_url;

                $product = DB::table('products')->where('id', $id)->first();

                $image_path = $product->image;
                $delete_old_product_image = unlink($image_path);
                $update_with_product_image = DB::table('products')->where('id', $id)->update($data);
 
            }

        } else {
            $update_without_product_image = DB::table('products')->where('id', $id)->update($data);
        }
          
       

            //store product size stocks

            $delete_stocks = DB::table('product_size_stocks')->where('product_id', $id)->delete();
            

            if ($request->items) {
                $stock_size = array();
                foreach (json_decode($request->items) as $item) {
                    $stock_size['product_id'] = $id;
                    $stock_size['size_id'] = $item->size_id;
                    $stock_size['location'] = $item->location;
                    $stock_size['quantity'] = $item->quantity;

                    $update=DB::table('product_size_stocks')->where('product_id', $id)->insert($stock_size); 
                }
                

            }

      
            flash()->success('Product updated successfully.');


            return response()->json([
                'success' => true
            ]);
        
    }


    public function destroy($id)
    {
        $delete_product = DB::table('products')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_product) {

            flash()->success('Product deleted successfully.');

            return redirect()->route('product.index');
        }else {

            flash()->error('ERROR!');
            
            return redirect()->route('product.index');
        }
    }


    //AJAX REQUEST

    public function getProductsJson(){
        $products = Product::with(['stocks.size'])->get();

        return response()->json([
            'success' => true,
            'data' => $products
        ], Response::HTTP_OK);
    }
}
