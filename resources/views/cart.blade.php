@extends('layouts.masterproduct')
@section('title')
ตะกร้าสินค้า
@endsection
@section('css')
    
@endsection
@section('content')
<div class="single-product-wrap border-bottom">
    <!-- cart start -->
    <div class="cart-main-area  section-space--ptb_90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content header-color-gray">
                            <table>
                                <thead>
                                    <tr class="bg-gray">
                                        <th></th>
                                        <th class="product-name text-center">รายการสินค้า</th>
                                        <th class="product-price"> ราคา</th>
                                        <th>ปรับแต่ง</th>
                                        <th>จำนวน</th>
                                        <th>ราคา</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (\Cart::getContent()->count() === 0)
                                        
                                    <tr class="bg-gray">
                                        <td colspan="6" class="text-center">ไม่มีสินค้าในตะกร้า</td>
                                    </tr>

                                    @else 
                                       @foreach (\Cart::getContent() as $item)
                                        <tr>
                                            <td class="product-img">
                                                <a href="#"><img src="{{url('frontend/assets/images/product/small/cart-01.jpg')}}" alt=""></a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">{{$item->name}}</a>
                                                <ul class="detail">
                                                    <li>- ขาเก้าอี้ (กว้าง 20, ยาว 40, สูง 150)</li>
                                                    <li>- ที่วางแขน</li>
                                                    <li>- ล้อ (กว้าง 80, ยาว 150, สูง 30)</li>
                                                    <li>- ปีกข้าง (สูง 30, หนา 15)</li>
                                                </ul>
                                            </td>
                                            <td class="product-price" width="5%"><span class="amount">{{number_format($item->price,2,'.',',')}} ฿</span></td>
                                            <td>
                                                <a href="product-detail.html" class="btn btn--lg btn--black" type="button"><i class="icon-hammer-wrench" style="font-size: larger;"></i></a>
                                            </td>
                                            <td class="cart-quality">
                                                <div class="quickview-quality quality-height-dec2">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box qty{{$item->id}}" type="text" name="qty" value="{{$item->quantity}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price-total">
                                                <span class="amount">{{number_format($item->quantity * $item->price,2,'.',',')}} ฿</span>
                                            </td>
                                            <td class="product-remove">
                                                <i class="icon-cross2 remove_cart" data-id="{{$item->id}}" style="cursor: pointer"></i>
                                            </td>
                                        </tr>
                                    @endforeach 
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="shoping-update-area row">
                        <div class="continue-shopping-butotn col-6 mt-30">
                            <a href="{{url('product')}}" class="btn btn--lg btn--black"><i class="icon-arrow-left"></i> เลือกสินค้าต่อ</a>
                        </div>
                        <!-- <div class="update-cart-button col-6 text-right mt-30">
                            <a href="#" class="btn btn--lg btn--border_1">อัปเดตรายการ</a>
                        </div> -->
                    </div>
                    <div class="cart-buttom-area">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="cart_totals section-space--mt_60 ml-md-auto">
                                    <div class="grand-total-wrap">
                                        <div class="grand-total-content">
                                            <ul>
                                                <li>จำนวนสินค้า <span> {{Cart::getTotalQuantity()}}</span></li>
                                                <li>รวมทั้งสิ้น <span>{{number_format(Cart::getTotal(),2,'.',',')}} ฿</span> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="grand-btn mt-30">
                                        <input type="hidden" name="url" class="url" value="{{url('removecart')}}">
                                        <input type="hidden" name="url2" class="url2" value="{{url('updatecart')}}">
                                        <input type="hidden" name="id" class="id" value="{{$item->id}}">
                                        <button type="button" onclick="checkout()" class="btn-cus1 btn--full text-center btn--lg">ดำเนินการต่อ <i class="icon-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- cart end -->
</div>
@endsection
@section('js')
    <script>
         $(".remove_cart").click(function(){
            var id = $(this).attr('data-id');
            var url = $(".url").val();
            $.ajax({
                url: url,
                data:{
                    id:id,
                    "_token": "{{ csrf_token() }}",
                },
                method:"post"
            }).done(function(data) {
               if(data){
                    window.location.reload();
               }
            });
        });

        $(".qtybutton").click(function(){
            var id = $(".id").val()
            var value = $(".qty"+id).val();
            var url = $(".url2").val();

            console.log(value,id,url);

            $.ajax({
                url: url,
                data:{
                    id:id,
                    value:value,
                    "_token": "{{ csrf_token() }}",
                },
                method:"post"
            }).done(function(data) {
               if(data){
                   window.location.reload();
               }
            });
        });
    </script>
@endsection