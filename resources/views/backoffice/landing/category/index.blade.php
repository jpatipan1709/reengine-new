@extends('backoffice.layouts.master')
@section('title')
    Category - Index
@endsection
@section('css')
   
@endsection
@section('content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">Category</h5>
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
                            <div class="col-6"><h5>จัดการข้อมูล Category</h5></div>
                            <div class="col-6 text-right"> <a href="{{url('backoffice/category/create')}}" class="btn btn-outline-primary">สร้าง category</a> </div>
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
                            <table class="table table-bordered table-hover table-strip" id="category-table">
                                <thead>
                                    <tr>
                                        <th  class="text-center" width="5%">#</th>
                                        <th  class="text-center">หมวดหมู่</th>
                                        <th  class="text-center" width="15%">Action</th>
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
        var table = $('#category-table').dataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{url('backoffice/category/categorydatatables')}}",
                type: "POST",
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex',className: "text-center"},
                {data: 'categoryname', name: 'categoryname',className: "text-center"},
                {data: 'action', name: 'action',className: "text-center", orderable: false, searchable: false},
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("click",".delete_category",function() {
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
                            url: "{{url('backoffice/category/delete')}}/"+id,
                            type: 'POST',
                            dataType: "JSON",
                            data: {
                                "id": id,
                            },  
                        }).done(function(data){
                            console.log(data);
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
@endsection