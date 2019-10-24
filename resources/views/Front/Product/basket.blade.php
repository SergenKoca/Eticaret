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
                        <input type="text" placeholder="Search on divisima ....">
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
            </ul>
        </div>
    </nav>
</header>
<!-- Header section end -->


<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Sepetiniz</h4>
        <div class="site-pagination">
            <a href="">Ana Sayfa</a> /
            <a href="">Sepet</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- cart section end -->
<section class="cart-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table">
                    <h3>Sepetiniz</h3>
                    <div class="cart-table-warp">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-th">Ürün</th>
                                <th class="total-th">Fiyat</th>
                            </tr>
                            </thead>
                            <tbody>

                            @for($i=0;$i<count($products);$i++)
                            <tr>
                                <td class="product-col">
                                    <img src="{{asset('images/news/' . \App\Models\Product\Productv2::find($products[$i]->id)->img_url)}}" alt="">
                                    <div class="pc-title">
                                        <h4 >{{$products[$i]->title}}</h4>
                                    </div>
                                </td>

                                <td class="total-col"><h4 id="id_price">{{$pricies[$i]->price}} {{'₺'}}</h4></td>
                                <td class="quy-col">
                                    <div class="quantity">
                                        <a href="{{route('name.delete.product.at.basket',['basket_id'=>$basketDatas[$i]->id])}}" class="btn btn-danger btn-xs"> Sil </a>
                                    </div>
                                </td>
                            @for($j=0;$j<count($specicifProperties[$i]);$j++)
                                <tr>
                                    <th class="product-th">{{$mainProperties[$i][$j]->title}}</th>
                                    <th class="product-th"><b>{{$subProperties[$i][$j]->title}}</b></th>
                                </tr>
                                @endfor
                            </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="total-cost">
                            <h6>Total <span>{{$total}} {{'₺'}}</span></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 card-right">
                <a href="{{route('name.front.BuyProduct.confirmBasket',['mainProperties'=>$mainProperties])}}" class="site-btn">Sepeti Onayla</a>
                <a href="{{route('name_front.home')}}" class="site-btn sb-dark">Alışverişe Devam Et</a>
            </div>
        </div>
    </div>
</section>
<!-- cart section end -->

<!-- Continue Shoping -->
<!--<section class="related-product-section">
    <div class="container">
        <div class="section-title text-uppercase">
            <h2>Continue Shopping</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <div class="tag-new">New</div>
                        <img src="{{asset('design_front/img/product/2.jpg')}}" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>$35,00</h6>
                        <p>Black and White Stripes Dress</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{asset('design_front/img/product/5.jpg')}}" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>$35,00</h6>
                        <p>Flamboyant Pink Top </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{asset('design_front/img/product/9.jpg')}}" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>$35,00</h6>
                        <p>Flamboyant Pink Top </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{asset('design_front/img/product/1.jpg')}}" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>$35,00</h6>
                        <p>Flamboyant Pink Top </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->



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

</body>
</html>
