@php
$path = explode('/', request()->path());
$path[1] = (array_key_exists(1, $path)> 0)?$path[1]:'';
$path[2] = (array_key_exists(2, $path)> 0)?$path[2]:'';
$path[0] = ($path[0] === '')?'documents':$path[0];
@endphp
<!-- <tenant-sidenavbar-index path_1="{{$path[1]}}" path_2="{{$path[2]}}" path_0="{{$path[0]}}"></tenant-sidenavbar-index> -->
<aside id="sidebar-left" class="menu is-hidden-touch card">
    <ul class="menu-list">
        @if(in_array('dashboard', $vc_modules))
        <li>
            <a class="{{ ($path[0] === 'dashboard')?'is-active':'' }}" href="{{ route('tenant.dashboard.index') }}">
                <span><i class="fa-solid fa-chart-line"></i> Dashboard</span>
            </a>
        </li>
        @endif

        @if(in_array('documents', $vc_modules))
        <li x-data='{ open1:"{{ ($path[0] === 'documents')?'true':'' }}{{ ($path[0] === 'items')?'true':'' }}{{ ($path[0] === 'services')?'true':'' }}{{ ($path[0] === 'persons' && $path[1] === 'customers')?'true':'' }}{{ ($path[0] === 'summaries')?'true':'' }}{{ ($path[0] === 'voided')?'true':'' }}{{ ($path[0] === 'quotations')?'true':'' }}{{ ($path[0] === 'sale-notes')?'true':'' }}{{ ($path[0] === 'contingencies')?'true':'' }}{{ ($path[0] === 'person-types')?'true':'' }}{{ ($path[0] === 'brands')?'true':'' }}{{ ($path[0] === 'categories')?'true':'' }}{{ ($path[0] === 'incentives')?'true':'' }}{{ ($path[0] === 'order-notes')?'true':'' }}{{ ($path[0] === 'sale-opportunities')?'true':'' }}{{ ($path[0] === 'contracts')?'true':'' }}{{ ($path[0] === 'production-orders')?'true':'' }}{{ ($path[0] === 'technical-services')?'true':'' }}{{ ($path[0] === 'user-commissions')?'true':'' }}{{ ($path[0] === 'regularize-shipping')?'true':'' }}{{ ($path[0] === 'item-lots')?'true':'' }}" }'>
            <a x-bind:class="open1 ? 'is-active' : ''"  href="javascript:;" @click="open1 = !open1 ">
                <span><i class="fa-solid fa-file-invoice"></i> Ventas</span>
            </a>
            <ul x-show="open1" x-transition">
                @if(auth()->user()->type != 'integrator' && $vc_company->soap_type_id != '03')

                @if(in_array('documents', $vc_modules))

                @if(in_array('new_document', $vc_module_levels))
                <li>
                    <a class="{{ ($path[0] === 'documents' && $path[1] === 'create')?'is-active':'' }}"  href="{{route('tenant.documents.create')}}">
                        Nuevo comprobante electrónico
                    </a>
                </li>
                @endif

                @endif

                @endif

                @if(in_array('documents', $vc_modules) && $vc_company->soap_type_id != '03')

                @if(in_array('list_document', $vc_module_levels))
                <li>
                    <a class="{{ ($path[0] === 'documents' && $path[1] != 'create' && $path[1] != 'not-sent'&& $path[1] != 'regularize-shipping')?'is-active':'' }}"  href="{{route('tenant.documents.index')}}">
                        Listado de comprobantes
                    </a>
                </li>
                @endif

                @endif

                @if(in_array('documents', $vc_modules) && $vc_company->soap_type_id != '03')

                @if(in_array('document_not_sent', $vc_module_levels))
                <li>
                    <a class="{{ ($path[0] === 'documents' && $path[1] === 'not-sent')?'is-active':'' }}"  href="{{route('tenant.documents.not_sent')}}">
                        Comprobantes no enviados
                    </a>
                </li>
                @endif
                @if(in_array('regularize_shipping', $vc_module_levels))
                <li>
                    <a class="{{ ($path[0] === 'documents' && $path[1] === 'regularize-shipping')?'is-active':'' }}"  href="{{route('tenant.documents.regularize_shipping')}}">
                        CPE pendientes de rectificación
                    </a>
                </li>
                @endif
                @endif

                @if(auth()->user()->type != 'integrator' && in_array('documents', $vc_modules) )

                @if(auth()->user()->type != 'integrator' && in_array('document_contingengy', $vc_module_levels) && $vc_company->soap_type_id != '03')
                <li>
                    <a class="{{ ($path[0] === 'contingencies' )?'is-active':'' }}"  href="{{route('tenant.contingencies.index')}}">
                        Documentos de contingencia
                    </a>
                </li>
                @endif

                @if(in_array('catalogs', $vc_module_levels))

                <li x-data='{open1_1:"{{ ($path[0] === 'items')?'true':'' }}{{ ($path[0] === 'services')?'true':'' }}{{ ($path[0] === 'categories')?'true':'' }}{{ ($path[0] === 'brands')?'true':'' }}{{ ($path[0] === 'item-lots')?'true':'' }}{{ ($path[0] === 'person-types')?'true':'' }}{{ ($path[0] === 'persons' && $path[1] === 'customers')?'true':'' }}"}'>
                    <a x-bind:class="open1_1 ? 'is-active' : ''"  href="javascript:;" @click="open1_1 = !open1_1 ">
                        Catálogos
                    </a>
                    <ul x-show="open1_1" x-transition>
                        <li>
                            <a class="{{ ($path[0] === 'items')?'is-active':'' }}"  href="{{route('tenant.items.index')}}">
                                Productos
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'services')?'is-active':'' }}"  href="{{route('tenant.services')}}">
                                Servicios
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'categories')?'is-active':'' }}"  href="{{route('tenant.categories.index')}}">
                                Categorías
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'brands')?'is-active':'' }}"  href="{{route('tenant.brands.index')}}">
                                Marcas
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'item-lots')?'is-active':'' }}"  href="{{route('tenant.item-lots.index')}}">
                                Series
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'persons' && $path[1] === 'customers')?'is-active':'' }}"  href="{{route('tenant.persons.index', ['type' => 'customers'])}}">
                                Clientes
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'person-types')?'is-active':'' }}"  href="{{route('tenant.person_types.index')}}">
                                Tipos de clientes
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(in_array('summary_voided', $vc_module_levels) && $vc_company->soap_type_id != '03')

                <li x-data='{open1_2:"{{ ($path[0] === 'summaries')?'true':'' }}{{ ($path[0] === 'voided')?'true':'' }}"}' class="">
                    <a x-bind:class="open1_2 ? 'is-active':''" @click="open1_2 = !open1_2 "  href="javascript:;">
                        Resúmenes y Anulaciones
                    </a>
                    <ul x-show="open1_2" x-transition>
                        <li class="">
                            <a class="{{ ($path[0] === 'summaries')?'is-active':'' }}"  href="{{route('tenant.summaries.index')}}">
                                Resúmenes
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'voided')?'is-active':'' }}"  href="{{route('tenant.voided.index')}}">
                                Anulaciones
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(in_array('sale-opportunity', $vc_module_levels))
                <li>
                    <a class="{{ ($path[0] === 'sale-opportunities')?'is-active':'' }}"  href="{{route('tenant.sale_opportunities.index')}}">
                        Oportunidad de venta
                    </a>
                </li>
                @endif

                @if(in_array('quotations', $vc_module_levels))

                <li>
                    <a class="{{ ($path[0] === 'quotations')?'is-active':'' }}"  href="{{route('tenant.quotations.index')}}">
                        Cotizaciones
                    </a>
                </li>
                @endif

                @if(in_array('contracts', $vc_module_levels))
                <li x-data='{open1_3:"{{ ($path[0] === 'contracts')?'true':'' }}{{ ($path[0] === 'production-orders')?'true':'' }}"}'>
                    <a x-bind:class="open1_3 ? 'is-active':''" @click="open1_3 = !open1_3 "  href="javascript:;">
                        Contratos
                    </a>
                    <ul x-show="open1_3" x-transition>
                        <li>
                            <a class="{{ ($path[0] === 'contracts')?'is-active':'' }}"  href="{{route('tenant.contracts.index')}}">
                                Listado
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'production-orders')?'is-active':'' }}"  href="{{route('tenant.production_orders.index')}}">
                                Ordenes de Producción
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(in_array('order-note', $vc_module_levels))
                <li>
                    <a class="{{ ($path[0] === 'order-notes')?'is-active':'' }}"  href="{{route('tenant.order_notes.index')}}">
                        Pedidos
                    </a>
                </li>
                @endif

                @if(in_array('sale_notes', $vc_module_levels))

                <li>
                    <a class="{{ ($path[0] === 'sale-notes')?'is-active':'' }}"  href="{{route('tenant.sale_notes.index')}}">
                        Notas de Venta
                    </a>
                </li>
                @endif

                @if(in_array('technical-service', $vc_module_levels))
                <li>
                    <a class="{{ ($path[0] === 'technical-services')?'is-active':'' }}"  href="{{route('tenant.technical_services.index')}}">
                        Servicio de soporte técnico
                    </a>
                </li>
                @endif

                @if(in_array('incentives', $vc_module_levels))

                <li x-data='{open1_4:"{{ ($path[0] === 'incentives')?'true':'' }}{{ ($path[0] === 'user-commissions')?'true':'' }}"}'>
                    <a x-bind:class="open1_4 ? 'is-active':''" @click="open1_4 = !open1_4 "  href="javascript:;">
                        Comisiones
                    </a>
                    <ul x-show="open1_4" x-transition>
                        <li>
                            <a class="{{ ($path[0] === 'user-commissions')?'is-active':'' }}"  href="{{route('tenant.user_commissions.index')}}">
                                Vendedores
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'incentives')?'is-active':'' }}"  href="{{route('tenant.incentives.index')}}">
                                Productos
                            </a>
                        </li>
                    </ul>
                </li>

                @endif



                @endif

            </ul>
        </li>

        @endif

        @if(auth()->user()->type != 'integrator')
        @if(in_array('pos', $vc_modules))
        <li x-data='{open2:"{{ ($path[0] === 'pos')?'true':'' }}{{ ($path[0] === 'cash')?'true':'' }}{{ ($path[0] === 'item-sets')?'true':'' }}"}'>
            <a x-bind:class="open2 ? 'is-active':''" @click="open2 = !open2 "  href="javascript:;">
                <span><i class="fa-solid fa-cash-register"></i> Pos</span>
            </a>
            <ul x-show="open2" x-transition>
                <li>
                    <a class="{{ ($path[0] === 'pos')?'is-active':'' }}"  href="{{route('tenant.pos.index')}}">
                        Punto de venta
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'cash')?'is-active':'' }}"  href="{{route('tenant.cash.index')}}">
                        Caja chica POS
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'item-sets')?'is-active':'' }}"  href="{{route('tenant.item_sets.index')}}">
                        Conjuntos/Packs/Promociones
                    </a>
                </li>

            </ul>
        </li>
        @endif
        @endif


        @if(in_array('ecommerce', $vc_modules))
        <li x-data='{open3:"{{in_array($path[0], ['ecommerce','items_ecommerce', 'tags', 'promotions', 'orders', 'configuration'])?'true':'' }}"}'>
            <a x-bind:class="open3 ? 'is-active':''" @click="open3 = !open3"  href="javascript:;">
            <i class="fa-solid fa-store"></i>
            Tienda Virtual
            </a>
            <ul x-show="open3" x-transition>
                <li>
                    <a  onclick="window.open('{{ route("tenant.ecommerce.index") }} ')">
                        Ir a Tienda
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'orders')?'is-active':'' }}"  href="{{route('tenant_orders_index')}}">
                        Pedidos
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'items_ecommerce')?'is-active':'' }}"  href="{{route('tenant.items_ecommerce.index')}}">
                        Productos Tienda Virtual
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'tags')?'is-active':'' }}"  href="{{route('tenant.tags.index')}}">
                        Tags - Categorias
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'promotions')?'is-active':'' }}"  href="{{route('tenant.promotion.index')}}">
                        Promociones
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[1] === 'configuration')?'is-active':'' }}"  href="{{route('tenant_ecommerce_configuration')}}">
                        Configuración
                    </a>
                </li>

            </ul>
        </li>
        @endif

        @if(auth()->user()->type != 'integrator')

        @if(in_array('purchases', $vc_modules))
        <li x-data='{open4:"{{ ($path[0] === 'purchases')?'nav-active nav-expanded':'' }}{{ ($path[0] === 'persons' && $path[1] === 'suppliers')?'nav-active nav-expanded':'' }}{{ ($path[0] === 'expenses')?'nav-active nav-expanded':'' }}{{ ($path[0] === 'purchase-quotations')?'nav-active nav-expanded':'' }}{{ ($path[0] === 'purchase-orders')?'nav-active nav-expanded':'' }}{{ ($path[0] === 'fixed-asset')?'nav-active nav-expanded':'' }}"}'>
            <a x-bind:class="open4 ? 'is-active':''" @click="open4 = !open4 "  href="javascript:;">
                <span> <i class="fa-solid fa-cart-shopping"></i> Compras</span>
            </a>
            <ul x-show="open4" x-transition>
                <li>
                    <a class="{{ ($path[0] === 'purchases' && $path[1] === 'create')?'is-active':'' }}"  href="{{route('tenant.purchases.create')}}">
                        Nuevo
                    </a>
                </li>

                <li>
                    <a class="{{ ($path[0] === 'purchases' && $path[1] != 'create')?'is-active':'' }}"  href="{{route('tenant.purchases.index')}}">
                        Listado
                    </a>
                </li>

                <li>
                    <a class="{{ ($path[0] === 'purchase-orders')?'is-active':'' }}"  href="{{route('tenant.purchase-orders.index')}}">
                        Ordenes de compra
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'expenses' )?'is-active':'' }}"  href="{{route('tenant.expenses.index')}}">
                        Gastos diversos
                    </a>
                </li>

                <li x-data='{open4_1:"{{ ($path[0] === 'persons' && $path[1] === 'suppliers')?'nav-active nav-expanded':'' }}{{ ($path[0] === 'purchase-quotations')?'nav-active nav-expanded':'' }}"}'>
                    <a x-bind:class="open4_1 ? 'is-active':''" @click="open4_1 = !open4_1 "  href="javascript:;">
                        Proveedores
                    </a>
                    <ul x-show="open4_1" x-transition>
                        <li>
                            <a class="{{ ($path[0] === 'persons' && $path[1] === 'suppliers')?'is-active':'' }}"  href="{{route('tenant.persons.index', ['type' => 'suppliers'])}}">
                                Listado
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'purchase-quotations')?'is-active':'' }}"  href="{{route('tenant.purchase-quotations.index')}}">
                                Solicitar cotización
                            </a>
                        </li>
                    </ul>
                </li>

                <li x-data='{open4_2:"{{ ($path[0] === 'fixed-asset' )?'nav-active nav-expanded':'' }}"}'>
                    <a x-bind:class="open4_2 ? 'is-active':''" @click="open4_2 = !open4_2 "  href="javascript:;">
                        Activos fijos
                    </a>
                    <ul x-show="open4_2" x-transition>
                        <li>
                            <a class="{{ ($path[0] === 'fixed-asset' && $path[1] === 'items')?'is-active':'' }}"  href="{{route('tenant.fixed_asset_items.index')}}">
                                Ítems
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'fixed-asset' && $path[1] === 'purchases')?'is-active':'' }}"  href="{{route('tenant.fixed_asset_purchases.index')}}">
                                Compras
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif

        @if(in_array('inventory', $vc_modules))
        <li x-data='{open5:"{{ (in_array($path[0], ['inventory', 'warehouses', 'moves', 'transfers', 'devolutions']) || ($path[0] === 'reports' && in_array($path[1], ['kardex', 'inventory', 'valued-kardex'])))?'true':'' }}"}'>
            <a x-bind:class="open5 ? 'is-active':''" @click="open5 = !open5 "  href="javascript:;">
                <span><i class="fa-solid fa-boxes-stacked"></i> Inventario</span>
            </a>
            <ul x-show="open5" x-transition>
                <li>
                    <a class="{{ ($path[0] === 'warehouses')?'is-active':'' }}"  href="{{route('warehouses.index')}}">Almacenes</a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'inventory')?'is-active':'' }}"  href="{{route('inventory.index')}}">Movimientos</a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'transfers')?'is-active':'' }}"  href="{{route('transfers.index')}}">Traslados</a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'devolutions')?'is-active':'' }}"  href="{{route('devolutions.index')}}">Devoluciones</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'reports') && ($path[1] === 'kardex')) ? 'is-active' : ''}}"  href="{{route('reports.kardex.index')}}">
                        Reporte Kardex
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] == 'inventory')) ? 'is-active' : ''}}"  href="{{route('reports.inventory.index')}}">
                        Reporte Inventario
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] === 'valued-kardex')) ? 'is-active' : ''}}"  href="{{route('reports.valued_kardex.index')}}">
                        Kardex valorizado
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @endif

        @if(in_array('establishments', $vc_modules))
        <li x-data='{open6:"{{ in_array($path[0], ['users', 'establishments'])?'true':'' }}"}'>
            <a x-bind:class="open6 ? 'is-active':''" @click="open6 = !open6 "  href="javascript:;">
                <span><i class="fa-solid fa-users"></i> Usuarios/Locales & Series</span>
            </a>
            <ul x-show="open6" x-transition>
                <li>
                    <a class="{{ ($path[0] === 'users')?'is-active':'' }}"  href="{{route('tenant.users.index')}}">
                        Usuarios
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'establishments')?'is-active':'' }}"  href="{{route('tenant.establishments.index')}}">
                        Establecimientos
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if(in_array('advanced', $vc_modules) && $vc_company->soap_type_id != '03')
        <li x-data='{open7:"{{($path[0] === 'retentions')?'true':''}}{{ ($path[0] === 'dispatches')?'true':'' }}{{($path[0] === 'perceptions')?'true':''}}{{($path[0] === 'drivers')?'true':'' }}{{($path[0] === 'dispatchers')?'true':''}}{{($path[0] === 'order-forms')?'true':'' }}"}'>
            <a x-bind:class="open7 ? 'is-active':''" @click="open7 = !open7 "  href="javascript:;">
                <span><i class="fa-solid fa-file-lines"></i> Comprobantes avanzados</span>
            </a>
            <ul x-show="open7" x-transition>
                <li>
                    <a class="{{ ($path[0] === 'retentions')?'is-active':'' }}"  href="{{route('tenant.retentions.index')}}">
                        Retenciones
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'dispatches')?'is-active':'' }}"  href="{{route('tenant.dispatches.index')}}">
                        Guías de remisión
                    </a>
                </li>
                <li>
                    <a class="{{ ($path[0] === 'perceptions')?'is-active':'' }}"  href="{{route('tenant.perceptions.index')}}">
                        Percepciones
                    </a>
                </li>


                <li x-data='{open7_1:"{{ ($path[0] === 'order-forms')?'is-active':'' }}{{ ($path[0] === 'drivers')?'is-active':'' }}{{ ($path[0] === 'dispatchers')?'is-active':'' }}"}'>
                    <a x-bind:class="open7_1 ? 'is-active':''" @click="open7_1 = !open7_1 "  href="javascript:;">
                        Ordenes de pedido
                    </a>
                    <ul x-show="open7_1" x-transition>
                        <li>
                            <a class="{{ ($path[0] === 'order-forms')?'is-active':'' }}"  href="{{route('tenant.order_forms.index')}}">
                                Listado
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'drivers')?'is-active':'' }}"  href="{{route('tenant.order_forms.drivers.index')}}">
                                Conductores
                            </a>
                        </li>
                        <li>
                            <a class="{{ ($path[0] === 'dispatchers')?'is-active':'' }}"  href="{{route('tenant.order_forms.dispatchers.index')}}">
                                Transportistas
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </li>
        @endif
        @if(in_array('reports', $vc_modules))
        <li x-data='{open8:"{{($path[0] === 'reports' && in_array($path[1], ['purchases', 'search','sales','customers','items','general-items','consistency-documents', 'quotations', 'sale-notes','cash','commissions','document-hotels','validate-documents', 'document-detractions','commercial-analysis', 'order-notes-consolidated','order-notes-general', 'sales-consolidated', 'user-commissions', 'fixed-asset-purchases', 'massive-downloads'])) ? 'true' : ''}}"}'>
            <a x-bind:class="open8 ? 'is-active':''" @click="open8 = !open8 "  href="javascript:;">
                <span><i class="fa-solid fa-print"></i> Reportes</span>
            </a>
            <ul x-show="open8" x-transition>
                <li x-data='{open8_1:"{{($path[0] === 'reports' && in_array($path[1], ['purchases', 'fixed-asset-purchases'])) ? 'is-active' : ''}}"}'>
                    <a x-bind:class="open8_1 ? 'is-active':''" @click="open8_1 = !open8_1 "  href="javascript:;">
                        Compras
                    </a>
                    <ul x-show="open8_1" x-transition>
                        <li>
                            <a class="{{(($path[0] === 'reports') && ($path[1] === 'purchases')) ? '' : ''}}"  href="{{route('tenant.reports.purchases.index')}}">
                                Compras totales
                            </a>
                        </li>

                        <li class="{{(($path[0] === 'reports') && ($path[1] === 'fixed-asset-purchases')) ? 'nav-active' : ''}}">
                            <a  href="{{route('tenant.reports.fixed-asset-purchases.index')}}">
                                Activos fijos
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="{{(($path[0] === 'reports') && ($path[1] === 'purchases')) ? 'nav-active' : ''}}">
                <a  href="{{route('tenant.reports.purchases.index')}}">
                    Compras
                </a>
        </li> --}}

        <li x-data='{open8_2:"{{($path[0] === 'reports' && in_array($path[1], ['sales','customers','items','quotations', 'sale-notes', 'document-detractions', 'commissions',  'general-items','sales-consolidated', 'user-commissions'])) ? 'true' : ''}}"}'>
            <a x-bind:class="open8_2 ? 'is-active':''" @click="open8_2 = !open8_2 "  href="javascript:;">
                Ventas
            </a>
            <ul x-show="open8_2" x-transition>
                @if($vc_company->soap_type_id != '03')
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] === 'sales')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.sales.index')}}">
                        Documentos
                    </a>
                </li>
                @endif
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] === 'customers')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.customers.index')}}">
                        Clientes
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] === 'items')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.items.index')}}">
                        Producto - busqueda individual
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] === 'general-items')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.general_items.index')}}">
                        Productos
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] == 'quotations')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.quotations.index')}}">
                        Cotizaciones
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] == 'sale-notes')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.sale_notes.index')}}">
                        Notas de Venta
                    </a>
                </li>
                @if($vc_company->soap_type_id != '03')
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] == 'document-detractions')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.document_detractions.index')}}">
                        Detracciones
                    </a>
                </li>
                @endif


                <li x-data='{open8_3:"{{ (($path[0] === 'reports') && ($path[1] == 'commissions')) ?'nav-active nav-expanded':'' }}{{ (($path[0] === 'reports') && ($path[1] == 'user-commissions')) ?'nav-active nav-expanded':'' }}"}'>
                    <a x-bind:class="open8_3 ? 'is-active':''" @click="open8_3 = !open8_3 "  href="javascript:;">
                        Comisiones
                    </a>
                    <ul x-show="open8_3" x-transition>
                        <li class="{{(($path[0] === 'reports') && ($path[1] == 'user-commissions')) ? 'nav-active' : ''}}">
                            <a  href="{{route('tenant.reports.user_commissions.index')}}">
                                Utilidad ventas
                            </a>
                        </li>

                        <li class="{{(($path[0] === 'reports') && ($path[1] == 'commissions')) ? 'nav-active' : ''}}">
                            <a  href="{{route('tenant.reports.commissions.index')}}">
                                Ventas
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] == 'sales-consolidated')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.sales_consolidated.index')}}">
                        Consolidado de items
                    </a>
                </li>
            </ul>
        </li>

        <li x-data='{open9:"{{($path[0] === 'reports' && in_array($path[1], ['order-notes-consolidated', 'order-notes-general'])) ? 'nav-active nav-expanded' : ''}}"}'>
            <a x-bind:class="open9 ? 'is-active':''" @click="open9 = !open9 "  href="javascript:;">
                Pedidos
            </a>
            <ul x-show="open9" x-transition>
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] == 'order-notes-general')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.order_notes_general.index')}}">
                        General
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'reports') && ($path[1] == 'order-notes-consolidated')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.order_notes_consolidated.index')}}">
                        Consolidado de items
                    </a>
                </li>
            </ul>
        </li>

        @if($vc_company->soap_type_id != '03')
        <li>
            <a class="{{(($path[0] === 'reports') && ($path[1] == 'consistency-documents')) ? 'is-active' : ''}}"  href="{{route('tenant.consistency-documents.index')}}">Consistencia documentos</a>
        </li>

        <li>
            <a class="{{(($path[0] === 'reports') && ($path[1] == 'validate-documents')) ? 'is-active' : ''}}"  href="{{route('tenant.validate_documents.index')}}">
                Validador de documentos
            </a>
        </li>
        @endif
        @if(in_array('hotel', $vc_business_turns))
        <li>
            <a class="{{(($path[0] === 'reports') && ($path[1] == 'document-hotels')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.document_hotels.index')}}">
                Giro negocio hoteles
            </a>
        </li>
        @endif
        <li>
            <a class="{{(($path[0] === 'reports') && ($path[1] == 'commercial-analysis')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.commercial_analysis.index')}}">
                Análisis comercial
            </a>
        </li>
        <li>
            <a class="{{(($path[0] === 'reports') && ($path[1] == 'massive-downloads')) ? 'is-active' : ''}}"  href="{{route('tenant.reports.massive-downloads.index')}}">
                Descarga masiva - documentos
            </a>
        </li>
    </ul>
    @endif
 
        @if(in_array('accounting', $vc_modules))
        <li x-data='{open10:"{{ ($path[0] === 'account')?'nav-active nav-expanded':'' }}"}'>
            <a x-bind:class="open10 ? 'is-active':''" @click="open10 = !open10 "  href="javascript:;">
                <span><i class="fa-solid fa-file-invoice-dollar"></i> Contabilidad</span>
            </a>
            <ul x-show="open10" x-transition>
                <li>
                    <a class="{{(($path[0] === 'account') && ($path[1] === 'format')) ? 'is-active' : ''}}"  href="{{ route('tenant.account_format.index') }}">
                        Exportar formatos
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'account') && ($path[1] == ''))   ? 'is-active' : ''}}"  href="{{ route('tenant.account.index') }}">
                        Exportar formatos - Sis. Contable
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'account') && ($path[1] == 'summary-report'))   ? 'is-active' : ''}}"  href="{{ route('tenant.account_summary_report.index') }}">
                        Reporte resumido - Ventas
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(in_array('finance', $vc_modules))

        <li x-data='{open11:"{{$path[0] === 'finances' && in_array($path[1], ['global-payments', 'balance','payment-method-types', 'unpaid', 'to-pay', 'income', 'movements'])?'nav-active nav-expanded' : ''}}"}'>
            <a x-bind:class="open11 ? 'is-active':''" @click="open11 = !open11 "  href="javascript:;">
                <span><i class="fa-solid fa-money-bill"></i> Finanzas</span>
            </a>
            <ul x-show="open11" x-transition>
                <li>
                    <a class="{{(($path[0] === 'finances') && ($path[1] == 'global-payments')) ? 'is-active' : ''}}"  href="{{route('tenant.finances.global_payments.index')}}">
                        Pagos
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'finances') && ($path[1] == 'balance')) ? 'is-active' : ''}}"  href="{{route('tenant.finances.balance.index')}}">
                        Balance
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'finances') && ($path[1] == 'payment-method-types')) ? 'is-active' : ''}}"  href="{{route('tenant.finances.payment_method_types.index')}}">
                        Ingresos y Egresos - M. Pago
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'finances') && ($path[1] == 'movements')) ? 'is-active' : ''}}"  href="{{route('tenant.finances.movements.index')}}">
                        Movimientos
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'finances') && ($path[1] == 'unpaid')) ? 'is-active' : ''}}"  href="{{route('tenant.finances.unpaid.index')}}">
                        Cuentas por cobrar
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'finances') && ($path[1] == 'to-pay')) ? 'is-active' : ''}}"  href="{{route('tenant.finances.to_pay.index')}}">
                        Cuentas por pagar
                    </a>
                </li>
                <li>
                    <a class="{{(($path[0] === 'finances') && ($path[1] == 'income')) ? 'is-active' : ''}}"  href="{{route('tenant.finances.income.index')}}">
                        Ingresos
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(in_array('configuration', $vc_modules))
        <li x-data='{open12:"{{in_array($path[0], ['companies', 'catalogs', 'advanced', 'tasks', 'inventories','company_accounts','bussiness_turns','offline-configurations','series-configurations','configurations', 'login-page']) ? 'nav-active nav-expanded' : ''}}"}'>
            <a x-bind:class="open12 ? 'is-active':''" @click="open12 = !open12 "  href="javascript:;">
                <span><i class="fa-solid fa-gears"></i> Configuración</span>
            </a>
            <ul x-show="open12" x-transition>
                <li>
                    <a class="{{($path[0] === 'companies') ? 'is-active': ''}}"  href="{{route('tenant.companies.create')}}">
                        Empresa
                    </a>
                </li>
                <li>
                    <a class="{{($path[0] === 'company_accounts') ? 'is-active': ''}}"  href="{{route('tenant.company_accounts.create')}}">
                        Cuentas contables
                    </a>
                </li>
                <li>
                    <a class="{{($path[0] === 'bussiness_turns') ? 'is-active': ''}}"  href="{{route('tenant.bussiness_turns.index')}}">
                        Giro de negocio
                    </a>
                </li>
                @if(auth()->user()->type != 'integrator')
                <li>
                    <a class="{{($path[0] === 'catalogs') ? 'is-active' : ''}}"  href="{{route('tenant.catalogs.index')}}">
                        Catálogos
                    </a>
                </li>
                @endif

                <li>
                    <a class="{{($path[0] === 'advanced') ? 'is-active' : ''}}"  href="{{route('tenant.advanced.index')}}">
                        Avanzado
                    </a>
                </li>

                <li>
                    <a class="{{($path[1] === 'pdf_templates') ? 'is-active' : ''}}"  href="{{route('tenant.advanced.pdf_templates')}}">
                        Plantillas PDF
                    </a>
                </li>

                <li>
                    <a class="{{($path[1] === 'pdf_guide_templates') ? 'is-active' : ''}}"  href="{{route('tenant.advanced.pdf_guide_templates')}}">
                        Plantillas PDF Guía de remisión
                    </a>
                </li>

                <li>
                    <a class="{{($path[1] === 'pdf_preprinted_templates') ? 'is-active' : ''}}"  href="{{route('tenant.advanced.pdf_preprinted_templates')}}">
                        Formatos Pre Impresos
                    </a>
                </li>
                @if($vc_company->soap_type_id != '03')
                <li>
                    <a class="{{($path[0] === 'offline-configurations') ? 'is-active' : ''}}"  href="{{route('tenant.offline_configurations.index')}}">
                        Modo offline
                    </a>
                </li>
                <li>
                    <a class="{{($path[0] === 'series-configurations') ? 'is-active' : ''}}"  href="{{route('tenant.series_configurations.index')}}">
                        Numeración de facturación
                    </a>
                </li>
                @endif
                @if(auth()->user()->type != 'integrator' && $vc_company->soap_type_id != '03')
                <li>
                    <a class="{{($path[0] === 'tasks') ? 'is-active': ''}}"  href="{{route('tenant.tasks.index')}}">Tareas programadas</a>
                </li>
                <li>
                    <a class="{{($path[0] === 'inventories' && $path[1] === 'configuration') ? 'is-active': ''}}"  href="{{route('tenant.inventories.configuration.index')}}">Inventarios</a>
                </li>
                @endif
                <li>
                    <a class="{{($path[0] === 'login-page') ? 'is-active' : ''}}"  href="{{route('tenant.login_page')}}">Login</a>
                </li>
            </ul>
        </li>
        @endif

        @if(in_array('cuenta', $vc_modules))
        <li x-data='{open14:"{{ ($path[0] === 'cuenta')?'is-active':'' }}"}'>
            <a x-bind:class="open14 ? 'is-active':''" @click="open14 = !open14 "  href="javascript:;">
                <span><i class="fa-solid fa-credit-card"></i> Mis Pagos</span>
            </a>
            <ul x-show="open14" x-transition>
                <li>
                    <a class="{{ (($path[0] === 'cuenta') && ($path[1] === 'configuration')) ?'is-active':'' }}"  href="{{route('tenant.configuration.index')}}">
                        Configuracion
                    </a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'cuenta') && ($path[1] === 'payment_index')) ?'is-active':'' }}"  href="{{route('tenant.payment.index')}}">
                        Lista de Pagos
                    </a>
                </li>
            </ul>
        </li>
        <p class="menu-label">
            Modulos
        </p>
        @endif
        <li x-data='{open15:"{{($path[0] === 'hotels')?'true' : '' }}"}'>
            <a x-bind:class="open15 ? 'is-active':''" @click="open15 = !open15"  href="javascript:;">
                <span><i class="fa-solid fa-hotel"></i> Hoteles</span>
            </a>
            <ul x-show="open15" x-transition>
                <li>
                    <a class="{{ (($path[0] === 'hotels') && ($path[1] === 'reception')) ? 'is-active' : '' }}"  href="{{ url('hotels/reception') }}">Recepción</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'hotels') && ($path[1] === 'rates')) ? 'is-active' : '' }}"  href="{{ url('hotels/rates') }}">Tarifas</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'hotels') && ($path[1] === 'floors')) ? 'is-active' : '' }}"  href="{{ url('hotels/floors') }}">Pisos</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'hotels') && ($path[1] === 'categories')) ? 'is-active' : '' }}"  href="{{ url('hotels/categories') }}">Categorías</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'hotels') && ($path[1] === 'rooms')) ? 'is-active' : '' }}"  href="{{ url('hotels/rooms') }}">Habitaciones</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'hotels') && ($path[1] === 'workers')) ? 'is-active' : '' }}"  href="{{ url('hotels/workers') }}">Trabajadores</a>
                </li>
            </ul>
        </li>
        <li x-data='{open16:"{{ ($path[0] === 'documentary-procedure') ? 'nav-active nav-expanded' : '' }}"}' style="display:none;">
            <a x-bind:class="open16 ? 'is-active':''" @click="open16 = !open16 "  href="javascript:;">
                <span>Trámite documentario</span>
            </a>
            <ul x-show="open16" x-transition>
                <li>
                    <a class="{{ (($path[0] === 'documentary-procedure') && ($path[1] === 'offices')) ? 'is-active' : '' }}"  href="{{ route('documentary.offices') }}">Oficinas</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'documentary-procedure') && ($path[1] === 'processes')) ? 'is-active' : '' }}"  href="{{ route('documentary.processes') }}">Procesos</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'documentary-procedure') && ($path[1] === 'documents')) ? 'is-active' : '' }}"  href="{{ route('documentary.documents') }}">Tipos de Documento</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'documentary-procedure') && ($path[1] === 'actions')) ? 'is-active' : '' }}"  href="{{ route('documentary.actions') }}">Acciones</a>
                </li>
                <li>
                    <a class="{{ (($path[0] === 'documentary-procedure') && ($path[1] === 'files')) ? 'is-active' : '' }}"  href="{{ route('documentary.files') }}">Expedientes</a>
                </li>
            </ul>
        </li>
</aside>