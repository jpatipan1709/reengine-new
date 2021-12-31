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
            <h5 class="m-b-10">Customize</h5>
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
                        <h5>จัดการข้อมูล Customize</h5>
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
                        <form action="{{url('backoffice/product/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-6">
                                            <label for="name">ชื่อสินค้า</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}" readonly>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-6">
                                            <label for="sku">SKU</label>
                                            <input type="text" class="form-control" name="sku" id="sku" value="{{$product->sku}}" readonly>
                                            @error('sku')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-4">
                                            <label for="density">Density <span class="text-danger">(g/cm^3)</span></label>
                                            <input type="text" class="form-control" name="density" id="density" value="{{$product->density}}" readonly>
                                            @error('density')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-4">
                                            <label for="sheetcost">Sheet cost <span class="text-danger">(B/kg)</span></label>
                                            <input type="text" class="form-control" name="sheetcost" id="sheetcost" value="{{$product->sheetcost}}" readonly>
                                            @error('sheetcost')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-4">
                                            <label for="spare">Spare</label>
                                            <input type="text" class="form-control" name="spare" id="spare" value="{{$product->spare}}" readonly>
                                            @error('spare')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xl-4">
                                            <label for="length">ยาว (Length)</label>
                                            <input type="number" step="0.1" class="form-control" name="length" id="length" value="{{$product->lenght}}">
                                            @error('length')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-4">
                                            <label for="width">กว้าง (Width)</label>
                                            <input type="number"  step="0.1" class="form-control" name="width" id="width" value="{{$product->width}}">
                                            @error('width')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xl-4">
                                            <label for="height">สูง (Height)</label>
                                            <input type="number"  step="0.1" class="form-control" name="height" id="height" value="{{$product->height}}">
                                            @error('height')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="mb-3">ข้อมูลสินค้า</h4>
                                    <div class="form-row">
                                        @foreach ($componants as $key => $item)
                                            <div class="form-group col-md-12 col-xl-4">
                                                <label for="componant_{{$item->id}}">{{ $item->name}}</label>
                                                <input type="number" step="0.1" class="form-control componant_{{$item->id}}" name="componant_{{$item->id}}" id="componant_{{$item->id}}" value="{{$item->unit}}">
                                                @error('componant_{{$item->id}}')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="mb-3">ข้อมูลรายละเอียดสินค้า</h4>
                                    <table class="table table-bordered table-hover">
                                        <thead style="background-color:#F0EFEF;">
                                            <tr>
                                                <th class="text-center">Description</th>
                                                <th colspan="3" class="text-center">Dimension (MM.)</th>
                                                <th class="text-center">QTY</th>
                                                <th class="text-center">UNIT</th>
                                                <th class="text-center">WIEGHT</th>
                                                <th colspan="2" class="text-center">Material</th>
                                                <th colspan="2" class="text-center">Manufacturing</th>
                                                <th colspan="2" class="text-center">Amount/Total</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th class="text-center">W</th>
                                                <th class="text-center">D</th>
                                                <th class="text-center">Thickness</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th class="text-center">Per Unit</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Per Unit</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Per Unit</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($materials as $key => $material)
                                                <tr>
                                                    <th class="text-center">
                                                        {{$material->name}}
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" step="0.1" name="width[]" class="form-control width_{{$key}}" value="{{$material->width}}">
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" step="0.1" name="lenght[]" class="form-control lenght_{{$key}}" value="{{$material->lenght}}"> 
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" step="0.1" name="thickness[]" class="form-control thickness_{{$key}}" value="{{$material->thickness}}">
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" name="qty[]"  class="form-control qty_{{$key}}" value="{{$material->qty}}">
                                                    </th>
                                                    <th class="text-center">{{$material->unit}}</th>
                                                    <th class="text-center">
                                                        <input type="number"  name="wieght[]" class="form-control wieght_{{$key}}" value="">
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" name="matper[]" class="form-control matper_{{$key}}" value="">
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" name="mattotal[]" class="form-control mattotal_{{$key}}" value="">
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" name="manuper[]"class="form-control manuper_{{$key}}" value="">
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" name="manutotal[]"class="form-control manutotal_{{$key}}" value="">
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" name="amountper[]"class="form-control amountper_{{$key}}" value="">
                                                    </th>
                                                    <th class="text-center">
                                                        <input type="number" name="amounttotal[]" class="form-control amounttotal_{{$key}}" value="">
                                                    </th>
                                                    <input type="hidden" name="refid[]" class="refid_{{$key}}" value="{{$material->componant_id}}">
                                                    <input type="hidden" name="matunit[]" class="matunit_{{$key}}" value="{{$material->matperunit}}">
                                                    <input type="hidden" name="manuunit[]" class="manuunit_{{$key}}" value="{{$material->manuperunit}}">
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan=7 class="text-right"> Total CP</td>
                                                <td></td>
                                                <td><input type="number" name="matsum[]" class="form-control matsum" value=""></td>
                                                <td></td>
                                                <td><input type="number" name="manusum[]" class="form-control manusum" value=""></td>
                                                <td></td>
                                                <td><input type="number" name="amountsum[]" class="form-control amountsum" value=""></td>
                                            </tr>
                                            <tr>
                                                <td colspan=7 class="text-right">MG</td>
                                                <td><input type="number" name="mgper[]" class="form-control mgper" value="10"></td>
                                                <td> <input type="number" name="mgmat[]" class="form-control mgmat" value=""></td>
                                                <td></td>
                                                <td><input type="number" name="mgmanu[]" class="form-control mgmanu" value=""></td>
                                                <td></td>
                                                <td><input type="number" name="mgamount[]" class="form-control mgamount" value=""></td>
                                            </tr>
                                            <tr>
                                                <td colspan=7 class="text-right">SP</td>
                                                <td></td>
                                                <td><input type="number" name="percal[]" class="form-control spper" value=""></td>
                                                <td></td>
                                                <td><input type="number" name="percal[]" class="form-control spmat" value=""></td>
                                                <td></td>
                                                <td><input type="number" name="percal[]" class="form-control spamount" value=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
       <script>
                var density= $('input[name=density]').val();
                var sheetcost= $('input[name=sheetcost]').val();
                var spare= $('input[name=spare]').val();

    
                $('input[name^="qty"]').each(function(i,data) {
                    var refid = $('.refid_'+i).val(); 
                    var qty = $('.componant_'+refid).val(); 

                    if(refid != ''){
                        $(this).val(Math.ceil(qty));
                    }
                });
            

                $('input[name^="wieght"]').each(function(i,data) {
                    var width = $('.width_'+i).val(); 
                    var lenght = $('.lenght_'+i).val(); 
                    var thickness = $('.thickness_'+i).val(); 

                    var value_wieght = ((width/1000)*(lenght/1000)*thickness*density*spare)
                    $(this).val(value_wieght.toFixed(2));
                });

                $('input[name^="matper"]').each(function(i,data) {
                    var wieght = $('.wieght_'+i).val(); 
                    var value_matper = Math.round(parseFloat(sheetcost)*parseFloat(wieght));

                    var refid = $('.refid_'+i).val();
                    var matunit = $('.matunit_'+i).val();
                     
                    if(refid != ''){
                        $(this).val(Math.ceil(matunit));
                    }else{
                        $(this).val(value_matper.toFixed(2));
                    }
                   
                });

                var summattotal = 0;
                $('input[name^="mattotal"]').each(function(i,data) {
                    var matper = $('.matper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(matper)*parseFloat(qty);
                    summattotal = summattotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".matsum").val(summattotal.toFixed(2));

                $('input[name^="manuper"]').each(function(i,data) {
                    var total = 100;
                    
                    var refid = $('.refid_'+i).val();
                    var matunit = $('.manuunit_'+i).val();
                    
                    $(this).val(parseFloat(matunit).toFixed(2));
                });

                var summanutotal = 0;
                $('input[name^="manutotal"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(manuper)*parseFloat(qty);
                    summanutotal = summanutotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".manusum").val(summanutotal.toFixed(2));

                $('input[name^="amountper"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var matper = $('.matper_'+i).val(); 
                    var total = parseFloat(manuper)+parseFloat(matper);
                    
                    $(this).val(total.toFixed(2));
                });
                
                var sumamounttotal = 0;
                $('input[name^="amounttotal"]').each(function(i,data) {
                    var mattotal = $('.mattotal_'+i).val(); 
                    var manutotal = $('.manutotal_'+i).val(); 
                    var total = parseFloat(mattotal)+parseFloat(manutotal);
                    sumamounttotal = sumamounttotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".amountsum").val(sumamounttotal.toFixed(2));

                var mgper = $('.mgper').val();
                var mgmat = parseFloat($('.matsum').val())*(mgper/100);
                var mgmanu = parseFloat($('.manusum').val())*(mgper/100);
                var mgamount = parseFloat($('.amountsum').val())*(mgper/100);

                $('.mgmat').val(mgmat.toFixed(2));
                $('.mgmanu').val(mgmanu.toFixed(2));
                $('.mgamount').val(mgamount.toFixed(2));

                $('.spper').val(parseFloat(summattotal)+parseFloat(mgmat));
                $('.spmat').val(parseFloat(summanutotal)+parseFloat(mgmanu));
                $('.spamount').val(parseFloat(sumamounttotal)+parseFloat(mgamount));
       </script>
       <script>
            $('input[name^="width"]').change(function(event) {
                $('input[name^="wieght"]').each(function(i,data) {
                    var width = $('.width_'+i).val(); 
                    var lenght = $('.lenght_'+i).val(); 
                    var thickness = $('.thickness_'+i).val(); 

                    var value_wieght = ((width/1000)*(lenght/1000)*thickness*density*spare)
                    $(this).val(value_wieght.toFixed(2));
                });

                $('input[name^="matper"]').each(function(i,data) {
                    var wieght = $('.wieght_'+i).val(); 
                    var value_matper = Math.round(parseFloat(sheetcost)*parseFloat(wieght));

                    var refid = $('.refid_'+i).val();
                    var matunit = $('.matunit_'+i).val();
                     
                    if(refid != ''){
                        $(this).val(Math.ceil(matunit));
                    }else{
                        $(this).val(value_matper.toFixed(2));
                    }
                   
                });

                var summattotal = 0;
                $('input[name^="mattotal"]').each(function(i,data) {
                    var matper = $('.matper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(matper)*parseFloat(qty);
                    summattotal = summattotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".matsum").val(summattotal.toFixed(2));

                $('input[name^="manuper"]').each(function(i,data) {
                    var total = 100;
                    
                    var refid = $('.refid_'+i).val();
                    var matunit = $('.manuunit_'+i).val();
                    
                    $(this).val(parseFloat(matunit).toFixed(2));
                });

                var summanutotal = 0;
                $('input[name^="manutotal"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(manuper)*parseFloat(qty);
                    summanutotal = summanutotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".manusum").val(summanutotal.toFixed(2));

                $('input[name^="amountper"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var matper = $('.matper_'+i).val(); 
                    var total = parseFloat(manuper)+parseFloat(matper);
                    
                    $(this).val(total.toFixed(2));
                });
                
                var sumamounttotal = 0;
                $('input[name^="amounttotal"]').each(function(i,data) {
                    var mattotal = $('.mattotal_'+i).val(); 
                    var manutotal = $('.manutotal_'+i).val(); 
                    var total = parseFloat(mattotal)+parseFloat(manutotal);
                    sumamounttotal = sumamounttotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".amountsum").val(sumamounttotal.toFixed(2));

                var mgper = $('.mgper').val();
                var mgmat = parseFloat($('.matsum').val())*(mgper/100);
                var mgmanu = parseFloat($('.manusum').val())*(mgper/100);
                var mgamount = parseFloat($('.amountsum').val())*(mgper/100);

                $('.mgmat').val(mgmat.toFixed(2));
                $('.mgmanu').val(mgmanu.toFixed(2));
                $('.mgamount').val(mgamount.toFixed(2));

                $('.spper').val(parseFloat(summattotal)+parseFloat(mgmat));
                $('.spmat').val(parseFloat(summanutotal)+parseFloat(mgmanu));
                $('.spamount').val(parseFloat(sumamounttotal)+parseFloat(mgamount));
            });

            $('input[name^="lenght"]').change(function(event) {

                $('input[name^="wieght"]').each(function(i,data) {
                    var width = $('.width_'+i).val(); 
                    var lenght = $('.lenght_'+i).val(); 
                    var thickness = $('.thickness_'+i).val(); 

                    var value_wieght = ((width/1000)*(lenght/1000)*thickness*density*spare)
                    $(this).val(value_wieght.toFixed(2));
                });

                $('input[name^="matper"]').each(function(i,data) {
                    var wieght = $('.wieght_'+i).val(); 
                    var value_matper = Math.round(parseFloat(sheetcost)*parseFloat(wieght));

                    var refid = $('.refid_'+i).val();
                    var matunit = $('.matunit_'+i).val();
                     
                    if(refid != ''){
                        $(this).val(Math.ceil(matunit));
                    }else{
                        $(this).val(value_matper.toFixed(2));
                    }
                   
                });

                var summattotal = 0;
                $('input[name^="mattotal"]').each(function(i,data) {
                    var matper = $('.matper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(matper)*parseFloat(qty);
                    summattotal = summattotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".matsum").val(summattotal.toFixed(2));

                $('input[name^="manuper"]').each(function(i,data) {
                    var total = 100;
                    
                    var refid = $('.refid_'+i).val();
                    var matunit = $('.manuunit_'+i).val();
                    
                    $(this).val(parseFloat(matunit).toFixed(2));
                });

                var summanutotal = 0;
                $('input[name^="manutotal"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(manuper)*parseFloat(qty);
                    summanutotal = summanutotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".manusum").val(summanutotal.toFixed(2));

                $('input[name^="amountper"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var matper = $('.matper_'+i).val(); 
                    var total = parseFloat(manuper)+parseFloat(matper);
                    
                    $(this).val(total.toFixed(2));
                });
                
                var sumamounttotal = 0;
                $('input[name^="amounttotal"]').each(function(i,data) {
                    var mattotal = $('.mattotal_'+i).val(); 
                    var manutotal = $('.manutotal_'+i).val(); 
                    var total = parseFloat(mattotal)+parseFloat(manutotal);
                    sumamounttotal = sumamounttotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".amountsum").val(sumamounttotal.toFixed(2));

                var mgper = $('.mgper').val();
                var mgmat = parseFloat($('.matsum').val())*(mgper/100);
                var mgmanu = parseFloat($('.manusum').val())*(mgper/100);
                var mgamount = parseFloat($('.amountsum').val())*(mgper/100);

                $('.mgmat').val(mgmat.toFixed(2));
                $('.mgmanu').val(mgmanu.toFixed(2));
                $('.mgamount').val(mgamount.toFixed(2));

                $('.spper').val(parseFloat(summattotal)+parseFloat(mgmat));
                $('.spmat').val(parseFloat(summanutotal)+parseFloat(mgmanu));
                $('.spamount').val(parseFloat(sumamounttotal)+parseFloat(mgamount));

            });

            $('input[name^="thickness"]').change(function(event) {
                $('input[name^="wieght"]').each(function(i,data) {
                    var width = $('.width_'+i).val(); 
                    var lenght = $('.lenght_'+i).val(); 
                    var thickness = $('.thickness_'+i).val(); 

                    var value_wieght = ((width/1000)*(lenght/1000)*thickness*density*spare)
                    $(this).val(value_wieght.toFixed(2));
                });

                $('input[name^="matper"]').each(function(i,data) {
                    var wieght = $('.wieght_'+i).val(); 
                    var value_matper = Math.round(parseFloat(sheetcost)*parseFloat(wieght));

                    var refid = $('.refid_'+i).val();
                    var matunit = $('.matunit_'+i).val();
                     
                    if(refid != ''){
                        $(this).val(Math.ceil(matunit));
                    }else{
                        $(this).val(value_matper.toFixed(2));
                    }
                   
                });

                var summattotal = 0;
                $('input[name^="mattotal"]').each(function(i,data) {
                    var matper = $('.matper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(matper)*parseFloat(qty);
                    summattotal = summattotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".matsum").val(summattotal.toFixed(2));

                $('input[name^="manuper"]').each(function(i,data) {
                    var total = 100;
                    
                    var refid = $('.refid_'+i).val();
                    var matunit = $('.manuunit_'+i).val();
                    
                    $(this).val(parseFloat(matunit).toFixed(2));
                });

                var summanutotal = 0;
                $('input[name^="manutotal"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(manuper)*parseFloat(qty);
                    summanutotal = summanutotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".manusum").val(summanutotal.toFixed(2));

                $('input[name^="amountper"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var matper = $('.matper_'+i).val(); 
                    var total = parseFloat(manuper)+parseFloat(matper);
                    
                    $(this).val(total.toFixed(2));
                });
                
                var sumamounttotal = 0;
                $('input[name^="amounttotal"]').each(function(i,data) {
                    var mattotal = $('.mattotal_'+i).val(); 
                    var manutotal = $('.manutotal_'+i).val(); 
                    var total = parseFloat(mattotal)+parseFloat(manutotal);
                    sumamounttotal = sumamounttotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".amountsum").val(sumamounttotal.toFixed(2));

                var mgper = $('.mgper').val();
                var mgmat = parseFloat($('.matsum').val())*(mgper/100);
                var mgmanu = parseFloat($('.manusum').val())*(mgper/100);
                var mgamount = parseFloat($('.amountsum').val())*(mgper/100);

                $('.mgmat').val(mgmat.toFixed(2));
                $('.mgmanu').val(mgmanu.toFixed(2));
                $('.mgamount').val(mgamount.toFixed(2));

                $('.spper').val(parseFloat(summattotal)+parseFloat(mgmat));
                $('.spmat').val(parseFloat(summanutotal)+parseFloat(mgmanu));
                $('.spamount').val(parseFloat(sumamounttotal)+parseFloat(mgamount));

            });

            $('input[name^="qty"]').change(function(event) {
                $('input[name^="wieght"]').each(function(i,data) {
                    var width = $('.width_'+i).val(); 
                    var lenght = $('.lenght_'+i).val(); 
                    var thickness = $('.thickness_'+i).val(); 

                    var value_wieght = ((width/1000)*(lenght/1000)*thickness*density*spare)
                    $(this).val(value_wieght.toFixed(2));
                });

                $('input[name^="matper"]').each(function(i,data) {
                    var wieght = $('.wieght_'+i).val(); 
                    var value_matper = Math.round(parseFloat(sheetcost)*parseFloat(wieght));

                    var refid = $('.refid_'+i).val();
                    var matunit = $('.matunit_'+i).val();
                     
                    if(refid != ''){
                        $(this).val(Math.ceil(matunit));
                    }else{
                        $(this).val(value_matper.toFixed(2));
                    }
                   
                });

                var summattotal = 0;
                $('input[name^="mattotal"]').each(function(i,data) {
                    var matper = $('.matper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(matper)*parseFloat(qty);
                    summattotal = summattotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".matsum").val(summattotal.toFixed(2));

                $('input[name^="manuper"]').each(function(i,data) {
                    var total = 100;
                    
                    var refid = $('.refid_'+i).val();
                    var matunit = $('.manuunit_'+i).val();
                    
                    $(this).val(parseFloat(matunit).toFixed(2));
                });

                var summanutotal = 0;
                $('input[name^="manutotal"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(manuper)*parseFloat(qty);
                    summanutotal = summanutotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".manusum").val(summanutotal.toFixed(2));

                $('input[name^="amountper"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var matper = $('.matper_'+i).val(); 
                    var total = parseFloat(manuper)+parseFloat(matper);
                    
                    $(this).val(total.toFixed(2));
                });
                
                var sumamounttotal = 0;
                $('input[name^="amounttotal"]').each(function(i,data) {
                    var mattotal = $('.mattotal_'+i).val(); 
                    var manutotal = $('.manutotal_'+i).val(); 
                    var total = parseFloat(mattotal)+parseFloat(manutotal);
                    sumamounttotal = sumamounttotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".amountsum").val(sumamounttotal.toFixed(2));

                var mgper = $('.mgper').val();
                var mgmat = parseFloat($('.matsum').val())*(mgper/100);
                var mgmanu = parseFloat($('.manusum').val())*(mgper/100);
                var mgamount = parseFloat($('.amountsum').val())*(mgper/100);

                $('.mgmat').val(mgmat.toFixed(2));
                $('.mgmanu').val(mgmanu.toFixed(2));
                $('.mgamount').val(mgamount.toFixed(2));

                $('.spper').val(parseFloat(summattotal)+parseFloat(mgmat));
                $('.spmat').val(parseFloat(summanutotal)+parseFloat(mgmanu));
                $('.spamount').val(parseFloat(sumamounttotal)+parseFloat(mgamount));
    
            });

            $('input[name^="wieght"]').change(function(event) {
                $('input[name^="matper"]').each(function(i,data) {
                    var wieght = $('.wieght_'+i).val(); 
                    var value_matper = Math.round(parseFloat(sheetcost)*parseFloat(wieght));

                    var refid = $('.refid_'+i).val();
                    var matunit = $('.matunit_'+i).val();
                     
                    if(refid != ''){
                        $(this).val(Math.ceil(matunit));
                    }else{
                        $(this).val(value_matper.toFixed(2));
                    }
                   
                });

                var summattotal = 0;
                $('input[name^="mattotal"]').each(function(i,data) {
                    var matper = $('.matper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(matper)*parseFloat(qty);
                    summattotal = summattotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".matsum").val(summattotal.toFixed(2));

                $('input[name^="manuper"]').each(function(i,data) {
                    var total = 100;
                    
                    var refid = $('.refid_'+i).val();
                    var matunit = $('.manuunit_'+i).val();
                    
                    $(this).val(parseFloat(matunit).toFixed(2));
                });

                var summanutotal = 0;
                $('input[name^="manutotal"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(manuper)*parseFloat(qty);
                    summanutotal = summanutotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".manusum").val(summanutotal.toFixed(2));

                $('input[name^="amountper"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var matper = $('.matper_'+i).val(); 
                    var total = parseFloat(manuper)+parseFloat(matper);
                    
                    $(this).val(total.toFixed(2));
                });
                
                var sumamounttotal = 0;
                $('input[name^="amounttotal"]').each(function(i,data) {
                    var mattotal = $('.mattotal_'+i).val(); 
                    var manutotal = $('.manutotal_'+i).val(); 
                    var total = parseFloat(mattotal)+parseFloat(manutotal);
                    sumamounttotal = sumamounttotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".amountsum").val(sumamounttotal.toFixed(2));

                var mgper = $('.mgper').val();
                var mgmat = parseFloat($('.matsum').val())*(mgper/100);
                var mgmanu = parseFloat($('.manusum').val())*(mgper/100);
                var mgamount = parseFloat($('.amountsum').val())*(mgper/100);

                $('.mgmat').val(mgmat.toFixed(2));
                $('.mgmanu').val(mgmanu.toFixed(2));
                $('.mgamount').val(mgamount.toFixed(2));

                $('.spper').val(parseFloat(summattotal)+parseFloat(mgmat));
                $('.spmat').val(parseFloat(summanutotal)+parseFloat(mgmanu));
                $('.spamount').val(parseFloat(sumamounttotal)+parseFloat(mgamount));

            });

            $('input[name^="matper"]').change(function(event) {
                var summattotal = 0;
                $('input[name^="mattotal"]').each(function(i,data) {
                    var matper = $('.matper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(matper)*parseFloat(qty);
                    summattotal = summattotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".matsum").val(summattotal.toFixed(2));

                $('input[name^="manuper"]').each(function(i,data) {
                    var total = 100;
                    
                    var refid = $('.refid_'+i).val();
                    var matunit = $('.manuunit_'+i).val();
                    
                    $(this).val(parseFloat(matunit).toFixed(2));
                });

                var summanutotal = 0;
                $('input[name^="manutotal"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(manuper)*parseFloat(qty);
                    summanutotal = summanutotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".manusum").val(summanutotal.toFixed(2));

                $('input[name^="amountper"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var matper = $('.matper_'+i).val(); 
                    var total = parseFloat(manuper)+parseFloat(matper);
                    
                    $(this).val(total.toFixed(2));
                });
                
                var sumamounttotal = 0;
                $('input[name^="amounttotal"]').each(function(i,data) {
                    var mattotal = $('.mattotal_'+i).val(); 
                    var manutotal = $('.manutotal_'+i).val(); 
                    var total = parseFloat(mattotal)+parseFloat(manutotal);
                    sumamounttotal = sumamounttotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".amountsum").val(sumamounttotal.toFixed(2));

                var mgper = $('.mgper').val();
                var mgmat = parseFloat($('.matsum').val())*(mgper/100);
                var mgmanu = parseFloat($('.manusum').val())*(mgper/100);
                var mgamount = parseFloat($('.amountsum').val())*(mgper/100);

                $('.mgmat').val(mgmat.toFixed(2));
                $('.mgmanu').val(mgmanu.toFixed(2));
                $('.mgamount').val(mgamount.toFixed(2));

                $('.spper').val(parseFloat(summattotal)+parseFloat(mgmat));
                $('.spmat').val(parseFloat(summanutotal)+parseFloat(mgmanu));
                $('.spamount').val(parseFloat(sumamounttotal)+parseFloat(mgamount));

            });

            $('input[name^="manuper"]').change(function(event) {
                var summanutotal = 0;
                $('input[name^="manutotal"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var qty = $('.qty_'+i).val(); 
                    var total = parseFloat(manuper)*parseFloat(qty);
                    summanutotal = summanutotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".manusum").val(summanutotal.toFixed(2));

                $('input[name^="amountper"]').each(function(i,data) {
                    var manuper = $('.manuper_'+i).val(); 
                    var matper = $('.matper_'+i).val(); 
                    var total = parseFloat(manuper)+parseFloat(matper);
                    
                    $(this).val(total.toFixed(2));
                });
                
                var sumamounttotal = 0;
                $('input[name^="amounttotal"]').each(function(i,data) {
                    var mattotal = $('.mattotal_'+i).val(); 
                    var manutotal = $('.manutotal_'+i).val(); 
                    var total = parseFloat(mattotal)+parseFloat(manutotal);
                    sumamounttotal = sumamounttotal + parseFloat(total);

                    $(this).val(total.toFixed(2));
                });
                $(".amountsum").val(sumamounttotal.toFixed(2));

                var mgper = $('.mgper').val();
                var mgmat = parseFloat($('.matsum').val())*(mgper/100);
                var mgmanu = parseFloat($('.manusum').val())*(mgper/100);
                var mgamount = parseFloat($('.amountsum').val())*(mgper/100);

                $('.mgmat').val(mgmat.toFixed(2));
                $('.mgmanu').val(mgmanu.toFixed(2));
                $('.mgamount').val(mgamount.toFixed(2));

                $('.spper').val(parseFloat(summattotal)+parseFloat(mgmat));
                $('.spmat').val(parseFloat(summanutotal)+parseFloat(mgmanu));
                $('.spamount').val(parseFloat(sumamounttotal)+parseFloat(mgamount));

            });

            $('.mgper').change(function(event) {

                var mgper = $(this).val();
                var mgmat = parseFloat($('.matsum').val())*(mgper/100);
                var mgmanu = parseFloat($('.manusum').val())*(mgper/100);
                var mgamount = parseFloat($('.amountsum').val())*(mgper/100);

                $('.mgmat').val(mgmat.toFixed(2));
                $('.mgmanu').val(mgmanu.toFixed(2));
                $('.mgamount').val(mgamount.toFixed(2));

                $('.spper').val(parseFloat(summattotal)+parseFloat(mgmat));
                $('.spmat').val(parseFloat(summanutotal)+parseFloat(mgmanu));
                $('.spamount').val(parseFloat(sumamounttotal)+parseFloat(mgamount));
            });
       </script>
@endsection