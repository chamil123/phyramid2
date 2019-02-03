<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\category;
use App\product;
use DB;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = DB::table('products')
                ->join('categories', 'products.cat_id', '=', 'categories.id')
                ->select('products.*', 'categories.cat_name')
                ->paginate(5);

        return view('Admin.viewproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categorys = category::all();
        return view('Admin.addProduct', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $product = new product;

        $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'cat_id' => 'required|not_in:0',
            'product_pv_value' => 'required|numeric',
            'product_image' => 'required',
        ]);

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->cat_id = $request->cat_id;
        $product->product_pv_value = $request->product_pv_value;
        $product->product_status = 1;
        //
//        $product->save();
        if ($request->hasFile('product_image')) {

            $fileName = $request->product_image->getClientOriginalName();

            $request->product_image->storeAs('public/images', $fileName);
            //$request->product_image->storeAs('public/uploads', $fileName);

            $product->product_image = $fileName;
            $product->save();
            return redirect('product/create')->with('message','Successfully added record');
        } else {
            return 'no file selected';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
         $products = product::find($id);
        return $products;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
      $categorys = category::all();
        $products = product::find($id);
        return view('Admin.updateProduct', compact('categorys', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
           $this->validate($request, [
           'product_name'=>'required',
            'product_description'=>'required',
            'product_price'=>'required|numeric',
            'cat_id'=>'required|not_in:0',
            'product_pv_value'=>'required|numeric',
            'product_image'=>'required',
        ]);
         
        $product = product::find($id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->cat_id = $request->cat_id;
        $product->product_pv_value = $request->product_pv_value;
        $product->product_status = 1;
        //

        if ($request->hasFile('product_image')) {

            $fileName = $request->product_image->getClientOriginalName();
            $request->product_image->storeAs('public/images', $fileName);

            $product->product_image = $fileName;
        } else {
            return 'no file selected';
        }

        $product->save();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
 public function productDetails($id) {
        $product = product::find($id);
        return view('Web.product-details', compact('product'));
    }

}
