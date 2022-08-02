<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo-6/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Sep 2019 03:39:38 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>eCommerce</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="ecommerce" />
    <meta name="description" content="eCommerce">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="{{ asset('porto-ecommerce/assets/images/icons/favicon.ico') }}"> -->

    <!-- Plugins CSS File -->
    <!-- <link rel="stylesheet" href="{{ asset('porto-ecommerce/assets/css/bootstrap.min.css') }}"> -->

    <!-- Main CSS File -->
    <!-- <link rel="stylesheet" href="{{ asset('porto-ecommerce/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('porto-ecommerce/assets/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('porto-ecommerce/assets/css/rating.css') }}"> -->

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('porto-ecommerce/assets/font-awesome/css/fontawesome-all.min.css') }}">


    @if (file_exists(public_path('theme/custom_styles_ecommerce.css')))
    <link rel="stylesheet" href="{{ asset('theme/custom_styles_ecommerce.css') }}" />
    @endif

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.19.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

</head>
<style>


</style>

<body>


    <div class="navbar bg-base-100 shadow-lg">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Homepage</a></li>
                    <li><a>Portfolio</a></li>
                    <li><a>About</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost normal-case text-xl">daisyUI</a>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <button class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
        </div>
    </div>

    <section class="container mx-auto grid grid-cols-12 gap-4 mt-3">
        <div class="col-span-12 md:col-span-2 shadow-lg">
            <ul class="menu bg-base-100 p-2 rounded-box w-full">
                <li>
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Item 2
                    </a>
                </li>
                <li>
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Item 1
                    </a>
                </li>
                <li>
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Item 3
                    </a>
                </li>
            </ul>

        </div>
        <div class="col-span-12 md:col-span-10">
            <div class="carousel w-full">
                <div id="item1" class="carousel-item w-full">
                    <img src="https://placeimg.com/800/200/arch" class="w-full" />
                </div>
                <div id="item2" class="carousel-item w-full">
                    <img src="https://placeimg.com/800/200/arch" class="w-full" />
                </div>
                <div id="item3" class="carousel-item w-full">
                    <img src="https://placeimg.com/800/200/arch" class="w-full" />
                </div>
                <div id="item4" class="carousel-item w-full">
                    <img src="https://placeimg.com/800/200/arch" class="w-full" />
                </div>
            </div>
            <div class="flex justify-center w-full py-2 gap-2">
                <a href="#item1" class="btn btn-xs">1</a>
                <a href="#item2" class="btn btn-xs">2</a>
                <a href="#item3" class="btn btn-xs">3</a>
                <a href="#item4" class="btn btn-xs">4</a>
            </div>
        </div>

    </section>



    <section class="container mx-auto grid grid-cols-12 gap-4">

        <div class="col-span-12 md:col-span-10">

            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="sr-only">Products</h2>

                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    <a href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm ">Earthen Bottle</h3>
                        <p class="mt-1 text-lg font-medium">$48</p>
                    </a>

                    <a href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm ">Nomad Tumbler</h3>
                        <p class="mt-1 text-lg font-medium">$35</p>
                    </a>

                    <a href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm ">Focus Paper Refill</h3>
                        <p class="mt-1 text-lg font-medium">$89</p>
                    </a>

                    <a href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm ">Machined Mechanical Pencil</h3>
                        <p class="mt-1 text-lg font-medium">$35</p>
                    </a>

                    <!-- More products... -->
                </div>
            </div>


        </div>


    </section>





    <div class="page-wrapper">

        {{-- @include('ecommerce::layouts.partials_ecommerce.header') --}}
        <main class="main">
            <br> <!-- layout-  info_boxez-->

            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                        @php
                        $tagid = Request::segment(3);
                        @endphp

                        @if(!$tagid)
                        @include('ecommerce::layouts.partials_ecommerce.home_slider')
                        @endif

                        <div class="row">

                            {{--<div class="col-md-4">
                                <div class="banner banner-image">
                                    <a href="#">
                                        <img src="{{ asset('porto-ecommerce/assets/images/banners/banner-1.jpg' ) }}"
                            alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="banner banner-image">
                            <a href="#">
                                <img src="{{ asset('porto-ecommerce/assets/images/banners/banner-2.jpg' ) }}" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="banner banner-image">
                            <a href="#">
                                <img src="{{ asset('porto-ecommerce/assets/images/banners/banner-3.jpg' ) }}" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-4 --> --}}
                </div><!-- End .row -->

                <div class="mb-3"></div><!-- margin -->

                {{-- @include('ecommerce::layouts.partials_ecommerce.featured_products') --}}
                <div class="row row-sm">
                    @include('ecommerce::layouts.partials_ecommerce.list_products')
                </div>

                <div class="row float-right">
                    <div class="col-md-12 col-lg-12">
                        {{ $dataPaginate->links() }}
                    </div>
                </div>

                <div class="mb-6"></div><!-- margin -->

                <div class="row">
                    <!-- layout-  products_main-->

                </div><!-- End .row -->

                <div class="mb-3"></div><!-- margin -->

                <div class="row">
                    <!-- layout-  features_box -->


                </div><!-- End .row -->
            </div><!-- End .col-lg-9 -->

            <aside class="sidebar-home col-lg-3 order-lg-first">
                <div class="side-menu-container">
                    <h2>CATEGORIAS</h2>
                    @include('ecommerce::layouts.partials_ecommerce.sidemenu')
                </div><!-- End .side-menu-container -->

                <!-- SlidShow Side Bar, Carousel a Editar -->

                <div class="box-carousel">
                    <div class="widget-banners-slider owl-carousel owl-theme">
                        @forelse($records as $data)
                        @if($data->apply_store === 1)

                        <figure class="product-image-container boxing">
                            <a href="/ecommerce/item/{{ $data->id }}" class="product-image">
                                <img src="{{ asset('storage/uploads/items/'.$data->image) }}" alt="product" class="image">
                            </a>
                            <a href="{{route('item_partial', ['id' => $data->id])}}" class="btn-quickview">Vista Rápida</a>
                            <span class="product-label label-hot">New Sales Recent</span>
                            <span class="product-label">{{$data->description}}</span>
                        </figure>
                        @endif
                        @empty
                        <div class="widget widget-banner">
                            <div class="banner banner-image">
                                <a href="#">
                                    <img src="{{ asset('porto-ecommerce/assets/images/banners/banner-sidebar.jpg') }}" alt="Banner Desc">
                                </a>
                            </div><!-- End .banner -->
                        </div>
                        @endforelse
                        <!-- End .banner -->
                    </div><!-- End .banner-slider -->
                    <!-- End .widget or  SlideShow-->
                </div>



                <!-- <div class="widget widget-newsletters">
                           <h3 class="widget-title">Newsletter</h3>
                            <p>Get all the latest information on Events, Sales and Offers. </p>
                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="wemail">
                                    <label for="wemail"><i class="icon-envolope"></i>Email Address</label>
                                </div>
                                <input type="submit" class="btn btn-block" value="Subscribe Now">
                            </form>
                        </div>-->

                {{-- <div class="widget widget-testimonials">
                            @include('ecommerce::layouts.partials_ecommerce.testimonials')
                        </div> --}}
                <!-- End .widget -->

                <div class="widget">
                    <!-- layout-  news -->

                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-4"></div><!-- margin -->
    </main><!-- End .main -->

    <footer class="footer">
        @include('ecommerce::layouts.partials_ecommerce.footer')
    </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">

        @include('ecommerce::layouts.partials_ecommerce.mobile_menu')

    </div><!-- End .mobile-menu-container -->

    <div class="newsletter-popup mfp-hide" id="newsletter-popup-form">
        <!-- style="background-image: url(assets/images/newsletter_popup_bg.jpg)" -->
        <div class="newsletter-popup-content">
            <img src="{{ asset('porto-ecommerce/assets/images/logo-black.png') }}" alt="Logo" class="logo-newsletter">
            <h2>BE THE FIRST TO KNOW</h2>
            <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
                    <input type="submit" class="btn" value="Go!">
                </div><!-- End .from-group -->
            </form>
            <div class="newsletter-subscribe">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div><!-- End .newsletter-popup-content -->
    </div><!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="{{ asset('porto-ecommerce/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('porto-ecommerce/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('porto-ecommerce/assets/js/plugins.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('porto-ecommerce/assets/js/main.min.js') }}"></script>

    <script src="{{ asset('porto-ecommerce/assets/js/vue.min.js') }}"></script>


    @stack('scripts')
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo-6/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Sep 2019 03:39:54 GMT -->

</html>