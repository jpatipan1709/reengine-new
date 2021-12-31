@extends('backoffice.layouts.master')
@section('title')
Category - Create
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
                <!-- Alert card start -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h5>สร้างหมวดหมู่</h5></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-6">
                                <form action="{{url('backoffice/category/store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-12 col-xl-12">
                                        <label for="category">ชื่อหมวดหมู่ <span class="text-danger text-small">*<span></label>
                                        <input type="text" class="form-control" name="category" id="category" value="{{old('category')}}">
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class=" col-md-12 col-xl-12">
                                            <div class="form-group col-sm-12 col-xl-4 m-b-30">
                                                <h4 class="sub-title">Multi Select</h4>
                                                <p>The select below is declared with the
                                                    <code>multiple</code> attribute</p>
                                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                                <option value="WY">Coming</option>
                                                <option value="WY">Hanry Die</option>
                                                <option value="WY">John Doe</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                        <a href="{{url('backoffice/category/index')}}" class="btn btn-outline-warning">กลับ</a>
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

    <!-- Select 2 js -->
    <script  src="{{asset('files/bower_components/select2/js/select2.full.min.js')}}"></script>

@endsection