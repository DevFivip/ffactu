<nav class="navbar" role="navigation" aria-label="main navigation" style="z-index: 1000;">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <img src="../images/fivip-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            🚫
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">

            <!-- <ul class="notifications">
                <li>
                    <a href="{{ route('settings.change_mode') }}" class="notification-icon text-secondary" data-toggle="tooltip" data-placement="bottom" title="Modo noche">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                    </a>
                </li>
            </ul>
            <span class="separator"></span>
            <ul class="notifications">
                <li>
                    <a href="{{ route('tenant_orders_index') }}" class="notification-icon text-secondary" data-toggle="tooltip" data-placement="bottom" title="Pedidos pendientes">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="badge badge-pill badge-info badge-up cart-item-count">{{ $vc_orders }}</span>
                    </a>
                </li>
            </ul>
            @if($vc_document > 0)
            <span class="separator"></span>
            <ul class="notifications">
                <li>
                    <a href="{{route('tenant.documents.regularize_shipping')}}" class="notification-icon text-secondary" data-toggle="tooltip" data-placement="bottom" title="Comprobantes pendientes de envío">
                        <i class="far fa-bell text-secondary"></i>
                        <span class="badge badge-pill badge-danger badge-up cart-item-count">{{ $vc_document }}</span>
                    </a>
                </li>
            </ul>
            @endif


            @if($vc_document_regularize_shipping > 0)
            <span class="separator"></span>
            <ul class="notifications">
                <li>
                    <a href="{{route('tenant.documents.regularize_shipping')}}" class="notification-icon text-secondary" data-toggle="tooltip" data-placement="bottom" title="Comprobantes pendientes de rectificación">
                        <i class="fas fa-exclamation-triangle text-secondary"></i>
                        <span class="badge badge-pill badge-danger badge-up cart-item-count">{{ $vc_document_regularize_shipping }}</span>
                    </a>
                </li>
            </ul>
            @endif -->

        </div>

        <div class="navbar-end">

            <!-- <div class="navbar-item">
                <a href="{{ route('settings.change_mode') }}" class="notification-icon text-secondary" data-toggle="tooltip" data-placement="bottom" title="Modo noche">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </a>
            </div> -->


            @if($vc_company->soap_type_id == "01")

            <a href="@if(in_array('configuration', $vc_modules)){{route('tenant.companies.create')}}@else # @endif" class="navbar-item" data-toggle="tooltip" data-placement="bottom" title="SUNAT: ENTORNO DE PRUEBA, pulse para ir a configuración">
                <!-- <i class="fas fa-2x fa-toggle-off mr-2" style="font-size: 20px"></i> -->
                <span>🚫</span>
            </a>

            @elseif($vc_company->soap_type_id == "02")

            <a href="@if(in_array('configuration', $vc_modules)){{route('tenant.companies.create')}}@else # @endif" class="navbar-item" data-toggle="tooltip" data-placement="bottom" title="SUNAT: ENTORNO DE PRODUCCIÓN, pulse para ir a configuración">
                <!-- <i class="text-success fas fa-2x fa-toggle-on mr-2" style="font-size: 20px; color: #28a745 !important"></i> -->
                <span>✅</span>
            </a>

            @else

            <a href="@if(in_array('configuration', $vc_modules)){{route('tenant.companies.create')}}@else # @endif" class="navbar-item" data-toggle="tooltip" data-placement="bottom" title="INTERNO: ENTORNO DE PRODUCCIÓN, pulse para ir a configuración">
                <i class="text-info fas fa-2x fa-toggle-on mr-2" style="font-size: 20px; color: #398bf7!important;"></i>
                <span>INT</span>
            </a>

            @endif



            <div class="navbar-item">
                <a href="{{ route('tenant_orders_index') }}" class="notification-icon text-secondary" data-toggle="tooltip" data-placement="bottom" title="Pedidos pendientes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="badge badge-pill badge-info badge-up cart-item-count">{{ $vc_orders }}</span>
                </a>
            </div>



            @if($vc_document > 0)
            <div class="navbar-item">
                <a href="{{route('tenant.documents.regularize_shipping')}}" class="notification-icon text-secondary" data-toggle="tooltip" data-placement="bottom" title="Comprobantes pendientes de envío">
                    <i class="far fa-bell text-secondary"></i>
                    <span class="badge badge-pill badge-danger badge-up cart-item-count">{{ $vc_document }}</span>
                </a>
            </div>
            @endif


            @if($vc_document_regularize_shipping > 0)
            <div class="navbar-item">
                <a href="{{route('tenant.documents.regularize_shipping')}}" class="notification-icon text-secondary" data-toggle="tooltip" data-placement="bottom" title="Comprobantes pendientes de rectificación">
                    <i class="fas fa-exclamation-triangle text-secondary"></i>
                    <span class="badge badge-pill badge-danger badge-up cart-item-count">{{ $vc_document_regularize_shipping }}</span>
                </a>
            </div>
            @endif
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    <div class="border rounded-circle text-center" style="width: 25px;"><i class="fas fa-user"></i></div>
                    <span class="name">{{ $vc_user->name }}</span>
                    <!-- <span class="role">{{ $vc_user->email }}</span> -->
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i> &nbsp; @lang('app.buttons.logout')
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>


        <!-- <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <div class="profile-info" data-lock-name="{{ $vc_user->email }}" data-lock-email="{{ $vc_user->email }}">
                    <span class="name">{{ $vc_user->name }}</span>
                    <span class="role">{{ $vc_user->email }}</span>
                </div>
                <figure class="profile-picture">
                    {{-- <img src="{{asset('img/%21logged-user.jpg')}}" alt="Profile" class="rounded-circle" data-lock-picture="img/%21logged-user.jpg" /> --}}
                    <div class="border rounded-circle text-center" style="width: 25px;"><i class="fas fa-user"></i></div>
                </figure>
                {{-- <i class="fa custom-caret"></i> --}}
            </a>
            <div class="dropdown-menu">
                <ul class="list-unstyled mb-0">
                    {{-- <li class="divider"></li> --}}
                    <li>
                        {{--<a role="menuitem" href="#"><i class="fas fa-user"></i> Perfil</a>--}}
                        <a role="menuitem" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i> @lang('app.buttons.logout')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div> -->



    </div>
    </div>
</nav>