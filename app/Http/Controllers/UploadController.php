<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductValue;
use App\Product_color;
use App\Product_thumnail;
use App\Order;
use App\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;

class UploadController extends Controller
{
    public function index() {
    	$products = Product::orderBy('id', 'asc')->get();
    	return view('guest.index', ['products' => $products]);
    }

    public function detail($slug) {
    	$product = Product::where('slug', $slug)->first();
    	$values = ProductValue::where('product_id', $product->id)->select('color')->distinct()->get();
    	$roms = ProductValue::where('product_id', $product->id)->select('rom')->distinct()->get();
    	$colorname = array();
    	foreach ($values as $key => $value) {
    		$colorname[] = Product_color::where('name', $value->color)->value('code');
    	}
    	foreach ($values as $key => $value) {
    		$values[$key]->color = $colorname[$key];
    	}
    	return view('guest.detail', compact('product', 'values', 'roms'));
    }

    public function addtocart(Request $request) {
    	$colorname = Product_color::where('code', $request->color)->value('name');
    	$img = Product_thumnail::where('product_id', $request->id)->where('color', $colorname)->value('url');
    	Cart::add(['id' => $request->id, 'name' => $request->name, 'qty' => $request->qty, 'price' => $request->price, 'options' => ['rom' => $request->rom, 'color' => $request->color, 'color_name' => $colorname, 'img' => $img]]);
    	$total=Cart::count();

    	return response()->json([
    		'total'=>$total
    	]);
    }

    public function shop() {
    	$products = Product::orderBy('id', 'desc')->paginate(env('PAGES'));

    	return view('guest.shop', ['products' => $products]);
    }

    public function cart() {
    	return view('guest.cart');
    }

    public function remove(Request $request) {
    	$total = Cart::total() - Cart::get($request->id)->price;
    	Cart::remove($request->id);
    	return response()->json([
    		'id' => $request->id,
    		'total' => number_format($total),
    	]);
    }

    public function order(Request $request) {
    	$order = Order::create([
    		'name' => $request->name,
    		'sdt' => $request->phone_number,
    		'address' => $request->address,
    		'email' => $request->email,
    	]);
    	foreach (Cart::content() as $row) {
    		OrderDetail::create([
    			'order_id' => $order->id,
    			'product_id' => $row->id,
    			'rom' => $row->options->rom,
    			'color' => $row->options->color_name,
    			'price' => $row->price
    		]);
    	}
    	Cart::destroy();
		return response()->json([
			'message' => 'Đặt hàng thành công!'
		]);

    }
}
