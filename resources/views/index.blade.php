@extends('layouts.master')
@section('title')
    Reengine - Thailand
@endsection
@section('css')

@endsection
@section('content')

<!-- Hero Slider Area Start -->
<div class="hero-area hero-slider-five" id="#section1">
    @foreach ($banners as $banner)
    <div class="single-hero-slider-five">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content-wrap">
                        <div class="hero-text-five mt-lg-5">
                            <h6 class=" mb-30 small-title">
                              {{ $banner->title}}
                            </h6>
                            {!! $banner->content!!}
                        </div>
                        <div class="inner-images">
                            <div class="image-one">
                                <img src="{{asset('frontend/assets/images/hero/home-full-width-2.png')}}"
                                    class="img-fluid" alt="Image">
                            </div>
                            <div class="image-two">
                                <img src="{{asset('local/public/storage').'/'.$banner->images}}" class="img-fluid"
                                    alt="Image">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Hero Slider Area End -->

<!-- Product Area Start -->
<div class="product-wrapper section-space--ptb_120" id="#section2">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="perfection-dec mr-lg-5">
                    <h3 class="mb-10" style="color: #dcb14a">{{$abouts->title}}</h3>
                    {!!$abouts->content!!}
                </div>
            </div>
            <div class="col-sm-6">
                <img src="{{asset('local/public/storage').'/'.$abouts->images}}" class="img-fluid" alt="Banner images">
            </div>
        </div>
    </div>
</div>

<!-- Product Area End -->

<!-- Offer Colection Area Start -->
<div class="product-wrapper section-space--ptb_120" style="background-color: #f9f9f9;" id="#section3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="section-title text-lg-left text-center mb-20">
                    <h3 class="section-title">สินค้าของเรา</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <ul class="nav product-tab-menu justify-content-lg-end justify-content-center" role="tablist">
                    <li class="tab__item nav-item active">
                        <a class="nav-link active" data-toggle="tab" href="#tab_list_00" role="tab">สินค้าทั้งหมด</a>
                    </li>
                    @foreach ($category as $item)
                        @if (!empty($item->product))
                            <li class="tab__item nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab_list_{{$item->id}}" role="tab">{{$item->categoryname}}</a>
                            </li>
                        @endif
                    @endforeach
                    </li>
                </ul>
            </div>

        </div>

        <div class="tab-content mt-30">

            <div class="tab-pane fade show active" id="tab_list_00">
                <div class="row product-slider-active">
                    @foreach ($products as $item)
                    <div class="col-lg-12">
                        <!-- Single Product Item Start -->
                        <div class="single-product-item text-center">
                            <div class="products-images">
                                <a href="{{url('/product-detail',$item->id)}}" class="product-thumbnail">
                                    <img src="{{asset('frontend/img/14-office-chair-png-image.png')}}" height="300px"
                                        class="img-fluid" alt="Product Images">

                                    @if ($item->quantity <= 0)
                                        <span class="ribbon out-of-stock ">
                                            สินค้าหมด
                                        </span>
                                    @endif
                                </a>
                            </div>
                            <div class="product-content">
                                <h6 class="prodect-title"><a href="{{url('/product-detail',$item->id)}}">{{$item->name}}</a></h6>
                            </div>
                        </div><!-- Single Product Item End -->
                    </div>
                    @endforeach
                </div>
              
            </div>

            @foreach ($category as $item)
                <div class="tab-pane" id="tab_list_{{$item->id}}">
                    <div class="row product-slider-active">
                        @foreach ($item->products as $product)
                        <div class="col-lg-12">
                            <!-- Single Product Item Start -->
                            <div class="single-product-item text-center">
                                <div class="products-images">
                                    <a href="{{url('/product-detail',$item->id)}}" class="product-thumbnail">
                                        <img src="{{asset('local/public/storage').'/'.$product->album->images}}"
                                            class="img-fluid" alt="Product Images">
                                        @if ($product->quantity <= 0)
                                            <span class="ribbon out-of-stock ">
                                                สินค้าหมด
                                            </span>
                                        @endif
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h6 class="prodect-title"><a href="{{url('/product-detail',$item->id)}}">{{$product->name}}</a></h6>
                                </div>
                            </div><!-- Single Product Item End -->
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row" style="padding-top: 40px;">
            <div class="col-12 text-center">
                <div class="middle">
                    <a href="{{url('product')}}" class="btn-box btn1">ดูสินค้าเพิ่มเติม</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer Colection Area End -->

<!-- Product Area Start -->
<div class="product-wrapper section-space--ptb_120" id="#section4">
    <div class="contact-us-info-area mt-30 section-space--mb_60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="single-contact-info-item">
                        <div class="icon">
                            <i class="icon-clock3"></i>
                        </div>
                        <div class="iconbox-desc">
                            <h6 class="mb-10">เวลาทำการ</h6>
                            <p>{!!$contact->workinghours!!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-contact-info-item">
                        <div class="icon">
                            <i class="icon-telephone"></i>
                        </div>
                        <div class="iconbox-desc">
                            <h6 class="mb-10">เบอร์โทร</h6>
                            <a href="tel:0815619353" class="hover-style-link">{!!$contact->telephone!!}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-contact-info-item">
                        <div class="icon">
                            <i class="icon-envelope-open"></i>
                        </div>
                        <div class="iconbox-desc">
                            <h6 class="mb-10">อีเมล</h6>
                            <p style="font-size: 14px;">{!!$contact->email!!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-contact-info-item">
                        <div class="icon">
                            <i class="icon-map-marker"></i>
                        </div>
                        <div class="iconbox-desc">
                            <h6 class="mb-10">สถานที่</h6>
                            {!!$contact->address!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End -->
@endsection
@section('js')

@endsection
