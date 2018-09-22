<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Product;
    use App\Attribute;
    use App\Value;
    use App\Product_thumnail;
    use App\ProductValue;
    use Yajra\Datatables\Datatables;
    use App\Http\Requests\ProductStoreRequest;

    class ProductController extends Controller
    {
        public function index() {

        	return view('admin.product.index');
        }

        public function getList() {

          $products = Product::orderBy('id', 'desc')->get();
          return datatables()->of($products)
          ->addColumn('action', function ($products) {
            return '<button title="Thêm chi tiết" data-target="#addinfomodal" class="btn btn-xs btn-info" id="adddetail" data-id="'. $products->id .'"><i class="glyphicon glyphicon-plus"></i></button> <button title="Xem chi tiết" class="btn btn-xs btn-primary" data-id="'. $products->id .'"><i class="glyphicon glyphicon-eye-open"></i></button> <button title="Sửa" data-toggle="modal" data-target="#editmodal" class="btn btn-xs btn-warning" data-id="'. $products->id .'"><i class="glyphicon glyphicon-edit"></i></button> <button title="Xóa" class="btn btn-xs btn-danger" id="delete" data-id="'. $products->id .'"><i class="glyphicon glyphicon-trash"></i></button> <button title="Thêm ảnh" id="upload" data-target="#uploadmodal" class="btn btn-xs btn-default" data-id="'. $products->id .'"><i class="glyphicon glyphicon-file"></i></button>';
        })
          ->toJson(true);
      }

      public function store(ProductStoreRequest $request) {
          $request['code'] = 'SP'.time();
          $request['slug'] = str_slug($request->name);
          $product = Product::store($request->all());
          return response()->json([
            'error' => false,
            'data' => $product   
        ], 201);
      }

      public function edit($id)
      {   
        $products = Product::find($id);
        return response()->json([
            'data' => $products
        ]);
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $products->update($request->all());

        return response()->json([
            'data' => $products
        ]);
    }

    public function destroy($id) {

        Product::find($id)->delete();
        Product_thumnail::where('product_id', $id)->delete();

        return response()->json([
            'message' => 'Xóa thành công'
        ]);
    }

    public function storeImage(Request $request) {
       if ($request->hasFile('file')) {
          $path = $request->file->storeAs('product', 'image_'. time().'.jpg');
          Product_thumnail::insert([
             'product_id' => $request->product_id,
             'color' => $request->color,
             'url' => $path
         ]);
      }

      return response()->json([
          'message' => 'ok'
      ]);
    }

    public function storeDetail(Request $request, $id) {
       $data = $request->all();
       if(ProductValue::where('product_id', $id)->where('rom', $data['rom'])->where('color', $data['color'])->first() == ''){
        $data['product_id'] = $id;
        $products = ProductValue::store($data);
        $product = Product::where('id', $id)->first();
        $atts = Attribute::select('id', 'column')->get();
        $mang = ProductValue::where('product_id', $id)->get();
        foreach ($request->all() as $key => $value) {
            Value::create([
                'product_id' => $id,
                'attribute_id' => Attribute::where('column', $key)->first()->id,
                'value' => $value
            ]);
        }
    }else{
        $product = Product::where('id', $id)->first();
        ProductValue::where('product_id', $id)->where('rom', $data['rom'])->where('color', $data['color'])->update([
            'quantity' => ProductValue::where('product_id', $id)->where('rom', $data['rom'])->where('color', $data['color'])->value('quantity') + $data['quantity'],
            'price' => $data['price']
        ]);
        $mang = ProductValue::where('product_id', $id)->get();
    }
    return response()->json([
      'data' => $mang,
      'code' => $product->code
    ]);
    }

    public function storeDetail2($id) {
       $product = Product::where('id', $id)->first();
       $mang = ProductValue::where('product_id', $id)->get();
       return response()->json([
          'data' => $mang,
          'code' => $product->code
      ]);
    }

    public function show($id){
       $i = Attribute::where('column', 'color')->value('id');
       $color = Value::where('attribute_id', $i)->where('product_id', $id)->select('value')->distinct()->get();
       return response()->json([
          'data' => $color
      ]);
    }
    public function destroy2($id){
       ProductValue::find($id)->delete();
       return response()->json([
          'data' => $id
      ]);
    }
}