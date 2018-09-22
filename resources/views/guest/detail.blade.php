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

			<div class="col-md-8">
				<div class="product-content-right">
					<div class="product-breadcroumb">
						<a href="">Home</a>
						<a href="">Category Name</a>
						<a href="">{{$product->name}}</a>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="product-images">
								<div class="product-main-img">
									<img src="{{ asset('storage') }}/{{$product->thumnail[0]->url}}" alt="">
								</div>

								<div class="product-gallery">
									<img src="img/product-thumb-1.jpg" alt="">
									<img src="img/product-thumb-2.jpg" alt="">
									<img src="img/product-thumb-3.jpg" alt="">
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="product-inner">
								<input type="hidden" detail_id="{{$product->id}}" name="" id="detail_id">
								<h2 class="product-name" id="detail_name" detail_name="{{$product->name}}">{{$product->name}}</h2>
								<div class="product-inner-price">
									<ins id="detail_price" detail_price="{{$product->value[2]->value}}"> {{number_format($product->value[2]->value)}} VNĐ</ins>
								</div>    

								<div class="product-inner-color">
									<div style="float: left;margin-right: 10px;">Màu sắc: </div>
									@foreach ($values as $value)
									<div style="float: left;">
										<button class="color" style="background-color: {{$value->color}}; width: 20px; height: 20px; float: left; margin-right: 5px; margin-bottom: 30px; border:none; border: 1px solid;" id="detail_color" detail_color="{{$value->color}}"></button>
									</div>
									@endforeach
									<div style="clear: both;"></div>
								</div> 

								<div style="clear: both;"></div>

								<div class="product-inner-rom">
									<div style="float: left;margin-right: 10px;">ROM: </div>
									
									@foreach ($roms as $key => $rom)
									<div style="float: left;">
										<a class="item">
											<span id="rom-{{$key}}" class="rom" style="width: 80px; height: 30px; float: left; margin-right: 5px; margin-bottom: 30px; border: 1px solid; padding-top: 2px; padding-left: 7px; border-radius: 5px;" id="detail_rom" detail_rom="{{$rom->rom}}">
												<i class="fa fa-check-circle-o"></i>
												{{$rom->rom}}
											</span>
										</a>
									</div>
									@endforeach
									<div style="clear: both;"></div>
								</div>

								<form action="" class="cart">
									<div class="quantity">
										<input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1" id="detail_quantity">
									</div>
									<button id="addtocart" class="add_to_cart_button">Add to cart</button>
								</form>

								<div role="tabpanel">
									<ul class="product-tab" role="tablist">
										<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
										<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
									</ul>
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="home">
											<h2>Product Description</h2>  
											<p>{{$product->description}}</p>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="profile">
											<h2>Reviews</h2>
											<div class="submit-review">
												<p><label for="name">Name</label> <input name="name" type="text"></p>
												<p><label for="email">Email</label> <input name="email" type="email"></p>
												<div class="rating-chooser">
													<p>Your rating</p>

													<div class="rating-wrap-post">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
												</div>
												<p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
												<p><input type="submit" value="Submit"></p>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>

					<div class="content-mobile">
						{!!$product->content!!}
					</div>

					<div class="related-products-wrapper">
						<h2 class="related-products-title">Related Products</h2>
						<div class="related-products-carousel">
							<div class="single-product">
								<div class="product-f-image">
									<img src="img/product-1.jpg" alt="">
									<div class="product-hover">
										<a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
										<a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
									</div>
								</div>

								<h2><a href="">Sony Smart TV - 2015</a></h2>

								<div class="product-carousel-price">
									<ins>$700.00</ins> <del>$100.00</del>
								</div> 
							</div>
							<div class="single-product">
								<div class="product-f-image">
									<img src="img/product-2.jpg" alt="">
									<div class="product-hover">
										<a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
										<a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
									</div>
								</div>

								<h2><a href="">Apple new mac book 2015 March :P</a></h2>
								<div class="product-carousel-price">
									<ins>$899.00</ins> <del>$999.00</del>
								</div> 
							</div>
							<div class="single-product">
								<div class="product-f-image">
									<img src="img/product-3.jpg" alt="">
									<div class="product-hover">
										<a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
										<a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
									</div>
								</div>

								<h2><a href="">Apple new i phone 6</a></h2>

								<div class="product-carousel-price">
									<ins>$400.00</ins> <del>$425.00</del>
								</div>                                 
							</div>
							<div class="single-product">
								<div class="product-f-image">
									<img src="img/product-4.jpg" alt="">
									<div class="product-hover">
										<a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
										<a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
									</div>
								</div>

								<h2><a href="">Sony playstation microsoft</a></h2>

								<div class="product-carousel-price">
									<ins>$200.00</ins> <del>$225.00</del>
								</div>                            
							</div>
							<div class="single-product">
								<div class="product-f-image">
									<img src="img/product-5.jpg" alt="">
									<div class="product-hover">
										<a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
										<a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
									</div>
								</div>

								<h2><a href="">Sony Smart Air Condtion</a></h2>

								<div class="product-carousel-price">
									<ins>$1200.00</ins> <del>$1355.00</del>
								</div>                                 
							</div>
							<div class="single-product">
								<div class="product-f-image">
									<img src="img/product-6.jpg" alt="">
									<div class="product-hover">
										<a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
										<a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
									</div>
								</div>

								<h2><a href="">Samsung gallaxy note 4</a></h2>

								<div class="product-carousel-price">
									<ins>$400.00</ins>
								</div>                            
							</div>                                    
						</div>
					</div>
				</div>                    
			</div>

			<div class="col-md-4">
				<div class="single-sidebar">
					<h2 class="sidebar-title">Search Products</h2>
					<form action="">
						<input type="text" placeholder="Search products...">
						<input type="submit" value="Search">
					</form>
				</div>

				<div class="single-sidebar">
					<h3>Thông số kỹ thuật</h3>
					<ul class="thongso">
						<li>
							<span>Screen: </span>
							<div>{{$product->screen}}</div>
						</li>
						<li>
							<span>OS: </span>
							<div>{{$product->os}}</div>
						</li>
						<li>
							<span>Camera sau: </span>
							<div>{{$product->camera_sau}}</div>
						</li>
						<li>
							<span>Camera trước: </span>
							<div>{{$product->camera_truoc}}</div>
						</li>
						<li>
							<span>CPU: </span>
							<div>{{$product->cpu}}</div>
						</li>
						<li>
							<span>RAM: </span>
							<div>{{$product->ram}}</div>
						</li>
						<li>
							<span>SIM: </span>
							<div>{{$product->sim}}</div>
						</li>
						<li>
							<span>PIN: </span>
							<div>{{$product->pin}}</div>
						</li>
					</ul>
				</div>

				<div class="single-sidebar">
					<h2 class="sidebar-title">Products</h2>
					<div class="thubmnail-recent">
						<img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
						<h2><a href="">Sony Smart TV - 2015</a></h2>
						<div class="product-sidebar-price">
							<ins>$700.00</ins> <del>$100.00</del>
						</div>                             
					</div>
					<div class="thubmnail-recent">
						<img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
						<h2><a href="">Sony Smart TV - 2015</a></h2>
						<div class="product-sidebar-price">
							<ins>$700.00</ins> <del>$100.00</del>
						</div>                             
					</div>
					<div class="thubmnail-recent">
						<img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
						<h2><a href="">Sony Smart TV - 2015</a></h2>
						<div class="product-sidebar-price">
							<ins>$700.00</ins> <del>$100.00</del>
						</div>                             
					</div>
					<div class="thubmnail-recent">
						<img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
						<h2><a href="">Sony Smart TV - 2015</a></h2>
						<div class="product-sidebar-price">
							<ins>$700.00</ins> <del>$100.00</del>
						</div>                             
					</div>
				</div>

				<div class="single-sidebar">
					<h2 class="sidebar-title">Recent Posts</h2>
					<ul>
						<li><a href="">Sony Smart TV - 2015</a></li>
						<li><a href="">Sony Smart TV - 2015</a></li>
						<li><a href="">Sony Smart TV - 2015</a></li>
						<li><a href="">Sony Smart TV - 2015</a></li>
						<li><a href="">Sony Smart TV - 2015</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


	<div class="footer-top-area">
		<div class="zigzag-bottom"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="footer-about-us">
						<h2>u<span>Stora</span></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
						<div class="footer-social">
							<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
							<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="footer-menu">
						<h2 class="footer-wid-title">User Navigation </h2>
						<ul>
							<li><a href="">My account</a></li>
							<li><a href="">Order history</a></li>
							<li><a href="">Wishlist</a></li>
							<li><a href="">Vendor contact</a></li>
							<li><a href="">Front page</a></li>
						</ul>                        
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="footer-menu">
						<h2 class="footer-wid-title">Categories</h2>
						<ul>
							<li><a href="">Mobile Phone</a></li>
							<li><a href="">Home accesseries</a></li>
							<li><a href="">LED TV</a></li>
							<li><a href="">Computer</a></li>
							<li><a href="">Gadets</a></li>
						</ul>                        
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="footer-newsletter">
						<h2 class="footer-wid-title">Newsletter</h2>
						<p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
						<div class="newsletter-form">
							<input type="email" placeholder="Type your email">
							<input type="submit" value="Subscribe">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('script')
<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$('#addtocart').on('click',function(e){
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: '{{ asset('addtocart') }}',
			data: {
				name : $('#detail_name').attr('detail_name'),
				price : $('#detail_price').attr('detail_price'),
				qty : $('#detail_quantity').val(),
				id : $('#detail_id').attr('detail_id'),
				rom: rom,
				color: color,
			},

			success:function(res) {
				console.log(res);
				toastr.success('Thêm vào giỏ hàng thành công!');
				$('#total_cart').val(res.cart);
			}
		})
	});

	var rom;
	$(document).on('click', '.rom', function() {
		for(var i=0;i<$('.rom').length;i++){
			$('#rom-' + i).css('background-color', '#fff');
		}
		$(this).css('background-color', '#ccc');
		rom = $(this).attr('detail_rom');
	});

	var color;
	$(document).on('click', '.color', function() {
		color = $(this).attr('detail_color');
	});


</script>
@endsection