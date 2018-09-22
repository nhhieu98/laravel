<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

	</head>
	<body>
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="user-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				
			</table>
		</div>

		<!-- Bootstrap JavaScript -->
		{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
		<script type="text/javascript" src="//code.jquery.com/jquery.js"></script>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

		<script type="text/javascript">
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$(function() {
			    $('#user-table').DataTable({
			        processing: true,
			        serverSide: true,
			        ajax: '{!! route('listUser') !!}',
			        columns: [
			            { data: 'id', name: 'id' },
			            { data: 'name', name: 'name' },
			            { data: 'email', name: 'email' },
			            { data: 'action', name: 'action' } 
			        ]
			    });
			});

			$(document).on('click', '.btn-danger', function() {
				var id = $(this).data('id');

				if (confirm('Có muốn xóa không?')) {
					$.ajax({
						type: 'delete',
						url: 'user/' +id,
						success: function (response) {

							$('#user-table').DataTable().ajax.reload(null, false);
						}
					})
				}
			})
		</script>
 		
	</body>
</html>