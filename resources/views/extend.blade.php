
    <!-- Modal -->
    <div class="header-login-register-wrapper modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-hidden="true" style="z-index: 99999;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-box-wrapper">
                    <div class="tab-content content-modal-box">
                        <form action="#" class="account-form-box">
                            <div class="single-input">
                                <input type="text" placeholder="บัญชีผู้ใช้">
                            </div>
                            <div class="single-input">
                                <input type="password" placeholder="รหัสผ่าน">
                            </div>
                            <div class="checkbox-wrap mt-10">
                                <label class="label-for-checkbox inline mt-15">
                                    <input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme"
                                        value="forever"> <span>จดจำฉันเอาไว้</span>
                                </label>
                                <a href="#" class=" mt-10">ลืมรหัสผ่าน?</a>
                            </div>
                            <div class="button-box mt-25">
                                <a href="#" class="btn btn--full btn--black">เข้าสู่ระบบ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal exit -->
    <div class="header-login-register-wrapper modal fade" id="exampleModalexit" tabindex="-1" role="dialog"
        aria-hidden="true" style="z-index: 99999;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-box-wrapper">
                    <div class="tab-content content-modal-box">
                        <form action="#" class="account-form-box">
                            <div class="button-box mt-25">
                                <a href="#" class="btn btn--full btn--black">ออกจากระบบ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">

        <div class="mobile-menu-overlay__inner">

            <div class="mobile-menu-close-box text-left">
                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"> <i
                        class="icon-cross2"></i></span>
            </div>
            <div class="mobile-menu-overlay__body">
                <div class="offcanvas-menu-header">
                    <nav class="offcanvas-navigation" style="padding-bottom: 50px;">
                        <ul>
                            <li class="has-children">
                                <a href="#" data-toggle="modal" data-target="#exampleModalexit"
                                    style="font-size: 20px;">
                                    <i class="icon-user"></i> <span>Post Malone</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="helendo-language-currency row-flex row section-space--mb_60 ">
                        <div class="widget-language col-md-12">
                            <h6> หมวดหมู่</h6>
                        </div>
                        <div class="widget-language col-6">
                            <ul>
                                @foreach ($category as $item)
                                    <li><a href="all-product.html">{{ $item->categoryname}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="widget-language col-6">
                            <ul>
                                <li><a href="all-product.html">ตู้</a></li>
                                <li><a href="all-product.html">เก้าอี้</a></li>
                                <li><a href="all-product.html">โต๊ะ</a></li>
                                <li><a href="all-product.html">เตา</a></li>
                                <li><a href="all-product.html">ชั้นวางของ</a></li>
                                <li><a href="all-product.html">ฉากกั้น</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <nav class="offcanvas-navigation">
                    <ul>
                        <li class="has-children">
                            <a href="#">เข้าสู่ระบบ</a>
                            <ul class="sub-menu">
                                <li><a href="" data-toggle="modal" data-target="#exampleModal"><span>Reenigne
                                            Thailand</span></a></li>
                                <li><a href="http://www.reenigne-ss.com/"><span>Reenigne SS</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <div class="mobile-menu-contact-info section-space--mt_60">
                    <h6>ติดต่อเรา</h6>
                    {!!$contact->address!!}
                    <p>โทรศัพท์ : {{$contact->telephone}}</p>
                </div>

                <div class="mobile-menu-social-share section-space--mt_60">
                    <h6>โซเชียลมีเดีย</h6>
                    <ul class="social-share">
                        <li><a href="https://{{$footer->facebook}}"><i class="social social_facebook"></i></a></li>
                        <li><a href="https://{{$footer->twitter}}"><i class="social social_twitter"></i></a></li>
                        <li><a href="https://{{$footer->instagrame}}"><i class="social social_instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of mobile menu overlay  ====================-->

    <!--====================  search overlay ====================-->
     {{-- <div class="search-overlay" id="search-overlay">

        <div class="search-overlay__header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-8">
                        <div class="search-title">
                            <h4 class="font-weight--normal">Search</h4>
                        </div>
                    </div>
                    <div class="col-md-6 ml-auto col-4">
                        <!-- search content -->
                        <div class="search-content text-right">
                            <span class="mobile-navigation-close-icon" id="search-close-trigger"><i
                                    class="icon-cross"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="search-overlay__inner">
            <div class="search-overlay__body">
                <div class="search-overlay__form">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 ml-auto mr-auto">
                                <form action="#">
                                    <div class="product-cats section-space--mb_60 text-center">
                                        <label> <input type="radio" name="product_cat" value="" checked="checked"> <span
                                                class="line-hover">All</span> </label>
                                        <label> <input type="radio" name="product_cat" value="decoration"> <span
                                                class="line-hover">Decoration</span> </label>
                                        <label> <input type="radio" name="product_cat" value="furniture"> <span
                                                class="line-hover">Furniture</span> </label>
                                        <label> <input type="radio" name="product_cat" value="table"> <span
                                                class="line-hover">Table</span> </label> <label> <input type="radio"
                                                name="product_cat" value="chair"> <span class="line-hover">Chair</span>
                                        </label>
                                    </div>
                                    <div class="search-fields">
                                        <input type="text" placeholder="Search">
                                        <button class="submit-button"><i class="icon-magnifier"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!--====================  End of search overlay  ====================-->
