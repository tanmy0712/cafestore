@extends('pages.page_layout')
@section('web_content')


    <link rel="stylesheet" href="{{ asset('public/fontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fontend/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fontend/assets/css/lightslider.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fontend/assets/css/prettify.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fontend/assets/css/thongtinkhachsan.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fontend/assets/css/resTrangchu.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('public/fontend/assets/css/style.css')}}"> --}}
    <div class="menumin">
        <div class="menumin-box">
            <ul class="menumin-box-ul">
                <li class="menumin-box-li">BoNoDrinks</li>
                @if (isset($flashsale))
                    <li class="menumin-box-li"><i class="fa-solid fa-angle-right"></i></li>
                    <li class="menumin-box-li">Flashsale</li>
                @endif
                <li class="menumin-box-li"><i class="fa-solid fa-angle-right"></i></li>
                <li class="menumin-box-li">{{ $product->category->category_name }}</li>
                <li class="menumin-box-li"> <i class="fa-solid fa-angle-right"></i></li>
                <li class="menumin-box-li">{{ $product->product_name }}</li>
            </ul>
        </div>
    </div>




    <div class="card-product">
        <div class="product-image">
            <ul id="lightSlider">
                <li data-thumb="{{ asset('public/fontend/assets/img/product/' . $product->product_image . '') }}">
                    <img src="{{ asset('public/fontend/assets/img/product/' . $product->product_image . '') }}" />
                </li>
                @foreach ($gallery as $image)
                    <li data-thumb="{{ asset('public/fontend/assets/img/product/' . $image->gallery_image_product) }}">
                        <img src="{{ asset('public/fontend/assets/img/product/' . $image->gallery_image_product) }}" />
                    </li>
                @endforeach
                {{-- <li data-thumb="https://product.hstatic.net/1000075078/product/1639377904_bac-siu_12ef081a3577445a8fcbc84a0a0d6202.jpg">
                    <img src="https://product.hstatic.net/1000075078/product/1639377904_bac-siu_12ef081a3577445a8fcbc84a0a0d6202.jpg" />
                </li> --}}

            </ul>
        </div>

        <div class="product-detail">
            <div class="product-title">
                <h2>{{ $product->product_name }}</h2>
            </div>
            <input type="text" id="product_id" value="{{ $product->product_id }}" hidden>

            <div class="product-price" style="font-size: 1.75rem; font-weight: 100">
                @if (isset($flashsale))
                    <h3>{{ number_format($flashsale->flashsale_price_sale, 0, ',', '.') }}đ / <span
                            style="text-decoration: line-through; font-size: 20px;">{{ number_format($product->product_price, 0, ',', '.') }}đ</span>
                    </h3>
                @else
                    <h3>{{ number_format($product->product_price, 0, ',', '.') }}đ</h3>
                @endif
            </div>

            <div class="product-size-box">
                <p>Chọn size (Bắt Buộc)</p>
                <hr width="100%">
                <div class="product-size">
                    @foreach ($sizes as $key => $size)
                        <div class="size-main">
                            <label class="size-detail" for="{{ $size->product_type_name }}"><i class="fas fa-coffee"></i>
                                {{ $size->product_type_name }} +
                                {{ number_format($size->product_type_price, 0, ',', '.') }}đ</label>
                            <input id="{{ $size->product_type_name }}" value="{{ $size->product_type_id }}" type="radio" name="size" hidden>
                        </div>
                    @endforeach
                    {{-- <div class="size-main">
                            <label class="size-detail" for="vua"><i class="fas fa-coffee"></i> Vừa + 6.000đ</label>
                            <input id="vua" type="radio" name="size" hidden>
                        </div>

                        <div class="size-main">
                            <label class="size-detail" for="lon"><i class="fas fa-coffee"></i> Lớn + 10.000đ</label>
                            <input id="lon" type="radio" name="size" hidden> 
                        </div> --}}
                </div>
            </div>

            <div class="product-quantity">
                <p>Quantity</p>
                <hr>
                <br>
                <div class="quantity-item">

                    <i class="fas fa-minus minus"></i>

                    <span id="quantity">1</span>


                    <i class="fas fa-plus plus"></i>
                </div>
            </div>

            <div class="add-cart">
                <button class="btn-add-cart">Thêm Vào Giỏ Hàng <i class="fas fa-shopping-cart"></i></button>
            </div>
        </div>

    </div>





    <input type="checkbox" hidden class="Input-ShowImgHotel-Select" name="" id="Input-ShowImgHotel">
    <label for="Input-ShowImgHotel" class="showimg-overlay ">

    </label>
    <!-- <div class="ShowImgHotel">
            <div class="ShowImgHotel-Box">
                <div class="ShowImgHotel-js owl-carousel owl-theme">
                    <div class="item">
                        <img width="1100px" height="628px" style="object-fit: cover;border-radius: 8px;"
                            src="assets/img/showimg/1.jpg" alt="">
                    </div>
                    <div class="item">
                        <img width="1100px" height="628px" style="object-fit: cover;border-radius: 8px;"
                            src="assets/img/showimg/2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div> -->

    <div id="chooserooms" class="chooserooms">
        <div class="chooseroomsbox">
            <div class="chooseroomsbox-Title">
                <span>Mô Tả Sản Phẩm</span>
            </div>
            <div class="chooseroomsbox-boxcontent">
                <div class="chooseroomsbox-boxcontent-top">
                    <i class="fa-solid fa-star"></i>
                    <span style="margin-left: 15px ; margin-top: 2px;">{{ $product->product_name }}</span>
                </div>
                <div class="chooseroomsbox-boxcontent-bottom">
                    <?php echo $product->product_desc; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="Danhgia">
        <div class="Danhgiabox">
            <div class="DanhgiaBox-Title_Text">
                <div class="Danhgia-Title">
                    <span>Đánh giá</span>
                </div>
                <div class="Danhgia-Text">
                    <span>100% đánh giá từ khách hàng đặt sản phẩm tại BoNoDrinks</span>
                </div>
            </div>
            <div class="big-div-Userwrite">
                {{-- <div class="userswrite">
    
                    <div class="userswrite-boxone">
                        <div class="userswrite-boxone-imgusers">
                            <div class="userswrite-boxone-imgusers-element">
                                <span>N</span>
                            </div>
                        </div>
                        <div class="userswrite-boxone-infousers">
                            <div class="userswrite-boxone-infousers-box">
                                <div class="userswrite-boxone-infousers-title">
                                    <span>Khả Nhân</span>
                                </div>
                                <div class="userswrite-boxone-infousers-item">
    
                                    <span class="userswrite-boxone-infousers-item-text">30/05/2003</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="userswrite-boxtwo">
                        <div class="userswrite-boxtwo-title">
                            <span>Kỳ nghỉ Hè hoàn hảo</span>
                        </div>
                        <div class="userswrite-boxtwo-content">
                            <span>Khu nghỉ mát tuyệt vời với dịch vụ trên cả tuyệt vời. Nhân viên rất chu đáo và lễ phép.</span>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <!-- <div class="imgusers">
                    <div class="imgusers-box">
                        <div class="imgusers-box-left">
                            <div class="imgusers-box-left-text">
                                <span>Ảnh người dùng đánh giá</span>
                            </div>
                            <div class="imgusers-box-left-img">
                                <div class="imgusers-box-left-img-item">
                                    <img width="56px" height="56px" style="border-radius: 5px;object-fit: cover ;"
                                        src="assets/img/datphong/anhnguoidung1.jpg" alt="">
                                </div>
                                <div class="imgusers-box-left-img-item">
                                    <img width="56px" height="56px" style="border-radius: 5px;object-fit: cover ;"
                                        src="assets/img/datphong/anhnguoidung2.jpg" alt="">
                                </div>
                                <div class="imgusers-box-left-img-item">
                                    <img width="56px" height="56px" style="border-radius: 5px;object-fit: cover ;"
                                        src="assets/img/datphong/anhnguoidung3.jpg" alt="">
                                </div>
                                <div class="imgusers-box-left-img-item">
                                    <img width="56px" height="56px" style="border-radius: 5px;object-fit: cover ;"
                                        src="assets/img/datphong/anhnguoidung4.jpg" alt="">
                                </div>
                                <div class="imgusers-box-left-img-item">
                                    <img width="56px" height="56px" style="border-radius: 5px;object-fit: cover ;"
                                        src="assets/img/datphong/anhnguoidung5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="imgusers-box-right">
                            <div class="imgusers-box-right-box">
                                <ul class="imgusers-box-right-box-ul">
                                    <li class="imgusers-box-right-box-li">Mới nhất</li>
                                    <li class="imgusers-box-right-box-li">Cũ nhất</li>
                                    <li class="imgusers-box-right-box-li">Điểm cao nhất</li>
                                    <li class="imgusers-box-right-box-li">Điểm thấp nhất</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            <div class="userswrite">
                <div class="userswrite-boxone">
                    <div class="userswrite-boxone-imgusers">
                        <div class="userswrite-boxone-imgusers-element">
                            <span>N</span>
                        </div>
                    </div>
                    <div class="userswrite-boxone-infousers">
                        <div class="userswrite-boxone-infousers-box">
                            <div class="userswrite-boxone-infousers-title">
                                <span>Khả Nhân</span>
                            </div>
                            <div class="userswrite-boxone-infousers-item">

                                <span class="userswrite-boxone-infousers-item-text">30/05/2003</span>
                            </div>
                            <!-- <div class="userswrite-boxone-infousers-item">
                                    <i class="fa-solid fa-bed"></i>
                                    <span class="userswrite-boxone-infousers-item-text">Melia Guest Room</span>
                                </div>
                                <div class="userswrite-boxone-infousers-item">
                                    <i class="fa-solid fa-calendar"></i>
                                    <span class="userswrite-boxone-infousers-item-text">1 đêm - Tháng 04/2022</span>
                                </div>
                                <div class="userswrite-boxone-infousers-item">
                                    <i class="fa-solid fa-briefcase"></i>
                                    <span class="userswrite-boxone-infousers-item-text">Cặp đôi</span>
                                </div> -->
                        </div>
                    </div>
                </div>
                <div class="userswrite-boxtwo">
                    <div class="userswrite-boxtwo-title">
                        <span>Kỳ nghỉ Hè hoàn hảo</span>
                    </div>
                    <div class="userswrite-boxtwo-content">
                        <span>Khu nghỉ mát tuyệt vời với dịch vụ trên cả tuyệt vời. Nhân viên rất chu đáo và lễ phép.</span>
                    </div>

                </div>
                <!-- <div class="userswrite-boxthree">
                        <div class="userswrite-boxthree-content">
                            <div class="userswrite-boxthree-content-number">
                                <span>10.0</span>
                            </div>
                            <div class="userswrite-boxthree-content-text">
                                <span>Tuyệt vời</span>
                            </div>
                        </div>
                    </div> -->
            </div> --}}

            <!-- <a href="" class="seemore">
                    <div class="seemore-btn">
                        <span>Xem thêm đánh giá</span>
                    </div>
                </a> -->
        </div>

        <div class="seeMore-Userwrite d-flex justify-content-center mb-2">
            <a class="stopPoint" href="#focusComment"  style="display: none;"></a>
            <p class="content-seeMore-Userwrite"><b><u><i class="showMoreShowLess">Xem thêm</i></u> >></b></p>
        </div>

        {{-- <div class="comment">
            <h5>Viết bình luận sản phẩm</h5>
            <div class="title-comment">
                <input type="text" id="title" placeholder="Tiêu đề...">
            </div>

            <div class="content-comment">
                <textarea name="" id="content" placeholder="Nội dung"></textarea>
            </div>
            <div class="btn-comment">
                <button class="post">Post</button>
            </div>
        </div> --}}

    </div>

    <!-- <div class="contenttrending">
            <div class="contentboxTrending">
                <div class="tredingtop-content">
                    <div class="tredingtop-left">
                        <div class="tredingtop-left-texttitle">
                            <span class="tredingtop-left-texttitle">Sản Phẩm Cùng Danh Mục</span>
                        </div>
                        <div class="tredingtop-left-text">
                            <span class="tredingtop-left-text">Sản phẩm cùng danh mục và tầm giá do Thế Giới Hải Sản đề
                                xuất</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="trendinghotel-slider-box">
                <div class="trendinghotel trendinghotel-js owl-carousel owl-theme">


                    <a href="thongtinkhachsan.html">
                        <div class="trendinghotel_boxcontent item">
                            <div class="trendinghotel_boxcontent_img_text">
                                <div class="trendinghotel_img_1">
                                    <div class="trending_img_box_top">
                                        <div class="trending_sale">
                                            <span class="trending_sale_text">-20%</span>
                                        </div>
                                        <div class="trending_love">
                                            <i class="fa-solid fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="trending_img_box_bottom">
                                        <div class="trending_img_box_bottom_evaluate">
                                            <span class="trending_img_box_bottom_evaluate_text">Ưu Đãi Nhất</span>
                                        </div>
                                        <div class="trending_img_box_bottom_img">
                                            <img height="54px" width="42px" style="object-fit: cover;"
                                                src="assets/img/khachsan/trending/icon_tag_travellers_2021.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="trendinghotel_text">
                                    <div class="trendinghotel_text-title">
                                        Khách Sạn Đà Nẵng
                                    </div>
                                    <div class="trendinghotel_text-star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="trendinghotel_place">
                                        <div>
                                            <i class="fa-solid fa-location-dot"></i>
                                            Quận hải châu
                                        </div>
                                    </div>
                                    <div class="trendinghotel_text-evaluate">
                                        <div class="trendinghotel_text-evaluate-icon">
                                            <i class="fa-solid fa-umbrella"></i>9.0
                                        </div>
                                        <div class="trendinghotel_text-evaluate-text">
                                            Tuyệt vời <span style=" color:#4a5568;">(573 đánh giá)</span>
                                        </div>
                                    </div>
                                    <div class="trendinghotel_text-time">
                                        Vừa đặt cách đây vài ngày trước
                                    </div>
                                    <div class="trendinghotel_text-box-price">
                                        <div class="trendinghotel_text-box-price-one">
                                            <span>1.047.000đ</span>
                                        </div>
                                        <div class="trendinghotel_text-box-price-two">
                                            <span>1.047.000đ</span>
                                        </div>
                                        <div class="trendinghotel_text-box-price-three">
                                            <div class="trendinghotel_text-box-price-three-l">
                                                <div class="trendinghotel_text-box-price-three-l-1"><span>Mã : </span></div>
                                                <div class="trendinghotel_text-box-price-three-l-2"><span>NHAN21IT3</span>
                                                </div>
                                                <div class="trendinghotel_text-box-price-three-l-3">-5%</div>
                                            </div>
                                            <div class="trendinghotel_text-box-price-three-r">
                                                <span>954.177đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div> -->
    <div class="recentlyviewed">
        <div class="recentlyviewed_box">
            <div class="recentlyviewed_title">
                <span class="recentlyviewed_title">Sản phẩm cùng danh mục</span>
            </div>

            <div class="recentlyviewed_boxcontent-boxslider">
                <div class="recentlyviewed_boxcontent owl-carousel owl-theme">

                    {{-- flashsale_product --}}
                  

                    @foreach ($product_category as $product_cate)
                    <div class="flashsalehotel_boxcontent item">
                        <div class="flashsalehotel_boxcontent_img_text">
                            <div class="flashsalehotel_img-box">
                                <a href="{{ url('/san-pham/san-pham-chi-tiet?product_id=' . $product_cate->product_id . '') }}" class="flashsalehotel_boxcontent_hover">
                                    <img class="flashsalehotel_img" width="284px" height="160px"
                                    style="object-fit: cover;"
                                    src="{{ asset('public/fontend/assets/img/product/' . $product_cate->product_image) }}"
                                    alt="">
                                </a>
                                        <!-- <span class="new">New</span> -->
                                    </div>
                                    <div class="flashsalehotel_text">
                                        <div class="flashsalehotel_text-title">
                                            {{ $product_cate->product_name }}
                                        </div>
                                        <div class="flashsalehotel_place">
                                            <div>
                                                <i class="fa-solid fa-certificate"></i>
                                                {{ $product_cate->category->category_name }}
                                            </div>
                                        </div>
                                        <!-- <div class="flashsalehotel_text-evaluate">
                                          <div class="flashsalehotel_text-evaluate-icon">
                                              <i class="fa-solid fa-star"></i>8.5
                                          </div>
                                          <div class="flashsalehotel_text-evaluate-text">
                                              Tuyệt vời <span style=" color:#4a5568;">(425 đánh giá)</span>
                                          </div>
                                      </div> -->
                                        <div class="flashsalehotel_text-time">
                                        @if ($product_cate->flashsale_status == 1)
                                            Giảm giá
                                            @else 
                                            Sản phẩm cùng danh mục
                                            @endif
                                        </div>
                                        <div class="flashsalehotel_text-box-price">
                                            @if ($product_cate->flashsale_status == 1)
                                                <div style="display: flex;">
                                                <div class="flashsalehotel_text-box-price-two">
                                                
                                                    <span>{{ number_format($product_cate->flashsale->flashsale_price_sale, 0, ',', '.') }}đ</span>
                                                </div>
                                                <div class="flashsalehotel_text-box-price-one">
                                                    <span>/</span>
                                                </div>
                                                <div class="flashsalehotel_text-box-price-one">
                                                    <span
                                                        style="text-decoration: line-through">{{ number_format($product_cate->product_price, 0, ',', '.') }}đ</span>
                                                </div>
                                            </div>
                                            @else
                                            <div class="flashsalehotel_text-box-price-two">
                                                <span>
                                                    {{ number_format($product_cate->product_price, 0, ',', '.') }}đ</span>
                                            </div>
                                            @endif
                                            <div class="flashsalehotel_text-box-price-three bordernhay">
                                                <div style="margin-left: 8px;"
                                                    class="flashsalehotel_text-box-price-three-l chunhay">
                                                    <div class="cart-hover">
                                                        <i class="fa-solid fa-heart"></i>
                                                        <span style="font-size: 14px;">Yêu Thích</span>
                                                    </div>
                                                </div>
                                                <div class="flashsalehotel_text-box-price-three-r chunhay">
                                                    <div class="cart-hover">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                        <span style="font-size: 14px;">Đặt Hàng</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>

    <?php
    $recentlyviewed = session()->get('recentlyviewed');
    ?>
    @if ($recentlyviewed != null)
        <div class="recentlyviewed">
            <div class="recentlyviewed_box">
                <div class="recentlyviewed_title">
                    <span class="recentlyviewed_title">Xem Gần Đây</span>
                </div>

                <div class="recentlyviewed_boxcontent-boxslider">
                    <div class="recentlyviewed_boxcontent owl-carousel owl-theme">

                        @foreach ($recentlyviewed as $key => $product)
                            <a href="{{ url('/san-pham/san-pham-chi-tiet?product_id=' . $product['product_id'] . '') }}"
                                class="flashsalehotel_boxcontent_hover">
                                <div class="flashsalehotel_boxcontent item">
                                    <div class="flashsalehotel_boxcontent_img_text">
                                        <div class="flashsalehotel_img-box">
                                            <img class="flashsalehotel_img" width="284px" height="160px"
                                                style="object-fit: cover;"
                                                src="{{ url('public/fontend/assets/img/product/' . $product['product_image'] . '') }}"
                                                alt="">

                                        </div>
                                        <div class="flashsalehotel_text">
                                            <div class="flashsalehotel_text-title">
                                                {{ $product['product_name'] }}
                                            </div>


                                            <div class="flashsalehotel_text-time">
                                                <i class="fa-solid fa-certificate"></i> {{ $product['category_name'] }}
                                            </div>
                                            <div class="flashsalehotel_place">
                                                {{-- <div>
                                      <i class="fa-solid fa-certificate"></i>
                                      Danh Mục Sản Phẩm
                                  </div> --}}
                                            </div>
                                            {{-- <div class="flashsalehotel_text-box-price"> --}}
                                            {{-- <div class="flashsalehotel_text-box-price-two">
                                      <span>874.070đ</span>
                                  </div>
                                  <div class="flashsalehotel_text-box-price-three bordernhay">
                                      <div style="margin-left: 8px;"
                                          class="flashsalehotel_text-box-price-three-l chunhay">
                                          <div class="cart-hover">
                                              <i class="fa-solid fa-heart"></i>
                                              <span style="font-size: 14px;">Yêu Thích</span>
                                          </div>
                                      </div>
                                      <div class="flashsalehotel_text-box-price-three-r chunhay">
                                          <div class="cart-hover">
                                              <i class="fa-solid fa-cart-shopping"></i>
                                              <span style="font-size: 14px;">Đặt Hàng</span>
                                          </div>
                                      </div>
                                  </div> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="{{ asset('public/fontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/fontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('public/fontend/assets/js/lightslider.js') }}"></script>
    <script src="{{ asset('public/fontend/assets/js/thongtinkhachsan.js') }}"></script>
    <script src="{{ asset('public/fontend/assets/js/commentProduct.js') }}"></script>


    <script>
        $('.product-size').on('click', '.size-main', function() {
            $(this).addClass('active').siblings().removeClass('active');
        })

        $('.quantity-item').on('click', '.plus', function() {
            var quantity = $('#quantity').text();
            quantity++;
            $('#quantity').html(quantity)
        })

        $('.quantity-item').on('click', '.minus', function() {
            var quantity = $('#quantity').text();
            quantity--;
            if (quantity == 0) {
                quantity = 1;
            }
            $('#quantity').html(quantity)
        })
    </script>


    <script>
        // Edit giá ở mục chi tiết
        $('.product-size-box').on('click', "input[name='size']", function(){
            var product_type_id = $(this).val();
            var product_id = $('#product_id').val();
            // alert(product_id + " " + product_type_id);
            // var quantity = $('.')
            $.ajax({
                url: '{{ url('/san-pham/edit-price') }}',
                method: 'get',
                data: {
                   
                    product_id: product_id,
                    product_type_id: product_type_id,
                    // product_type: product_type
                },
                success: function(data) {
                    // load_cart();
                    // $('#shopping').hide();
                    // $('.button_cart').attr('data-dismiss', 'modal');
                    $('.product-price').html(data);
                },
                error: function() {
                    alert("Bug Huhu :<<");
                }
            })
        })

        // Thêm sản phẩm vào giỏ ở mục chi tiết
        $('.card-product').on('click', '.btn-add-cart', function(){
            var product_id = $('#product_id').val();
            // alert(product_id);
            var product_type = $("input[name='size']:checked").val();
            var product_qty = $('#quantity').text();
            // alert(product_type +" " +quantity)
        if($("input[name='size']").is(':checked') == false){
           
            message_toastr('warning', 'Bạn chưa chọn size đồ uống !!');
         
        }else{
            
            $.ajax({
                url: '{{ url('/gio-hang/save-cart') }}',
                method: 'get',
                data: {
                   
                    product_id: product_id,
                    product_qty: product_qty,
                    product_type: product_type
                },
                success: function(data) {
                    // load_cart();
                    // $('#shopping').hide();
                    // $('.button_cart').attr('data-dismiss', 'modal');
                    // load_quantity_cart();
                    load_quantity_cart();
                        message_toastr("success",
                            'Bạn đã thêm sản phẩm vào giỏ hàng!!!',
                            'Thành công');
                },
                error: function() {
                    alert("Bug Huhu :<<");
                }
            })

        }
        })
    </script>

<script>
    postCommentProduct('{{ session()->get('customer_id') }}');
    reloadListTop5CommentProduct();
    seeMoreCommentProduct();
</script>


@endsection
