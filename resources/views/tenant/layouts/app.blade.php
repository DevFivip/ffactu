<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-gray-50" style="overflow:hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Facturación Electrónica</title>

    <!-- v2 Adaptatión -->
    <link async href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.8.55/css/materialdesignicons.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> 
    <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <link rel="stylesheet" href="{{asset('porto-light/vendor/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('porto-light/vendor/jquery-ui/jquery-ui.theme.css')}}" />

    @stack('styles')



    @if ($vc_company->favicon)
    <link rel="shortcut icon" type="image/png" href="{{ asset($vc_company->favicon) }}" />
    @endif
    <script defer src="{{ mix('js/app.js') }}"></script>

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

    <style>
        body {
            overflow: hidden;
        }

        .menu {
            position: sticky;
            display: inline-block;
            vertical-align: top;
            max-height: 100vh;
            overflow-y: auto;
            width: 260px;
            top: 0;
            bottom: 0;
            padding: 30px;
        }

        .content {
            display: inline-block;
            max-height: 100vh;
            width: 100%;
            overflow-x: hidden;
        }
    </style>

</head>

<body id="_body" style="display: none;">
    @include('tenant.layouts.partials.header')
    <div class="columns">
        @include('tenant.layouts.partials.sidebar')
        <div class="column p-5" id="main-wrapper">
            <div class="content p-1">
                @yield('content')
                @yield('package-contents')
            </div>
        </div>
    </div>
    <!-- <section class="body"> -->
    <!-- start: header -->
    <!-- end: header -->
    <!-- <div class="inner-wrapper"> -->
    <!-- start: sidebar -->
    <!-- end: sidebar -->
    <!-- <section role="main" class="content-body" id="main-wrapper">
                @yield('content')
            </section> -->
    <!-- </div>
    </section> -->

    @if($show_ws)
    @if(strlen($phone_whatsapp) > 0)
    <a class='ws-flotante' href='https://wa.me/{{$phone_whatsapp}}' target="BLANK" style="background-image: url('{{asset('logo/ws.png')}}'); background-size: 70px; background-repeat: no-repeat;"></a>
    @endif
    @endif



    <!-- Vendor -->
 <script src="{{ asset('porto-light/vendor/jquery/jquery.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/jquery-cookie/jquery-cookie.js')}}"></script>

    <!-- {{-- <script src="{{ asset('porto-light/master/style-switcher/style.switcher.js')}}"></script> --}} -->
    <script src="{{ asset('porto-light/vendor/popper/umd/popper.min.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/bootstrap/js/bootstrap.js')}}"></script>
    <!-- {{-- <script src="{{ asset('porto-light/vendor/common/common.js')}}"></script> --}} -->
    <script src="{{ asset('porto-light/vendor/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/select2/js/select2.js') }}"></script>
    <script src="{{ asset('porto-light/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('porto-light/vendor/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('porto-light/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js')}}"></script>
    <script src="{{asset('porto-light/vendor/select2/js/select2.js')}}"></script>

    <script src="{{asset('porto-light/vendor/jquery-loading/dist/jquery.loading.js')}}"></script>

    <script src="assets/vendor/select2/js/select2.js"></script>
    <!-- {{--<script src="{{asset('porto-light/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>--}} -->

    <!-- Moment -->
    <!-- {{--<script src="{{ asset('porto-light/vendor/moment/moment.js') }}"></script>--}} -->

    <!-- DatePicker -->
    <!-- {{--<script src="{{asset('porto-light/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>--}} -->

    <!-- Date range Plugin JavaScript -->
    <!-- {{--<script src="{{ asset('porto-light/vendor/bootstrap-timepicker/bootstrap-timepicker.js') }}"></script>--}}
    {{--<script src="{{ asset('porto-light/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>--}} -->

    <!-- Theme Initialization Files -->
    <!-- {{-- <script src="{{asset('porto-light/js/theme.init.js')}}"></script> --}} -->

    <!-- {{--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>--}} -->

    @stack('scripts')

    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <!-- Theme Base, Components and Settings -->
    <script src="{{asset('porto-light/js/theme.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{asset('porto-light/js/custom.js')}}"></script>
    <script src="{{asset('porto-light/js/jquery.xml2json.js')}}"></script>
    <script>
        function parseXMLToJSON(source) {
            let transform = $.xml2json(source);
            return transform
        }
    </script>
    <script src="//code.tidio.co/1vliqewz9v7tfosw5wxiktpkgblrws5w.js"></script>

    <script>
     document.addEventListener("DOMContentLoaded", ()=>{
        let body = document.getElementById('_body');
        body.style.display = 'block'
     });
</script>
</body>

</html>