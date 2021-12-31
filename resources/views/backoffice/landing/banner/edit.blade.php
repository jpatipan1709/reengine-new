@extends('backoffice.layouts.master')
@section('title')
    Banner - Create
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
            <h5 class="m-b-10">Banner</h5>
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
                            <div class="col-6"><h5>แก้ไขแบนเนอร์</h5></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-6">
                                <form action="{{url('backoffice/banner/update',$banner->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-12 col-xl-12">
                                        <label for="title">หัวข้อ <span class="text-danger text-small">*<span></label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{$banner->title}}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                          <label for="content">รายละเอียด <span class="text-danger text-small">*<span></label>
                                          <textarea id="content" name="content">{{$banner->content}}</textarea>
                                          @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                            <label for="images">รูปภาพ <span class="text-danger text-small">**ขนาด 379x480 px</span> </label>
                                            <input type="file" name="files" id="imagesbanner">
                                            @error('files')
                                                <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                    <a href="{{url('backoffice/banner/index')}}" class="btn btn-outline-warning">กลับ</a>
                                </form>
                            </div>
                            <div class="col-6">
                                รูปภาพ
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <br>
                                        @if (!empty($banner))
                                            @if ($banner->images != null)
                                                 <img src='{{asset('local/public/storage').'/'.$banner->images}}'  class="img-fluid">
                                            @else 
                                                <h2>ไม่มีรูปภาพ</h2>
                                            @endif
                                        @else 
                                        <div class="text-center">
                                            <h2>ไม่มีรูปภาพ</h2>
                                        </div>
                                        @endif
                                    </div>
                                </div>
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