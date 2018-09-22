@extends('layouts/guest/master')

@section('content')
	<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-8">
	                    <div class="product-content-right">
	                        <div class="woocommerce">
	                        	@if (Cart::count()>= 1)
	                            <form method="post" action="#">
	                                <table cellspacing="0" class="shop_table cart">
	                                    <thead>
	                                        <tr>
	                                            <th class="product-remove">&nbsp;</th>
	                                            <th class="product-thumbnail">&nbsp;</th>
	                                            <th class="product-name">Product</th>
	                                            <th class="product-price">Price</th>
	                                            <th class="product-quantity">Quantity</th>
	                                            <th class="product-subtotal">Total</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody id="next">

	                                    	@foreach(Cart::content() as $row)
	                                        <tr style="height: 100px; " id="tr-{{$row->rowId}}" class="cart_item">
	                                            <td class="product-remove">
	                                                <a id="remove" data-id='{{$row->rowId}}' title="Remove this item" class="remove" style="cursor: pointer;">×</a> 
	                                            </td>

	                                            <td class="product-thumbnail">
	                                                <a href="single-product.html"><img style="width: 80px; height: 80px;" alt="poster_1_up" class="shop_thumbnail" src="{{asset('')}}storage/{{$row->options->img}}"></a>
	                                            </td>

	                                            <td class="product-name">
	                                                <a style="font-size: 14px;" href="single-product.html">{{$row->name}} {{$row->options->rom}} (ROM) {{$row->options->color_name}}</a> 
	                                            </td>

	                                            <td class="product-price">
	                                                <span class="amount">{{number_format($row->price)}}</span> 
	                                            </td>

	                                            <td class="product-quantity">
	                                                <div class="quantity buttons_added">
	                                                    <input type="text" class="input-text qty text" title="Qty" value="{{$row->qty}}" style="width: 40px; height: 30px;">
	                                                </div>
	                                            </td>

	                                            <td class="product-subtotal">
	                                                <span class="amount">{{number_format($row->price*$row->qty)}}</span> 
	                                            </td>

	                                        </tr>
	                                        @endforeach
	                                    </tbody>
	                                </table>
	                            </form>
								@else
								<h3 style="color: red">Giỏ hàng trống!</h3>
								@endif
								<div class="cart-collaterals">
		                            <div class="cross-sells">
		                                <h2>You may be interested in...</h2>
		                                <ul class="products">
		                                    <li class="product">
		                                        <a href="single-product.html">
		                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
		                                            <h3>Ship Your Idea</h3>
		                                            <span class="price"><span class="amount">£20.00</span></span>
		                                        </a>

		                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
		                                    </li>

		                                    <li class="product">
		                                        <a href="single-product.html">
		                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg">
		                                            <h3>Ship Your Idea</h3>
		                                            <span class="price"><span class="amount">£20.00</span></span>
		                                        </a>

		                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
		                                    </li>
		                                </ul>
		                            </div>


		                            <div class="cart_totals ">
		                                <h2>Cart Totals</h2>

		                                <table cellspacing="0">
		                                    <tbody>
		                                        <tr class="shipping">
		                                            <th>Shipping and Handling</th>
		                                            <td>Free Shipping</td>
		                                        </tr>

		                                        <tr class="order-total">
		                                            <th>Order Total</th>
		                                            <td><strong><span class="amount" total_cart="{{Cart::total()}}">{{number_format(Cart::total())}} </span>VNĐ</strong> </td>
		                                        </tr>
		                                    </tbody>
		                                </table>
		                            </div>


		                            <form method="post" action="" class="shipping_calculator">
		                                <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Calculate Shipping</a></h2>

		                                <section id="calcalute-shipping-wrap" class="shipping-calculator-form collapse">

		                                <p class="form-row form-row-wide"><input type="text" id="info_name" name="calc_shipping_state" placeholder="Name" value="" class="input-text"> </p>

		                                <p class="form-row form-row-wide"><input type="text" id="info_number" name="calc_shipping_state" placeholder="Phone number" value="" class="input-text"> </p>

		                                <p class="form-row form-row-wide"><input type="text" id="info_address" name="calc_shipping_state" placeholder="Address" value="" class="input-text"> </p>

		                                <p class="form-row form-row-wide"><input type="text" id="info_email" name="calc_shipping_postcode" placeholder="Email" value="" class="input-text"></p>


		                                <p>
		                                	<button class="button" id="orderCart" name="calc_shipping" type="submit">Order</button>
		                                </p>

		                                </section>
		                            </form>
	                            </div>

                            </div>
                        </div>                        
                    </div>

                    <div class="col-md-4">
	                    <div class="single-sidebar">
	                        <h2 class="sidebar-title">Search Products</h2>
	                        <form action="#">
	                            <input type="text" placeholder="Search products...">
	                            <input type="submit" value="Search">
	                        </form>
	                    </div>
	                    
	                    <div class="single-sidebar">
	                        <h2 class="sidebar-title">Products</h2>
	                        <div class="thubmnail-recent">
	                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
	                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
	                            <div class="product-sidebar-price">
	                                <ins>$700.00</ins> <del>$800.00</del>
	                            </div>                             
	                        </div>
	                        <div class="thubmnail-recent">
	                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
	                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
	                            <div class="product-sidebar-price">
	                                <ins>$700.00</ins> <del>$800.00</del>
	                            </div>                             
	                        </div>
	                        <div class="thubmnail-recent">
	                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
	                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
	                            <div class="product-sidebar-price">
	                                <ins>$700.00</ins> <del>$800.00</del>
	                            </div>                             
	                        </div>
	                        <div class="thubmnail-recent">
	                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
	                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
	                            <div class="product-sidebar-price">
	                                <ins>$700.00</ins> <del>$800.00</del>
	                            </div>                             
	                        </div>
	                    </div>
	                    
	                    <div class="single-sidebar">
	                        <h2 class="sidebar-title">Recent Posts</h2>
	                        <ul>
	                            <li><a href="#">Sony Smart TV - 2015</a></li>
	                            <li><a href="#">Sony Smart TV - 2015</a></li>
	                            <li><a href="#">Sony Smart TV - 2015</a></li>
	                            <li><a href="#">Sony Smart TV - 2015</a></li>
	                            <li><a href="#">Sony Smart TV - 2015</a></li>
	                        </ul>
	                    </div>
                	</div>                 
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('script')
	<script type="text/javascript">
		$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});	

		$(document).on('click', '#remove', function() {
			var id = $(this).data('id');
			
			$.ajax({
				type: 'post',
				url: '{{ asset('cart') }}' ,
				data: {
					id: id,
				},
				success: function(res){
					$('#tr-' + res.id).remove();
					$('.amount').html(res.total);
					toastr.success('Xóa sản phẩm thành công!');
				}
			})
		});

		$(document).on('click', '#orderCart', function(e){
			e.preventDefault();
			var name = $('#info_name').val();
			var phone = $('#info_number').val();
			var address = $('#info_address').val();
			var email = $('#info_email').val();

			$.ajax({
				type: 'post',
				url: '{{ asset('order') }}',
				data: {
					name: name,
					phone_number: phone,
					address: address,
					email: email,
				},

				success: function(res) {
					toastr.success('Đặt hàng thành công!');
					$('#next').empty();
					$('.amount').html(0);
				}
			})
		})
	</script>
@endsection