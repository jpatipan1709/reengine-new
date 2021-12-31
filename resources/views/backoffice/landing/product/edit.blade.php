@extends('backoffice.layouts.master')
@section('title')
    Product - Create
@endsection
@section('css')
    <!-- jquery file upload Frame work -->
    <link href="{{asset('files/assets/pages/jquery.filer/css/jquery.filer.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet" />
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
                <!-- Alert card start -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 col-md-6"><h5>แก้ไขสินค้า</h5></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <form action="{{url('backoffice/product/update',$product->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-12 col-xl-12">
                                        <label for="title">ชื่อสินค้า <span class="text-danger text-small">*<span></label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{$product->name}}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                          <label for="sku">SKU</label>
                                          <input type="text" class="form-control" name="sku" id="sku" value="{{$product->sku}}">
                                          @error('sku')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                          <label for="content">รายละเอียด <span class="text-danger text-small">*<span></label>
                                          <textarea id="title-about" name="content">{{$product->description}}</textarea>
                                          @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-6">
                                          <label for="quantity">จำนวน</label>
                                          <input type="number" class="form-control" name="quantity" id="quantity" value="{{$product->quantity}}">
                                          @error('quantity')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-6">
                                          <label for="category_id">หมวดหมู่</label>
                                          <select name="category_id" id="category_id" class="form-control">
                                              <option value="">---- เลือกหมวดหมู่ ----</option>
                                            @foreach ($category as $item)
                                                <option value="{{$item->id}}" {{$item->id == $product->category_id ? 'selected' : ''}}>{{$item->categoryname}}</option>
                                            @endforeach
                                      </select>
                                          @error('category_id')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-6">
                                          <label for="original_price">ราคาจริง</label>
                                          <input type="number" class="form-control" name="original_price" id="original_price" value="{{$product->price_original}}">
                                          @error('original_price')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-6">
                                          <label for="price">ราคาขาย</label>
                                          <input type="number" class="form-control" name="price" id="price" value="{{$product->price}}">
                                          @error('price')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-4">
                                          <label for="density">Density</label>
                                          <input type="number" step=".01" class="form-control" name="density" id="density" value="{{$product->density}}">
                                          @error('density')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-4">
                                            <label for="sheetcost">Sheet Cost</label>
                                            <input type="number"  step=".01" class="form-control" name="sheetcost" id="sheetcost" value="{{$product->sheetcost}}">
                                            @error('sheetcost')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                        <div class="form-group col-md-12 col-xl-4">
                                          <label for="spare">Spare</label>
                                          <input type="number"  step=".01" class="form-control" name="spare" id="spare" value="{{$product->spare}}">
                                          @error('spare')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                            <label for="images">รูปภาพ</label>
                                            <input type="file" name="files" id="imagesproduct">
                                            @error('files')
                                                <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                        <a href="{{url('backoffice/product/index')}}" class="btn btn-outline-warning">กลับ</a>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-6">
                                รูปภาพ
                                @if (count($albums)> 0)
                                <div class="jFiler-items jFiler-row">
                                    <ul class="jFiler-items-list jFiler-items-default">
                                        @foreach ($albums as $item)
                                        <li class="jFiler-item" data-jfiler-index="0" style="">
                                            <div class="jFiler-item-container">
                                                <div class="jFiler-item-inner">
                                                    <div class="jFiler-item-icon pull-left">
                                                        <img src='{{asset('local/public/storage').'/'.$item->images}}' width='75px'>
                                                    </div>
                                                    <div class="jFiler-item-info pull-left">
                                                        <div class="jFiler-item-assets">
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <a class="icon-jfi-trash jFiler-item-trash-action delete_images" data-id="{{$item->id}}"></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @else 
                                    <h5 class="text-center">ไม่มีรูปภาพ</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Alert card end -->
            </div>
        </div>
    </div>
    <!-- Page-body start -->
</div>
@endsection
@section('js')
    <!-- jquery file upload js -->
    <script src="{{asset('files/assets/pages/jquery.filer/js/jquery.filer.min.js')}}"></script>
    <script src="{{asset('files/assets/pages/filer/custom-filer.js')}}" ></script>
    <script src="{{asset('files/assets/pages/filer/jquery.fileuploads.init.js')}}" ></script>

    <!-- ck editor -->
    <script  src="{{asset('files/assets/pages/ckeditor/ckeditor-custom.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click",".delete_images",function() {
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
                            url: "{{url('backoffice/product/delete/images')}}/"+id,
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
@endsection