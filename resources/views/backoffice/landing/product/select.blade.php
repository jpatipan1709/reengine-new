@extends('backoffice.layouts.master')
@section('title')
    Product - Index
@endsection
@section('css')
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/switchery/css/switchery.min.css')}}">
    <style>
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }
        
        .switch input { 
          opacity: 0;
          width: 0;
          height: 0;
        }
        
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        input:checked + .slider {
          background-color: #2196F3;
        }
        
        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }
        
        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }
        
        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }
        
        .slider.round:before {
          border-radius: 50%;
        }
        </style>
@endsection
@section('content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">Product</h5>
            <ul class="breadcrumb-title b-t-default p-t-10">
                @foreach ($breadcrumb as $item)
                    <li class="breadcrumb-item">{{$item}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Page-header end -->

    <!-- Page-body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h5>จัดการข้อมูล Product</h5></div>
                        </div>
                    </div>
                    <div class="card-block">
                        @if (session('success'))
                            <div class="alert alert-success border-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger border-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-strip" id="product-table">
                                <thead>
                                    <tr>
                                        <th  class="text-center" width="15%">#</th>
                                        <th  class="text-center">รูปภาพสินค้า</th>
                                        <th  class="text-center">ชื่อสินค้า</th>
                                        <th  class="text-center">รายละเอียด</th>
                                        <th  class="text-center">sku</th>
                                        <th  class="text-center">หมวดหมู่</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-body start -->
</div>
@endsection
@section('js')
    <script>
        var table = $('#product-table').dataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{url('backoffice/product/productdatatables')}}",
                type: "POST",
            },
            columns: [

                {data: 'select', name: 'select',"className": "text-center"},
                {data: 'images', name: 'images',"className": "text-center"},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'sku', name: 'sku',"className": "text-center"},
                {data: 'category', name: 'category',"className": "text-center"},
              
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("click",".delete_product",function() {
                var id = $(this).data('id');
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{url('backoffice/product/delete')}}/"+id,
                            type: 'POST',
                            dataType: "JSON",
                            data: {
                                "id": id,
                            },  
                        }).done(function(data){
                            if(data.status){
                                Swal.fire({
                                    title: 'Delete',
                                    text: data.massege,
                                    icon: 'success',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                     window.location.reload();
                                    }
                                })
                            }else{
                                Swal.fire(
                                    'Deleted!',
                                    data.massege,
                                    'fail'
                                )
                            }
                            
                        });
                    }
                })
            });

            });
    </script>
    
      <!-- Max-length js -->
      <script  src="{{asset('files/bower_components/bootstrap-maxlength/js/bootstrap-maxlength.jss')}}"></script>
      <!-- Switch component js -->
       <script  src="{{asset('files/bower_components/switchery/js/switchery.min.js')}}"></script>
      
    <script>
        var elemsingle = document.querySelector('.js-switch');
	    var switchery = new Switchery(elemsingle, { color: '#4099ff', jackColor: '#fff' });
    </script>
    <script>
        $('.selectitem').click(function (){
            var id = $(this).data('id');
            console.log(id);
            // $.ajax({
            //     url: "{{url('backoffice/product/selectitem')}}/"+id,
            //     type: 'POST',
            //     data: {
            //             "id": id,
            //             "status" : elemsingle.checked,
            //     },  
            // }).done(function(data){
                
            // });
        });
    </script>
@endsection