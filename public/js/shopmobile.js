$(document).ready(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	
})
	$('#addtocart').on('click',function(e){
		e.preventDefault();

		var rom = $('#detail_rom').attr('detail_rom');
		alert(rom);
		
		$.ajax({
			type: 'post',
			url: path + 'addtocart',
			data: {
				name : $('#detail_name').attr('detail_name'),
				price : $('#detail_price').attr('detail_price'),
				qty : $('#detail_quantity').val(),
				id : $('#detail_id').attr('detail_id'),

			},

			success:function(res) {
				console.log(res);
				toastr.success('Thêm vào giỏ hàng thành công!');
				$('#total_cart').val(res.cart);
			}
		})
	});

	$(document).on('click', '.rom', function() {
		for(var i=0;i<$('.rom').length;i++){
			$('#rom-' + i).css('background-color', '#fff');
		}
		$(this).css('background-color', '#ccc');

	});


