@extends('backoffice.layouts.master')
@section('title')
    Footer - Index
@endsection
@section('css')
       <!-- jquery file upload Frame work -->
       <link href="{{asset('files/assets/pages/jquery.filer/css/jquery.filer.css')}}" type="text/css" rel="stylesheet" />
       <link href="{{asset('files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet" />

        <!-- Multi Select css -->
        <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/multiselect/css/multi-select.css')}}" />

        <style>
            .ms-container {
                width:100%;
            }
        </style>
@endsection
@section('content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">Footer</h5>
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
                        <h5>จัดการข้อมูล Footer</h5>
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
                        <form action="{{url('backoffice/footer/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                          <label for="companyname">ชื่อบริษัท<span class="text-danger text-small">*<span></label>
                                            <input  class="form-control" name="companyname" id="companyname" value="{{count($footer) > 0 ? $footer[0]->companyname : old('companyname')}}">
                                          @error('companyname')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-12">
                                            <label for="telephone">เบอร์โทรศัพท์ <span class="text-danger text-small">*<span></label>
                                            <input  class="form-control" name="telephone" id="telephone" value="{{count($footer) > 0 ? $footer[0]->telephone : old('telephone')}}">
                                            @error('telephone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-xl-12 m-b-30">
                                            <label for="telephone">หมวดหมู่สินค้า <span class="text-danger text-small">*<span></label>
                                            <select multiple="multiple" id="my-select" name="myselect[]">
                                                @foreach ($category as $item)
                                                     <option value='{{$item->id}}' {{in_array($item->id,$ex_category) ? 'selected' : ''}}>{{$item->categoryname}}</option>
                                                 @endforeach
                                                 
                                            </select>
                                        </div>
                                     </div>
                                     <div class="form-row">
                                        <div class="form-group col-sm-12 col-xl-12 m-b-30">
                                            <label for="facebook">Facebook</label>
                                            <input  class="form-control" name="facebook" id="facebook" value="{{count($footer) > 0 ? $footer[0]->facebook : old('facebook')}}">
                                        </div>
                                     </div>
                                     <div class="form-row">
                                        <div class="form-group col-sm-12 col-xl-12 m-b-30">
                                            <label for="twitter">Twitter</label>
                                            <input  class="form-control" name="twitter" id="twitter" value="{{count($footer) > 0 ? $footer[0]->twitter : old('twitter')}}">
                                        </div>
                                     </div>
                                     <div class="form-row">
                                        <div class="form-group col-sm-12 col-xl-12 m-b-30">
                                            <label for="instagrame">Instagrame</label>
                                            <input  class="form-control" name="instagrame" id="instagrame" value="{{count($footer) > 0 ? $footer[0]->instagrame : old('instagrame')}}">
                                        </div>
                                     </div>
                                    <hr>
                                    <div class="text-right">
                                        <input type="hidden" name="type" value="{{count($footer) > 0 ? 'edit' : 'create'}}">
                                        <input type="hidden" name="id" value="{{count($footer) > 0 ? $footer[0]->id : ''}}">
                                        <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                        <a href="{{url('backoffice/footer/index')}}" class="btn btn-outline-warning">กลับ</a>
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
        <!-- Select 2 js -->
        <script  src="{{asset('files/bower_components/select2/js/select2.full.min.js')}}"></script>
        <!-- Multiselect js -->
        <script  src="{{asset('files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
        <script  src="{{asset('files/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
        <script  src="{{asset('files/assets/js/jquery.quicksearch.js')}}"></script>
        <script  src="{{asset('files/assets/pages/advance-elements/select2-custom.js')}}"></script>
        <script src="{{asset('files/assets/js/pcoded.min.js')}}"></script>
        <script src="{{asset('files/assets/js/vertical/vertical-layout.min.js')}}"></script>
        <script src="{{asset('files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script  src="{{asset('files/assets/js/script.js')}}"></script>
@endsection