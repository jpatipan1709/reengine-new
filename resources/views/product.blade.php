@extends('layouts.masterproduct')
@section('title')
    Product
@endsection
@section('css')
    
@endsection
@section('content')
     <!-- Product Area Start -->
     <div class="product-wrapper section-space--ptb_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 order-md-1 order-2  small-mt__40">
                    <div class="shop-widget widget-size" style="border-bottom: none; margin-bottom: 0px;">
                        <div class="product-filter">
                            <div class="header-left-search">
                                <form action="#" class="header-search-box">
                                    <input class="search-field" type="text" placeholder="ค้นหา...">
                                    <button class="search-icon"><i class="icon-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="shop-widget widget-shop-categories">
                        <div class="product-filter">
                            <h6 class="mb-20">หวดหมู่</h6>
                            <ul class="widget-nav-list">
                                <li class="active"><a href="#">ทั้งหมด</a></li>
                                <li><a href="#">ตู้</a></li>
                                <li><a href="#">เก้าอี้</a></li>
                                <li><a href="#">โต๊ะ</a></li>
                                <li><a href="#">เตา</a></li>
                                <li><a href="#">ชั้นวางของ</a></li>
                                <li><a href="#">ฉากกั้น</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Product Filter -->
                    {{-- <div class="shop-widget widget-size">
                        <div class="product-filter">
                            <h6 class="mb-20">ขนาด</h6>
                            <ul class="widget-nav-list">
                                <li><a href="#">ใหญ่ <span class="count">1</span></a></li>
                                <li><a href="#">กลาง <span class="count">1</span></a></li>
                                <li><a href="#">เล็ก <span class="count">1</span></a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- Product Filter -->
                    {{-- <div class="shop-widget">
                        <div class="product-filter widget-price">
                            <h6 class="mb-20">ราคา</h6>
                            <ul class="widget-nav-list">
                                <li>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">0</label>
                                        </div>
                                        <div class="col-6 text-right">
                                            <label for="">100,000</label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="range-wrap">
                                        <div class="range-value" id="rangeV"></div>
                                        <input id="range" type="range" min="0" max="100000" value="10000">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-9 col-md-9  order-md-2 order-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="shop-toolbar__items shop-toolbar__item--left">
                                <div class="shop-toolbar__item shop-toolbar__item--result">
                                    <p class="result-count"> แสดง 1–9 จาก 21</p>
                                </div>

                                {{-- <div class="shop-toolbar__item shop-short-by">
                                    <ul>
                                        <li>
                                            <a href="#">เรียงลำดับ: <span class="d-none d-sm-inline-block">ปกติ</span> <i class="fa fa-angle-down angle-down"></i></a>
                                            <ul>
                                                <li class="active"><a href="#">ปกติ</a></li>
                                                <li><a href="#">ความนิยม</a></li>
                                                <li><a href="#">ราคา น้อย -> มาก</a></li>
                                                <li><a href="#">ราคา มาก -> น้อย</a></li>
                                                <li><a href="#">ชื่อ A-Z</a></li>
                                                <li><a href="#">ชื่อ Z-A</a></li>
                                            </ul>
                                        </li>

                                    </ul>

                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="shop-toolbar__items shop-toolbar__item--right">
                                <div class="shop-toolbar__items-wrapper">
                                    <div class="shop-toolbar__item">
                                        <ul class="nav toolber-tab-menu justify-content-start" role="tablist">
                                            <li class="tab__item nav-item active">
                                                <a class="nav-link active" data-toggle="tab" href="#tab_columns_01" role="tab">
                                                    <img src="{{asset('frontend/assets/images/svg/column-03.svg')}}" class="img-fluid" alt="Columns 03">
                                                </a>
                                            </li>
                                            <li class="tab__item nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tab_columns_02" role="tab"><img src="{{asset('frontend/assets/images/svg/column-04.svg')}}" class="img-fluid" alt="Columns 03"> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab_columns_01">
                            <div class="row">
                                @foreach ($products as $item)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <!-- Single Product Item Start -->
                                    <div class="single-product-item text-center">
                                        <div class="products-images">
                                            <a href="{{url('product-detail',$item->id)}}" class="product-thumbnail">
                                                <img src="{{asset('local/public/storage').'/'.$item->album->images}}" class="img-fluid" alt="Product Images">

                                                @if ($item->quantity <= 0)
                                                    <span class="ribbon out-of-stock ">
                                                        สินค้าหมด
                                                    </span>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h6 class="prodect-title"><a href="{{url('product-detail',$item->id)}}">{{$item->name}}</a></h6>
                                        </div>
                                    </div><!-- Single Product Item End -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_columns_02">
                            <div class="row">
                                @foreach ($products as $item)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                       <!-- Single Product Item Start -->
                                    <div class="single-product-item text-center">
                                        <div class="products-images">
                                            <a href="{{url('product-detail',$item->id)}}" class="product-thumbnail">
                                                <img src="{{asset('local/public/storage').'/'.$item->album->images}}" class="img-fluid" alt="Product Images">

                                                @if ($item->quantity <= 0)
                                                <span class="ribbon out-of-stock ">
                                                    สินค้าหมด
                                                </span>
                                                 @endif
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h6 class="prodect-title"><a href="{{url('product-detail',$item->id)}}">{{$item->name}}</a></h6>
                                        </div>
                                    </div><!-- Single Product Item End -->
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                {{ $products->links('pagination') }}
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