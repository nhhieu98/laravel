@extends('layouts/guest/master')

@section('content')
	<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            	@foreach ($products as $product)
                <div class="col-md-3 col-sm-6">
            		<div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{ asset('storage') }}/{{$product->thumnail[0]->url}}" alt="">
                        </div>
                        <h2><a href="{{ asset('detail') }}/{{$product->slug}}">{{$product->name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>{{number_format($product->value[2]->value)}} VNĐ</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                        </div>                       
                    </div>
                </div>
                @endforeach
            </div>
            {{$products->links()}}
        </div>
    </div>
@endsection