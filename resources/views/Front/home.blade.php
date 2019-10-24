<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Divisima | eCommerce Template</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{asset('design_front/img/favicon.ico')}}" rel="shortcut icon"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('design_front/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('design_front/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('design_front/css/flaticon.css')}}"/>
    <link rel="stylesheet" href="{{asset('design_front/css/slicknav.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('design_front/css/jquery-ui.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('design_front/css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('design_front/css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('design_front/css/style.css')}}"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>
<body>
<!-- Page Preloder
<div id="preloder">
    <div class="loader"></div>
</div>-->

<!-- Header section -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a href="{{route('name_front.home')}}" class="site-logo">
                        <img src="{{asset('design_front/img/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <form class="header-search-form">
                        <input type="text" placeholder="Divisimada ara...">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="user-panel">
                        <div class="up-item">
                            @guest
                                <a href="{{route('login')}}">Giriş Yap</a> | <a href="{{route('register')}}">Kayıt Ol</a>
                                @endguest
                        </div>
                        @auth
                            <div class="up-item">
                                <i class="flaticon-profile"></i>
                                <a href="{{route('name_front.favoriteController.index')}}">{{auth()->user()->name}}</a> | <a href="{{route('logout')}}">Çıkış Yap</a>
                            </div>

                        @endauth

                        <div class="up-item">
                            &emsp; @auth
                            <div class="shopping-card">
                                <div class="shopping-card">
                                    <i class="flaticon-bag"></i>
                                    <span>{{$basketProductCount}}</span>
                                </div>

                                <a href="{{route('name_front.get.basket')}}">Sepetim</a>
                                    @endauth
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <!-- menu -->
            <ul class="main-menu">
                <li><a href="{{route('name_front.home')}}">Ana Sayfa</a></li>

                @foreach($mainCategories as  $mainCategory)
                    <li><a href="#">{{$mainCategory->title}}</a>
                        @if(count($mainCategory->subMenu1))
                            <ul class="sub-menu">
                                @foreach($mainCategory->subMenu1 as $sub1)
                                <li><a href="#">{{$sub1->title}}</a>
                                    @if(count($sub1->sub2))
                                        <ul class="nav_menu">
                                            @foreach($sub1->sub2 as $sub2)
                                                <li><a href="{{route('name_front.specificProduct',['main_id'=>$mainCategory->id,'sub1_category_id'=>$sub1->id,'sub2_category_id'=>$sub2->id])}}"><small>{{$sub2->title}}</small></a>
                                                @endforeach
                                        </ul>
                                        @endif
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    <li>
                @endforeach

                <!-- <li><a href="#">Men</a></li>
                <li><a href="#">Jewelry
                        <span class="new">New</span>
                    </a></li>
                <li><a href="#">Shoes</a>
                    <ul class="sub-menu">
                        <li><a href="#">Sneakers</a></li>
                        <li><a href="#">Sandals</a></li>
                        <li><a href="#">Formal Shoes</a></li>
                        <li><a href="#">Boots</a></li>
                        <li><a href="#">Flip Flops</a></li>
                    </ul>
                </li>
                <li><a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="./product.html">Product Page</a></li>
                        <li><a href="./category.html">Category Page</a></li>
                        <li><a href="./cart.html">Cart Page</a></li>
                        <li><a href="./checkout.html">Checkout Page</a></li>
                        <li><a href="./contact.html">Contact Page</a></li>
                    </ul>
                </li>
                <li><a href="#">Blog</a></li>-->
            </ul>
        </div>
    </nav>
</header>
<!-- Header section end -->



<!-- Hero section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="{{asset('design_front/img/bg.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>New Arrivals</span>
                        <h2>denim jackets</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        <!--<a href="#" class="site-btn sb-line">DISCOVER</a>
                        <a href="#" class="site-btn sb-white">ADD TO CART</a>-->
                    </div>
                </div>
                <div class="offer-card text-white">
                    <span>from</span>
                    <h2>$29</h2>
                    <p>SHOP NOW</p>
                </div>
            </div>
        </div>
        <div class="hs-item set-bg" data-setbg="{{asset('design_front/img/bg-2.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>New Arrivals</span>
                        <h2>denim jackets</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>

                    </div>
                </div>
                <div class="offer-card text-white">
                    <span>from</span>
                    <h2>$29</h2>
                    <p>SHOP NOW</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="slide-num-holder" id="snh-1"></div>
    </div>
</section>
<!-- Hero section end -->



<!-- Features section -->
<section class="features-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="{{asset('design_front/img/icons/1.png')}}" alt="#">
                    </div>
                    <h2>HIZLI GÜVENLİ ÖDEME</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="{{asset('design_front/img/icons/2.png')}}" alt="#">
                    </div>
                    <h2>Premium ÜRÜNLER</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="{{asset('design_front/img/icons/3.png')}}" alt="#">
                    </div>
                    <h2>ÜCRETSİZ & HIZLI TESLİM</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features section end -->


