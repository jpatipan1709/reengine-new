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
                            <div class="col-6"><h5>สร้างสินค้า</h5></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <form action="{{url('backoffice/product/store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-12 col-xl-12">
                                        <label for="title">ชื่อสินค้า <span class="text-danger text-small">*<span></label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                          <label for="sku">SKU</label>
                                          <input type="text" class="form-control" name="sku" id="sku" value="{{old('sku')}}">
                                          @error('sku')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                          <label for="content">รายละเอียด <span class="text-danger text-small">*<span></label>
                                          <textarea id="title-about" name="content">{{old('content')}}</textarea>
                                          @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-6">
                                          <label for="quantity">จำนวน</label>
                                          <input type="number" class="form-control" name="quantity" id="quantity" value="{{old('quantity')}}">
                                          @error('quantity')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-6">
                                          <label for="category_id">หมวดหมู่</label>
                                          <select name="category_id" id="category_id" class="form-control">
                                              <option value="">---- เลือกหมวดหมู่ ----</option>
                                            @foreach ($category as $item)
                                                <option value="{{$item->id}}" {{$item->id == old('category_id') ? 'selected' : ''}}>{{$item->categoryname}}</option>
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
                                          <input type="number" class="form-control" name="original_price" id="original_price" value="{{old('original_price')}}">
                                          @error('original_price')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-6">
                                          <label for="price">ราคาขาย</label>
                                          <input type="number" class="form-control" name="price" id="price" value="{{old('price')}}">
                                          @error('price')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-4">
                                          <label for="density">Density</label>
                                          <input type="number" step=".01" class="form-control" name="density" id="density" value="{{old('density')}}">
                                          @error('density')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-4">
                                            <label for="sheetcost">Sheet Cost</label>
                                            <input type="number"  step=".01" class="form-control" name="sheetcost" id="sheetcost" value="{{old('sheetcost')}}">
                                            @error('sheetcost')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                        <div class="form-group col-md-12 col-xl-4">
                                          <label for="spare">Spare</label>
                                          <input type="number"  step=".01" class="form-control" name="spare" id="spare" value="{{old('spare')}}">
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
@endsection