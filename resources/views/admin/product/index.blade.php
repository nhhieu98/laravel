@extends('layouts/admin/master')

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <legend>
                                PRODUCT TABLE
                            </legend>
                        </div>
                        <div class="body">
                            <div class="box">
                                <div class="box-header">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <button data-toggle="modal" data-target="#addmodal" class="btn btn-sm btn-success">Add</button>
                                            <table class="table table-striped table-bordered" id="product-table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>OS</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>

        <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div style="width: 75%;" class="modal-dialog" role="document">
                <div class="modal-content">
                    <div style="border-style: none;" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Add product</h3>
                    </div>
                    <div class="modal-body">
                        <form id="add" action="" method="POST" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" class="form-control" id="description" placeholder="Description" name="description" value="{{old('description')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Content</label>
                                        <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Screen</label>
                                        <input type="text" class="form-control" id="screen" placeholder="Screen" name="screen" value="{{old('screen')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">OS</label>
                                        <input type="text" class="form-control" id="os" placeholder="OS" name="os" value="{{old('os')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Camera sau</label>
                                        <input type="text" class="form-control" id="camera_sau" placeholder="Camera sau" name="camera_sau" value="{{old('camera_sau')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Camera trước</label>
                                        <input type="text" class="form-control" id="camera_truoc" placeholder="Camera trước" name="camera_truoc" value="{{old('camera_truoc')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CPU</label>
                                        <input type="text" class="form-control" id="cpu" placeholder="CPU" name="cpu" value="{{old('cpu')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-list" aria-hidden="true"></i> RAM</label><br>
                                        <select style="width: 100%; height: 34px;" name="ram" id="ram">
                                            <option class="ram" value="1GB">1GB</option>
                                            <option class="ram" value="2GB">2GB</option>
                                            <option class="ram" value="3GB">3GB</option>
                                            <option class="ram" value="4GB">4GB</option>
                                            <option class="ram" value="6GB">6GB</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">SIM</label>
                                        <input type="text" class="form-control" id="sim" placeholder="SIM" name="sim" value="{{old('sim')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">PIN</label>
                                        <input type="text" class="form-control" id="pin" placeholder="PIN" name="pin" value="{{old('pin')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-list" aria-hidden="true"></i> Type</label><br>
                                        <select style="width: 100%; height: 34px;" name="type" id="type">
                                            <option value="Apple">Apple</option>
                                            <option value="SamSung">SamSung</option>
                                            <option value="Xiaomi">Xiaomi</option>
                                            <option value="Oppo">Oppo</option>
                                            <option value="Sony">Sony</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div style="width: 75%;" class="modal-dialog" role="document">
                <div class="modal-content">
                    <div style="border-style: none;" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Edit product</h3>
                    </div>
                    <div class="modal-body">
                        <form id="update" action="" method="POST" role="form">
                            <input type="hidden" name="id" id="up">
                            @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="name1" placeholder="Name" name="name1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" class="form-control" id="description1" placeholder="Description" name="description1">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Content</label>
                                        <textarea name="editor2" id="editor2" rows="10" cols="80"></textarea>
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Screen</label>
                                        <input type="text" class="form-control" id="screen1" placeholder="Screen" name="screen1">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">OS</label>
                                        <input type="text" class="form-control" id="os1" placeholder="OS" name="os1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Camera sau</label>
                                        <input type="text" class="form-control" id="camera_sau1" placeholder="Camera sau" name="camera_sau1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Camera trước</label>
                                        <input type="text" class="form-control" id="camera_truoc1" placeholder="Camera trước" name="camera_truoc1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CPU</label>
                                        <input type="text" class="form-control" id="cpu1" placeholder="CPU" name="cpu1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-list" aria-hidden="true"></i> RAM</label><br>
                                        <select style="width: 100%; height: 34px;" name="ram1" id="ram1">
                                            <option class="ram" value="1GB">1GB</option>
                                            <option class="ram" value="2GB">2GB</option>
                                            <option class="ram" value="3GB">3GB</option>
                                            <option class="ram" value="4GB">4GB</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">SIM</label>
                                        <input type="text" class="form-control" id="sim1" placeholder="SIM" name="sim1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">PIN</label>
                                        <input type="text" class="form-control" id="pin1" placeholder="PIN" name="pin1">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-list" aria-hidden="true"></i> Type</label><br>
                                        <select style="width: 100%; height: 34px;" name="type1" id="type1">
                                            <option value="Apple">Apple</option>
                                            <option value="SamSung">SamSung</option>
                                            <option value="Xiaomi">Xiaomi</option>
                                            <option value="Oppo">Oppo</option>
                                            <option value="Sony">Sony</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="addinfomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div style="width: 75%;" class="modal-dialog" role="document">
                <div class="modal-content">
                    <div style="border-style: none;" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Thêm chi tiết</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="box">
                                    <div class="box-header">
                                      <h3 class="box-title">Chi tiết sản phẩm</h3>
                                    </div>
                                    <div class="box-body">
                                      <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th>Mã SP</th>
                                              <th>ROM</th>
                                              <th>Color</th>
                                              <th>Quantity</th>
                                              <th>Price</th>
                                              <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list">
                                            
                                        </tbody>
                                      </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-list" aria-hidden="true"></i> ROM</label><br>
                                    <select style="width: 100%; height: 34px;" name="rom" id="rom">
                                        <option value="16GB">16GB</option>
                                        <option value="32GB">32GB</option>
                                        <option value="64GB">64GB</option>
                                        <option value="128GB">128GB</option>
                                        <option value="256GB">256GB</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-list" aria-hidden="true"></i> Color</label><br>
                                    <select style="width: 100%; height: 34px;" name="color" id="color">
                                        <option value="Black">Black</option>
                                        <option value="White">White</option>
                                        <option value="Gray">Gray</option>
                                        <option value="Red">Red</option>
                                        <option value="Violet">Violet</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantity</label>
                                    <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" class="form-control" id="price" placeholder="Price" name="price">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="submitadd" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="uploadmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div style="width: 75%;" class="modal-dialog" role="document">
                <div class="modal-content">
                    <div style="border-style: none;" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Add image</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="main-section">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <div class="file-loading">
                                            <input id="file-1" type="file" name="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-list" aria-hidden="true"></i> Color</label><br>
                                    <select style="width: 100%; height: 34px;" name="color" id="colorimage"></select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>

@endsection

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $('#product-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('products.list') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'type', name: 'type' },
                    { data: 'os', name: 'os' },
                    { data: 'action', name: 'action' } 
                ]
            });
        });
        CKEDITOR.replace('editor1');
        $('#add').submit(function(e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: "{{ route('products.store') }}",
              data: {
                name: $('#name').val(),
                description: $('#description').val(),
                content: CKEDITOR.instances['editor1'].getData(''),
                cpu: $('#cpu').val(),
                screen: $('#screen').val(),
                os: $('#os').val(),
                type: $('#type').val(),
                ram: $('#ram').val(),
                camera_truoc: $('#camera_truoc').val(),
                camera_sau: $('#camera_sau').val(),
                pin: $('#pin').val(),
                sim: $('#sim').val(),
                _token: $('input[name="_token"]').val()
              },

              success: function(response){
                toastr.success('Thêm mới thành công!');

                $('#product-table').DataTable().ajax.reload(null, false);
                $('#addmodal').hide();
                $('.modal-backdrop').hide();
                // $('#add').reset();
              },

              error: function(jqXHR, textStatus, errorThrown) {

                if (jqXHR.responseJSON.errors.name != undefined) {
                  $('#name').after('<p style="color:red">' + jqXHR.responseJSON.errors.name[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.screen != undefined) {
                  $('#screen').after('<p style="color:red">' + jqXHR.responseJSON.errors.screen[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.cpu != undefined) {
                  $('#cpu').after('<p style="color:red">' + jqXHR.responseJSON.errors.cpu[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.os != undefined) {
                  $('#os').after('<p style="color:red">' + jqXHR.responseJSON.errors.os[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.camera_truoc != undefined) {
                  $('#camera_truoc').after('<p style="color:red">' + jqXHR.responseJSON.errors.camera_truoc[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.camera_sau != undefined) {
                  $('#camera_sau').after('<p style="color:red">' + jqXHR.responseJSON.errors.camera_sau[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.pin != undefined) {
                  $('#pin').after('<p style="color:red">' + jqXHR.responseJSON.errors.pin[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.sim != undefined) {
                  $('#sim').after('<p style="color:red">' + jqXHR.responseJSON.errors.sim[0] + '</p>')
                }
              }
            })
        });

        $(document).on('click', '.btn-warning', function() {
            var id = $(this).data('id');
            $.ajax({
              type: 'get',
              url: "{{ asset('') }}admin/products/edit/" + id,
              data: {

              },
              success: function(response) {
                $('#up').val(response.data.id);
                $('#name1').val(response.data.name);
                $('#screen1').val(response.data.screen);
                $('#cpu1').val(response.data.cpu);
                $('#os1').val(response.data.os);
                $('#type1').val(response.data.type);
                $('#ram1').val(response.data.ram);
                $('#camera_truoc1').val(response.data.camera_truoc);
                $('#camera_sau1').val(response.data.camera_sau);
                $('#sim1').val(response.data.sim);
                $('#pin1').val(response.data.pin);
              }
            })
        })
        CKEDITOR.replace('editor2');
        $('#update').submit(function(e) {
            var id = $('#up').val();

            e.preventDefault();

            $.ajax ({
              type: 'put',
              url: "{{ asset('') }}admin/products/" + id,
              data: {
                name: $('#name1').val(),
                screen: $('#screen1').val(),
                cpu: $('#cpu1').val(),
                os: $('#os1').val(),
                type: $('#type1').val(),
                ram: $('#ram1').val(),
                camera_truoc: $('#camera_truoc1').val(),
                camera_sau: $('#camera_sau1').val(),
                sim: $('#sim1').val(),
                pin: $('#pin1').val(),
                _token: $('input[name="_token"]').val()
              },

              success: function(response){
                toastr.success('Cập nhật thành công!');

                $('#product-table').DataTable().ajax.reload(null, false);
                $('#editmodal').hide();
                $('.modal-backdrop').hide();
              },

              error: function(jqXHR, textStatus, errorThrown) {

                if (jqXHR.responseJSON.errors.name != undefined) {
                  $('#name1').after('<p style="color:red">' + jqXHR.responseJSON.errors.name[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.screen != undefined) {
                  $('#screen1').after('<p style="color:red">' + jqXHR.responseJSON.errors.screen[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.cpu != undefined) {
                  $('#cpu1').after('<p style="color:red">' + jqXHR.responseJSON.errors.cpu[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.os != undefined) {
                  $('#os1').after('<p style="color:red">' + jqXHR.responseJSON.errors.os[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.camera_truoc != undefined) {
                  $('#camera_truoc1').after('<p style="color:red">' + jqXHR.responseJSON.errors.camera_truoc[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.camera_sau != undefined) {
                  $('#camera_sau1').after('<p style="color:red">' + jqXHR.responseJSON.errors.camera_sau[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.pin != undefined) {
                  $('#pin1').after('<p style="color:red">' + jqXHR.responseJSON.errors.pin[0] + '</p>')
                }
                if (jqXHR.responseJSON.errors.sim != undefined) {
                  $('#sim1').after('<p style="color:red">' + jqXHR.responseJSON.errors.sim[0] + '</p>')
                }
              }
            })
        })

        $(document).on('click', '#delete', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            
            swal({
              title: "Bạn có muốn xóa không?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {

                $.ajax({
                  type: 'delete',
                  url: "{{ asset('') }}admin/products/" +id,
                  data: {

                  },
                  success: function(response) {
                    
                    $('#product-table').DataTable().ajax.reload(null, false);
                  }
                })
                swal("Đã xóa thành công!", {
                  icon: "success",
                });
              }
            });  
        });

        $(document).on('click', '#adddetail', function() {
            $('#list').empty();
            var idproduct = $(this).data('id');
            $('#submitadd').data('id', idproduct);
            $('#addinfomodal').modal('show');
            $.ajax({
                type: 'post',
                url: "{{ asset('') }}admin/productDetail/detail/" + idproduct,
                data:{

                },
                success: function(response){
                    for(var i=0;i<response.data.length;i++){
                        $('#list').append('<tr><td>'+ response.code +'</td><td>'+ response.data[i].rom +'</td><td>'+ response.data[i].color +'</td><td>'+ response.data[i].quantity +'</td><td>'+ response.data[i].price +'</td><td><button id="xoa-'+response.data[i].id+'" data-id="'+ response.data[i].id +'" class="btn btn-xs btn-danger xoa"><i class="glyphicon glyphicon-trash"></i></button></td></tr>');
                    }
                }
            })
        });

        $(document).on('click', '#submitadd', function(e) {
            var id = $(this).data('id');
            $('#list').empty();
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "{{ asset('') }}admin/productDetail/" + id,
                data: {
                    rom: $('#rom').val(),
                    color: $('#color').val(),
                    quantity: $('#quantity').val(),
                    price: $('#price').val()
                },

                success: function(response) {
                    for(var i=0;i<response.data.length;i++){
                        $('#list').append('<tr><td>'+ response.code +'</td><td>'+ response.data[i].rom +'</td><td>'+ response.data[i].color +'</td><td>'+ response.data[i].quantity +'</td><td>'+ response.data[i].price +'</td><td><button id="xoa-'+response.data[i].id+'" data-id="'+ response.data[i].id +'" class="btn btn-xs btn-danger xoa"><i class="glyphicon glyphicon-trash"></i></button></td></tr>');
                    }
                    toastr.success('Thêm chi tiết thành công!');
                },
            })
        });
        var image;
        $(document).on('click', '#upload', function() {
            $('#colorimage').empty();
            var id = $(this).data('id');
            image = id;
            $('#uploadmodal').modal('show');
            $.ajax({
                type: 'post',
                url: '{{asset('')}}admin/products/show/' + id,
                data:{

                }, 
                success: function(response){

                    for(var i = 0; i < response.data.length; i++){
                        $('#colorimage').append('<option class="op" value="'+ response.data[i].value +'">'+ response.data[i].value +'</option>');
                    }
                }
            })
        });


        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "{{ asset('admin/upload') }}",
            uploadExtraData: function() {
                return {
                    product_id: image,
                    color: $('#colorimage').val(),
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });

        $(document).on('click', '.xoa', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
              title: "Bạn có muốn xóa không?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {

                $.ajax({
                  type: 'delete',
                  url: '{{asset('')}}admin/products/xoa/' + id,
                  data: {

                  },
                  success: function(response) {
                    $('#xoa-' + response.data).parent().parent().remove();
                  }
                })
                swal("Đã xóa thành công!", {
                  icon: "success",
                });
              }
            });
        })
    </script>
 
@endsection