<!-- letest product section -->
@auth
<section class="top-letest-product-section">
    <div class="container">
        <div class="section-title">
            <h2>Son Baktığınız Ürünler</h2>
        </div>
        <div class="product-slider owl-carousel">
            @for($i=0;$i<count($latestProducts);$i++)
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{asset('images/news/' . \App\Models\Product\Productv2::find($latestProducts[$i]->id)->img_url)}}" alt="">
                    <div class="pi-links">
                        <a href="{{route('name.front.productDetail.productDetail',['id'=>$latestProducts[$i]->id,'price'=>$productPrices[$i]])}}" class="add-card"><i class="flaticon-bag"></i><span>ÜRÜNÜ İNCELE</span></a>
                            <a  onclick="addFavoriteClick(this.id)" id="{{$latestProducts[$i]->id}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="pi-text">
                    <h6>{{$productPrices[$i]}} {{'₺'}}</h6>
                    <a href="{{route('name.front.productDetail.index',['id'=>$latestProducts[$i]->id,'price'=>$productPrices[$i]])}}"><p>{{$latestProducts[$i]->title}} </p></a>
                </div>
            </div>
                @endfor
        </div>
    </div>
</section>
@endauth
<!-- letest product section end -->



<!-- Product filter section -->
<section class="product-filter-section">
    <div class="container">
        <div class="section-title">
            <h2>Çok Satılan Ürünler</h2>
        </div>
        <!--<ul class="product-filter-menu">
            <li><a href="#">TOPS</a></li>
            <li><a href="#">JUMPSUITS</a></li>
            <li><a href="#">LINGERIE</a></li>
            <li><a href="#">JEANS</a></li>
            <li><a href="#">DRESSES</a></li>
            <li><a href="#">COATS</a></li>
            <li><a href="#">JUMPERS</a></li>
            <li><a href="#">LEGGINGS</a></li>
        </ul>-->
        <div class="row">
            @foreach($topSellingProducts as $key=> $item)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{asset('images/news/' . \App\Models\Product\Productv2::find($item->id)->img_url)}}" alt="">
                        <div class="pi-links">
                            <a href="{{route('name.front.productDetail.productDetail',['id'=>$item->id,'price'=>$topSellingProductsPrices[$key]->price])}}" class="add-card"><i class="flaticon-bag"></i><span>ÜRÜNÜ İNCELE</span></a>
                            <a  onclick="addFavoriteClick(this.id)" id="{{$item->id}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>{{$topSellingProductsPrices[$key]->price}} {{'₺'}}</h6>
                        <p>{{$item->title}} </p>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</section>
<!-- Product filter section end -->


<!-- Banner section -->
<section class="banner-section">
    <div class="container">
        <div class="banner set-bg" data-setbg="{{asset('design_front/img/banner-bg.jpg')}}">
            <div class="tag-new">NEW</div>
            <span>New Arrivals</span>
            <h2>STRIPED SHIRTS</h2>
            <a href="#" class="site-btn">SHOP NOW</a>
        </div>
    </div>
</section>
<!-- Banner section end  -->


<!-- Footer section -->
<section class="footer-section">
    <div class="container">
        <div class="footer-logo text-center">
            <a href="index.html"><img src="{{asset('design_front/img/logo-light.png')}}" alt=""></a>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget about-widget">
                    <h2>About</h2>
                    <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                    <img src="{{asset('design_front/img/cards.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget about-widget">
                    <h2>Questions</h2>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Track Orders</a></li>
                        <li><a href="">Returns</a></li>
                        <li><a href="">Jobs</a></li>
                        <li><a href="">Shipping</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                    <ul>
                        <li><a href="">Partners</a></li>
                        <li><a href="">Bloggers</a></li>
                        <li><a href="">Support</a></li>
                        <li><a href="">Terms of Use</a></li>
                        <li><a href="">Press</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget about-widget">
                    <h2>Questions</h2>
                    <div class="fw-latest-post-widget">
                        <div class="lp-item">
                            <div class="lp-thumb set-bg" data-setbg="{{asset('design_front/img/blog-thumbs/1.jpg')}}"></div>
                            <div class="lp-content">
                                <h6>what shoes to wear</h6>
                                <span>Oct 21, 2018</span>
                                <a href="#" class="readmore">Read More</a>
                            </div>
                        </div>
                        <div class="lp-item">
                            <div class="lp-thumb set-bg" data-setbg="{{asset('design_front/img/blog-thumbs/2.jpg')}}"></div>
                            <div class="lp-content">
                                <h6>trends this year</h6>
                                <span>Oct 21, 2018</span>
                                <a href="#" class="readmore">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget contact-widget">
                    <h2>Questions</h2>
                    <div class="con-info">
                        <span>C.</span>
                        <p>Your Company Ltd </p>
                    </div>
                    <div class="con-info">
                        <span>B.</span>
                        <p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
                    </div>
                    <div class="con-info">
                        <span>T.</span>
                        <p>+53 345 7953 32453</p>
                    </div>
                    <div class="con-info">
                        <span>E.</span>
                        <p>office@youremail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social-links-warp">
        <div class="container">
            <div class="social-links">
                <a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
                <a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
                <a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
                <a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
                <a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
                <a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
                <a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
            </div>

            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

        </div>
    </div>
</section>
<!-- Footer section end -->

<!--====== Javascripts & Jquery ======-->
<script src="{{asset('design_front/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('design_front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('design_front/js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('design_front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('design_front/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('design_front/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('design_front/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('design_front/js/main.js')}}"></script>

    <script>
        function addFavoriteClick(clicked_id){
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    url:  "{{route('name_front.favoriteController.create')}}",
                    type: 'post',
                    data: {
                        product_id: clicked_id
                    },

                });

        }

    </script>

@yield('scripts')
</body>
</html>
