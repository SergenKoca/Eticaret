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
<!-- Page Preloder -->

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
                        <input type="text" placeholder="Divisimada Ara...">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="user-panel">
                        <div class="up-item">
                            <i class="profile_img"></i>
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
                            @auth
                                <div class="up-item">
                                    &emsp;
                                    <div class="shopping-card">
                                        <div class="shopping-card">
                                            <i class="flaticon-bag"></i>
                                            <span>{{$basketProductCount}}</span>
                                        </div>

                                        <a href="{{route('name_front.get.basket')}}">Sepetim</a>
                                    </div>

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


<!-- Category section -->
<section class="category-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="filter-widget">
                    <h2 class="fw-title">Seçilen Özellikler</h2>
                    <ul class="category-menu">
                        <form  data-toggle="validator" data-disable="false" role="form" method="post" action="{{route('productController.getFilterProduct',['main_category_id'=>$mainCategoryId,
                        'sub_category_1_id'=>$sub1CategoryId,'sub_category_2_id'=>$sub2CategoryId])}}">
                            {{csrf_field()}}
                            <?php
                                $latest = 0;
                                $b=false;
                            ?>
                            @foreach($mainProperties as $keyMain => $ozellik)
                                <li><h3 > <a href="#">{{$ozellik->title}}</a></h3></li>
                                @foreach($subProperties as $key => $sub)
                                    @for($i=0;$i<count($subSelectedProperties);$i++)
                                        @if($sub->id==$subSelectedProperties[$i])
                                                @if($sub->main_property_id == $ozellik->id)
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <div class="checkbox checkbox-success">
                                                                <?php
                                                                    $latest =$sub->id;
                                                                    $b=true;
                                                                ?>
                                                                <input name="sub_id[]" checked="true" value="{{$sub->id}}" type="checkbox"> <small>{{$sub->title}}</small>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endif
                                        @endif

                                        @endfor
                                        @if($sub->main_property_id == $ozellik->id)
                                            @if($key!=0 && $subProperties[$key-1]->id!=$sub->id && $latest!=$sub->id)
                                                <ul class="sub-menu">
                                                    <li>
                                                        <div class="checkbox checkbox-success">
                                                            <input  name="sub_id[]" value="{{$sub->id}}" type="checkbox"> <small>{{$sub->title}}</small>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @elseif($keyMain == 0 && $key==0 && $b==false)
                                                <ul class="sub-menu">
                                                    <li>
                                                        <div class="checkbox checkbox-success">
                                                            <input  name="sub_id[]" value="{{$sub->id}}" type="checkbox"> <small>{{$sub->title}}</small>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                @endforeach
                            @endforeach
                            <br>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-dark">Filtrele</button>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <!-- <button type="submit" class="btn btn-dark">Filtrele</button>-->
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>

            </div>

            <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row">
                    @foreach($filterProducts as $key=> $filterProduct)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{asset('images/news/' . \App\Models\Product\Productv2::find($filterProduct->id)->img_url)}}" alt="">
                                    <div class="pi-links">
                                        @if($productPrice[$key]!="-")
                                        <a href="{{route('name.front.productDetail.index',['id'=>$filterProduct->id,'price'=>$productPrice[$key],'main_category_id'=>$mainCategoryId,
                                'sub_category_1_id'=>$sub1CategoryId,'sub_category_2_id'=>$sub2CategoryId])}}" class="add-card"><i class="flaticon-bag"></i><span>ÜRÜNÜ İNCELE</span></a>
                                        @endif
                                            <a  onclick="addFavoriteClick(this.id)" id="{{$filterProduct->id}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6>{{$productPrice[$key]}} {{'₺'}}</h6>
                                    <a href="{{route('name.front.productDetail.index',['id'=>$filterProduct->id,'price'=>$productPrice[$key],'main_category_id'=>$mainCategoryId,
                                'sub_category_1_id'=>$sub1CategoryId,'sub_category_2_id'=>$sub2CategoryId])}}">{{$filterProduct->title}}</a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    <div class="text-center w-100 pt-3">
                        <button class="site-btn sb-line sb-dark">LOAD MORE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category section end -->
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
            success: function (result) {
            }
        });

    }
</script>

<!-- Footer section -->
<section class="footer-section">
    <div class="container">
        <div class="footer-logo text-center">
            <a href="index.html"><img src="{{asset('design_front/img/logo-light.png')}}" alt=""></a>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-widget about-widget">
                    <h2>About</h2>
                    <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                    <img src="{{asset('design_front/img/cards.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-3">
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
            <div class="col-lg-3">
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
            <div class="col-lg-3">
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
        </div>
    </div>
</section>
<!-- Footer section end -->



<!-- Footer section -->
<section class="footer-section">
    <div class="container">
        <div class="footer-logo text-center">
            <a href="home.html"><img src="{{asset('design_front/img/logo-light.png')}}" alt=""></a>
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
