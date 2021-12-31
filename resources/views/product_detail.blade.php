@extends('layouts.masterproduct')
@section('title')
{{$product->name}} -  รายละเอียดสินค้า
@endsection
@section('css')
    
@endsection
@section('content')
<div class="single-product-wrap section-space--pt_90 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" >

                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images-2 slider-lg-image-2">
                        @foreach ($product->albums as $item)
                            <div class="easyzoom-style" >
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{asset('local/public/storage').'/'.$item->images}}"  class="poppu-img">
                                        <img src="{{asset('local/public/storage').'/'.$item->images}}" width="50%"  class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="product-details-thumbs-2 slider-thumbs-2">
                        @foreach ($product->albums as $item)
                        <div class="sm-image"><img src="{{asset('local/public/storage').'/'.$item->images}}" width="100px" alt="product image thumb"></div>
                        @endforeach
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-details-content">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="breadcrumb-title">{{$product->name}}</h2>
                        </div>
                        <div class="col-6 text-right">
                            <h5 class="font-weight--reguler mb-10"><h3 class="price">{{number_format($product->price,2,'.',',')}} ฿</h3></h5>
                        </div>
                    </div>

                    <div class="quickview-peragraph mt-10">
                        <p>{!!$product->description!!}</p>
                    </div>

                    <div class="product_meta mt-3 mb-10">
                        <div class="sku_wrapper item_meta">
                            <span class="label"> SKU: </span>
                            <span class="sku"> {{$product->sku}} </span>
                        </div>
                        <div class="posted_in item_meta  mt-3 ">
                            <span class="label">Categories: </span><a href="#">{{$product->category->categoryname}}</a>
                        </div>
                    </div>

                    <!-- <div class="variable-color-selector mt-20 variations" style="margin-bottom: 30px;">
                        <label>เลือกวัสดุ</label>
                        <select>
                            <option value="black" class="attached enabled" selected>ไม้</option>
                            <option value="grey" class="attached enabled">เหล็ก</option>
                            <option value="white" class="attached enabled">พลาสติก</option>
                        </select>
                    </div> -->
                    <hr>
                    <div class="table-content table-responsive cart-table-content " >
                        <table class="groupped-table" style="padding: 0 0 0 0;">
                            <thead>
                                <tr class="pd-0">
                                    <th class=" text-center pt-3 pb-3" style="width: 5%;">#</th>
                                    <th class="product-name text-center pt-3 pb-3" style="width: 20%;">รายละเอียดสินค้า</th>
                                    <th class="text-center  pt-3 pb-3" style="width: 15%;">วัสดุ</th>
                                    <th class="product-name text-center  pt-3 pb-3" style="width: 40%;">ขนาด</th>
                                    <th class="text-center  pt-3 pb-3">จำนวน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="single-groupped-item">
                                    <th class="text-center">
                                       1
                                    </th>
                                    <th class="text-center">
                                        <div class="product-groupped-item">
                                            <a class="product-title" href="#">ขาเก้าอี้</a>
                                        </div>
                                    </th>
                                    <th class="text-center">
                                        ไม้
                                    </th>
                                    <th >
                                        <div class="row">
                                            <div class="col-lg-4 col-lg-4">
                                                <div class="contact-inner">
                                                    <label for="width">กว้าง</label>
                                                    <input type="number" name="" id="width" placeholder="กว้าง" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-lg-4">
                                                <div class="contact-inner">
                                                    <label for="lenght">ยาว</label>
                                                    <input type="number" name="" id="lenght" placeholder="ยาว" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-lg-4">
                                                <div class="contact-inner">
                                                    <label for="height">สูง</label>
                                                    <input type="number" name="" id="height" placeholder="สูง" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <div class="contact-inner">
                                                    <label for="height" class="text-white">.</label>
                                                    <input type="number" name="" placeholder=""  value="1" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <form action="#" id="form_add_cart">
                        <div class="cart-buttom-area mt-30 mb-30">
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="cart_totals section-space--mt_40 ml-md-auto">
                                        <div class="grand-total-wrap">
                                            <div class="grand-total-content">
                                                <ul>
                                                    <li>จำนวนสินค้า 
                                                        <span>
                                                            <div class="quickview-quality">
                                                                <div class="cart-plus-minus">
                                                                    <input class="cart-plus-minus-box qty" type="text" name="qty" value="1">
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </li>
                                                    
                                                    <li>ราคา/ชิ้น<span >{{$product->price}} ฿</span> </li>
                                                    <li>ราคา (ก่อนรวม Vat) <span class="beforevat">{{$product->price - ($product->price * 0.07)}} ฿</span> </li>
                                                    <li>VAT (7%) <span class="vat">{{$product->price * 0.07}} ฿</span></li>
                                                    <li>ราคาสุธิ <span class="amount">{{$product->price}} ฿</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="grand-btn mt-30">
                                           
                                            <input type="hidden" name="price" class="price_ea" value="{{$product->price}}">
                                            <input type="hidden" name="amount" class="amount2"  value="{{$product->price}}">
                                            <input type="hidden" name="id" class="id" value="{{$product->id}}">
                                            <input type="hidden" name="url" class="url" value="{{url('addcart')}}">
                                            <button type="button" style="background-color: #dcb14a; border: none;" class="add_cart btn-cus1 btn--full text-center btn--lg">สั่งซื้อ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(".add_cart").click(function(){
            var qty = $("input[name=qty]").val();
            var price = $("input[name=price]").val();
            var amount = $("input[name=amount]").val();
            var id = $("input[name=id]").val();
            var url = $(".url").val();
            $.ajax({
                url: url,
                data:{
                    qty:qty,
                    price:price,
                    amount:amount,
                    id:id,
                    "_token": "{{ csrf_token() }}",
                },
                method:"post"
            }).done(function(data) {
                console.log('data',data);
            });
        });

        $(".qtybutton").click(function(){
            value = $(".qty").val();
            price = $(".price_ea").val();

            total = parseFloat(price) * parseFloat(value);
            beforevat = total - (total*0.07);
            vat = (total*0.07);

            $(".amount").html(total.toFixed(2)+' ฿')
            $(".beforevat").html(beforevat.toFixed(2)+' ฿');
            $(".vat").html(vat.toFixed(2)+' ฿');

            $(".amount2").val(total);

            console.log(value,price,total);
        });
    </script>
@endsection