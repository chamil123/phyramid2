<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\product;
use App\orders;
use DB;
use App\dummey_pv;
use App\temp_dummey_pv;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {

    public function index() {
        $dummeys = DB::table('dummeys')
                ->select('dummeys.dummey_name', 'dummeys.id')
                ->where('user_id', Auth::user()->id)
                ->get();
        $carts = Cart::content();
        return view('Web.shopping-cart', compact('carts', 'dummeys'));
    }

    public function checkout(Request $request) {
        $orders = new orders();
        $order = orders::createOrder();
        $orders->order_total=$request->total;
        $orders->user_id = $order->id;
        $orders->save();
        $lastid = $orders->id;
        $i = 0;
        foreach (Cart::content() as $data) {
            $orders->orderCols()->attach($data->id, [
                'total' => $data->qty * $data->price,
                'qty' => $data->qty,
                'pv_value' => $data->options->pv,
                'image' => $data->options->img
                    ]
            );
            $orders_product_id = DB::table('orders_product')->orderBy('id', 'DESC')->take(1)->select('orders_product.id')->get();
            $order_productss = DB::table('temp_dummey_pvs')
                    ->select('temp_dummey_pvs.dummey_id', 'temp_dummey_pvs.product_id', 'temp_dummey_pvs.pv_value')
                    ->where('product_id', $data->id)
                    ->get();
            $val = 0;
            foreach ($order_productss as $order_product) {
                $dummey_pv = new dummey_pv();
                $dummey_pv->orders_product_id = $orders_product_id[0]->id;
                $dummey_pv->dummey_id = $order_product->dummey_id;
                $dummey_pv->pv = $order_product->pv_value;
                $dummey_pv->save();
                $val++;
            }
            if ($val > 0) {
                
            } else {
                $dummey_pv = new dummey_pv();
                $dummey_pv->orders_product_id = $orders_product_id[0]->id;
                $dummey_pv->dummey_id = $request->dummey_id;
                $dummey_pv->pv = $data->options->pv;
                $dummey_pv->save();
            }
            $val = 0;
        }
        temp_dummey_pv::query()->truncate();
        Cart::destroy();
        return back();
    }

    public function addItem($id) {
        // return $id;
//        $carts = Cart::content();
        $pro = product::find($id);

//        Cart::add(['id' => $pro->id, 'name' => $pro->product_name, 'qty' => 1, 'price' => $pro->product_price, 'options' => ['size' => 'large']]);

        Cart::add(['id' => $pro->id, 'name' => $pro->product_name, 'qty' => 1, 'price' => $pro->product_price, 'options' => ['img' => $pro->product_image, 'pv' => $pro->product_pv_value]]);

        return back();
    }

    public function removeItem($id) {
        Cart::remove($id);
        return back();
    }

    public function update(Request $request) {
        $qty = $request->newQty;
        $rowId = $request->rowID;
        Cart::update($rowId, $qty);
        echo 'cart updated successfuly';
        // return back();
    }

    public function storeDummeyPv(Request $request) {
        $temp_dummey_pv = new temp_dummey_pv();
        $temp_dummey_pv->dummey_id = $request->dummey_id;
        $temp_dummey_pv->product_id = $request->product_id;
        $temp_dummey_pv->pv_value = $request->pv_value;

        print_r($temp_dummey_pv);
        $temp_dummey_pv->save();
    }

    public function viewDummeyPv($id) {
        $temp_dummey_pv = DB::table('temp_dummey_pvs')
                ->select('temp_dummey_pvs.id', 'temp_dummey_pvs.dummey_id', 'temp_dummey_pvs.product_id', 'temp_dummey_pvs.pv_value')
                ->where('product_id', $id)
                ->get();
//        $temp_dummey_pv = temp_dummey_pv::all($id);
        return $temp_dummey_pv;
    }

    public function delete_pv($id) {
        $temp_dummey_pv = temp_dummey_pv::find($id);
        $temp_dummey_pv->delete();
        return "ss";
    }

    public function viewOrders() {
        $user_id = Auth::user()->id;
        
          $orders = orders::select(\DB::raw('orders.*, SUM(dummey_pvs.pv) as PV_value'))

                ->leftJoin('orders_product', 'orders_product.orders_id', '=', 'orders.id')
                  ->leftJoin('dummey_pvs', 'orders_product.id', '=', 'dummey_pvs.orders_product_id')
                ->groupBy('orders.id')
                ->where('orders.user_id', '=', $user_id)
                ->get();
//
        return view('Admin.viewOrders', compact('orders'));
    }

    public function viewOrdersById($id) {

        $order_products = DB::table('orders_product')
                ->join('products', 'orders_product.product_id', '=', 'products.id')
                ->join('orders', 'orders_product.orders_id', '=', 'orders.id')
                ->select('orders_product.*', 'products.product_name', 'orders.created_at','orders.order_total')
                ->where('orders_id', $id)
                ->get();
        return $order_products;
    }

}
