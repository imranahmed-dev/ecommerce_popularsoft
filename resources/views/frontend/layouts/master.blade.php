<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | Laravel Ecommerce</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('frontend')}}/images/icons/favicon.png" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/MagnificPopup/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/dashboard')}}/css/dashboard.css">

    <!-- Toastr -->
    <link href="{{asset('defaults/toastr/toastr.min.css')}}" rel="stylesheet" />
    
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v4">
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        <div class="left-top-bar">
                            <font size="3px" color="#fff">
                                01928511049 &nbsp;&nbsp;&nbsp;
                                asadullahkpi@gmail.com
                            </font>
                        </div>
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <ul class="social">
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="{{url('/')}}" class="logo">
                        <img src="{{asset('frontend')}}/images/logo/logo.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="{{url('/')}}">HOME</a>
                            </li>
                            <li class="active-menu">
                                <a href="#">SHOPS</a>
                                <ul class="sub-menu">
                                    <li><a href="">Products</a></li>
                                    <li><a href="">Cart</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">ABOUT US</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">CONTACT US</a>
                            </li>

                            <li><a href="{{route('user.login')}}">LOGIN</a></li>
                            <li><a href="{{route('user.register')}}">REGISTER</a></li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{Cart::count()}}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{url('/')}}"><img src="{{asset('frontend')}}/images/logo/logo.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        <font size="3px" color="#fff">
                            01928511049 &nbsp;&nbsp;&nbsp;
                            asadullahkpi@gmail.com
                        </font>
                    </div>
                </li>

                <li>
                    <div class="right-top-bar flex-w h-full">
                        <ul class="social">
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>
                    <a href="">SHOPS</a>
                    <ul class="sub-menu-m">
                        <li><a href="">Products</a></li>
                        <li><a href="{{route('cart')}}">Cart</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                <li>
                    <a href="">ABOUT US</a>
                </li>
                <li>
                    <a href="{{route('contact')}}">CONTACT US</a>
                </li>
                <li><a href="{{route('user.login')}}">LOGIN</a></li>
                <li><a href="{{route('user.register')}}">REGISTER</a></li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{asset('frontend')}}/images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                @foreach(Cart::content() as $cartproduct)
                <a href="{{route('cart.destroy',$cartproduct->rowId)}}" style="color: #000; margin-right: 8px; margin-top: 15px; display: inline-block;"><i class="fa fa-times"></i></a>
                    <li class="header-cart-item flex-w flex-t m-b-12">
                    
                        <div class="header-cart-item-img">
                            <img src="{{asset($cartproduct->options->image)}}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            {{($cartproduct->name)}}
                            </a>

                            <span class="header-cart-item-info">
                            {{($cartproduct->qty)}} X Tk {{($cartproduct->price)}}
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: Tk {{Cart::subtotal()}}
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{route('cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="{{route('cart.checkout')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')
    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Contact Us
                    </h4>
                    <p class="stext-107 cl7 hov-cl1 trans-04" style="font-size: 15px;">
                        Address: Notun bazar,Gulshan-Dhaka, &nbsp; Cell: 01928511049 , &nbsp; Email: asadullahkpi@gmail.com
                    </p>
                </div>

                <div class="col-sm-6 col-lg-6 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Follow Us
                    </h4>

                    <ul class="social">
                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="p-t-40">
                <p class="stext-107 cl6 txt-center">
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> @FF. Designed & Developed By Popularsoft
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <script src="{{asset('frontend')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/animsition/js/animsition.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/bootstrap/js/popper.js"></script>
    <script src="{{asset('frontend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <script src="{{asset('frontend')}}/vendor/daterangepicker/moment.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="{{asset('frontend')}}/vendor/slick/slick.min.js"></script>
    <script src="{{asset('frontend')}}/js/slick-custom.js"></script>
    <script src="{{asset('frontend')}}/vendor/parallax100/parallax100.js"></script>

    <!-- Sweetalert -->
    <script src="{{asset('defaults/sweetalert/sweetalert2@9.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('defaults/toastr/toastr.min.js')}}"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}"

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>

    <script>
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Data has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>

    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="{{asset('frontend')}}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <script src="{{asset('frontend')}}/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
    <script src="{{asset('frontend')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <script src="{{asset('frontend')}}/js/main.js"></script>

</body>

</html>