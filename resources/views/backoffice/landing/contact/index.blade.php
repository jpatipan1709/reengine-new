@extends('backoffice.layouts.master')
@section('title')
    Contact - Index
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
            <h5 class="m-b-10">Contact</h5>
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
                        <h5>จัดการข้อมูล Contact</h5>
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
                        <form action="{{url('backoffice/contact/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                          <label for="workinghours">วัน-เวลาทำการ <span class="text-danger text-small">*<span></label>
                                          <textarea id="title-about" name="workinghours">{{count($contact) > 0 ? $contact[0]->workinghours : old('workinghours')}}</textarea>
                                          @error('workinghours')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                            <label for="telephone">เบอร์โทรศัพท์ <span class="text-danger text-small">*<span></label>
                                            <input  class="form-control" name="telephone" id="telephone" value="{{count($contact) > 0 ? $contact[0]->telephone : old('telephone')}}">
                                            @error('telephone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-12 col-xl-12">
                                              <label for="images">อีเมล์ <span class="text-danger text-small">*<span></label>
                                              <input type="email"  class="form-control" name="email" id="email" value="{{count($contact) > 0 ? $contact[0]->email : old('email')}}">
                                              @error('email')
                                                  <div class="text-danger">{{ $message }}</div>
                                               @enderror
                                          </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                          <label for="address">สถานที่ตั้ง <span class="text-danger text-small">*<span></label>
                                          <textarea id="content" name="address">{{count($contact) > 0 ? $contact[0]->address : old('address')}}</textarea>
                                          @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                      <hr>
                                      <div class="text-right">
                                        <input type="hidden" name="type" value="{{count($contact) > 0 ? 'edit' : 'create'}}">
                                        <input type="hidden" name="id" value="{{count($contact) > 0 ? $contact[0]->id : ''}}">
                                        <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                        <a href="{{url('backoffice/contact/index')}}" class="btn btn-outline-warning">กลับ</a>
                                      </div>
                                </div>
                            </div>
                        </form>
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