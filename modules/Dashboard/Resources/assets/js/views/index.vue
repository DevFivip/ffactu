<template>
    <div v-if="typeUser == 'admin'">

        <section class="hero is-primary is-rounded">
            <div class="hero-body">
                <p class="title">
                    Dashboard
                </p>
                <p class="subtitle">
                    Resumen de Informes
                </p>
                <div class="columns">
                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded">
                                        <label class="label has-text-primary-light">Establecimiento</label>
                                        <el-select v-model="form.establishment_id" @change="loadAll">
                                            <el-option v-for="option in establishments" :key="option.id"
                                                :value="option.id" :label="option.name"></el-option>
                                        </el-select>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded">
                                        <label class="label has-text-primary-light">Periodo</label>
                                        <el-select v-model="form.period" @change="changePeriod">
                                            <el-option key="all" value="all" label="Todos"></el-option>
                                            <el-option key="month" value="month" label="Por mes"></el-option>
                                            <el-option key="between_months" value="between_months" label="Entre meses">
                                            </el-option>
                                            <el-option key="date" value="date" label="Por fecha"></el-option>
                                            <el-option key="between_dates" value="between_dates" label="Entre fechas">
                                            </el-option>
                                        </el-select>
                                    </p>
                                </div>
                                <template v-if="form.period === 'month' || form.period === 'between_months'">
                                    <div class="field">
                                        <p class="control is-expanded">
                                            <label class="label has-text-primary-light">Mes de </label>
                                            <el-date-picker v-model="form.month_start" type="month"
                                                @change="changeDisabledMonths" value-format="yyyy-MM" format="MM/yyyy"
                                                :clearable="false"></el-date-picker>
                                        </p>
                                    </div>
                                </template>

                                <template v-if="form.period === 'between_months'">
                                    <div class="field">
                                        <p class="contrl is-expanded">
                                            <label class="label has-text-primary-light">Mes al</label>
                                            <el-date-picker v-model="form.month_end" type="month"
                                                :picker-options="pickerOptionsMonths" @change="loadAll"
                                                value-format="yyyy-MM" format="MM/yyyy" :clearable="false">
                                            </el-date-picker>
                                        </p>
                                    </div>
                                </template>
                                <template v-if="form.period === 'date' || form.period === 'between_dates'">
                                    <div class="field">
                                        <p class="contrl is-expanded">
                                            <label class="label has-text-primary-light">Fecha del</label>
                                            <el-date-picker v-model="form.date_start" type="date"
                                                @change="changeDisabledDates" value-format="yyyy-MM-dd"
                                                format="dd/MM/yyyy" :clearable="false"></el-date-picker>
                                        </p>
                                    </div>
                                </template>
                                <template v-if="form.period === 'between_dates'">
                                    <div class="field">
                                        <p class="contrl is-expanded">
                                            <label class="label has-text-primary-light">Fecha al</label>
                                            <el-date-picker v-model="form.date_end" type="date"
                                                :picker-options="pickerOptionsDates" @change="loadAll"
                                                value-format="yyyy-MM-dd" format="dd/MM/yyyy" :clearable="false">
                                            </el-date-picker>
                                        </p>
                                    </div>
                                </template>


                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>



        <div class="columns mt-3">
            <div class="column is-half">
                <div class="card">
                    <div class="card-content">
                        <p class="title">
                            {{ documents_quantity }}
                        </p>
                        <p class="subtitle">
                            Cantidad de comprobantes electrónicos emitidos
                        </p>
                    </div>
                </div>
            </div>
            <div class="column is-half" v-if="company.certificate_due">
                <div class="card">
                    <div class="card-content">
                        <p class="title">
                            Expira: {{ company.certificate_due }}
                        </p>
                        <p class="subtitle">
                            Certificado
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column is-two-fifths">
                <div class="card" v-show="!loaders.sale_note">
                    <div class="card-content">
                        <p class="subtitle">
                            Notas de venta
                        </p>
                        <div class="columns">
                            <div class="column has-text-info">
                                <p class="title is-4 has-text-info">
                                    Pagado
                                </p>
                                S/ {{ sale_note.totals.total_payment }}
                            </div>
                            <div class="column has-text-danger">
                                <p class="title is-4 has-text-danger">
                                    Pendiente
                                </p>
                                S/ {{ sale_note.totals.total_to_pay }}
                            </div>
                            <div class="column">
                                <p class="title is-4">
                                    Total
                                </p>
                                S/ {{ sale_note.totals.total }}
                            </div>
                        </div>
                        <div class="card-content">
                            <x-graph type="doughnut" :all-data="sale_note.graph"></x-graph>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-two-fifths" v-if="soapCompany != '03'">
                <div class="card" v-show="!loaders.document">
                    <div class="card-content">
                        <p class="subtitle">
                            Comprobantes
                        </p>
                        <div class="columns">
                            <div class="column has-text-info">
                                <p class="title is-4 has-text-info">
                                    Pagado
                                </p>
                                S/ {{ document.totals.total_payment }}
                            </div>
                            <div class="column has-text-danger">
                                <p class="title is-4 has-text-danger">
                                    Pendiente
                                </p>
                                S/ {{ document.totals.total_to_pay }}
                            </div>
                            <div class="column">
                                <p class="title is-4">
                                    Total
                                </p>
                                S/ {{ document.totals.total }}
                            </div>
                        </div>
                        <div class="card-content">
                            <x-graph type="doughnut" :all-data="document.graph"></x-graph>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="columns">
            <div class="column is-full">
                <div class="card">
                    <div class="card-content">
                        <div class="subtitle">Totales</div>
                        <div class="columns">
                            <div class="column has-text-info">
                                <p class="title is-2 has-text-info">
                                    Total Notas de ventas
                                </p>
                                S/ {{ general.totals.total_sale_notes }}
                            </div>
                            <div class="column has-text-danger">
                                <p class="title is-2 has-text-danger">
                                    Total Comprobantes
                                </p>
                                S/ {{ general.totals.total_documents }}
                            </div>
                            <div class="column">
                                <p class="title is-2">
                                    Total
                                </p>
                                S/ {{ general.totals.total }}
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <x-graph-line :all-data="general.graph"></x-graph-line>
                    </div>

                </div>
            </div>
        </div>



        <div class="columns">
            <div class="column">
                <div class="card" v-show="!loaders.balance">
                    <div class="card-content">
                        <p class="subtitle">
                            Balance Ventas - Compras - Gastos
                        </p>
                        <div class="columns">
                            <div class="column has-text-info">
                                <p class="title is-4 has-text-info">
                                    Totales
                                </p>
                                S/{{ balance.totals.all_totals }}
                            </div>
                            <div class="column has-text-danger">
                                <p class="title is-4 has-text-danger">
                                    Total Pagados
                                </p>
                                S/ {{ balance.totals.all_totals_payment }}
                            </div>
                        </div>
                        <div class="card-content">
                            <x-graph type="doughnut" :all-data="balance.graph"></x-graph>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card has-background-info has-text-white-ter" v-show="!loaders.balance">

                    <div class="card-content">
                        <p class="title is-4 has-text-white-ter">
                            Balance Ventas
                        </p>

                        <p><span class="custom-badge">T. Pagos Ventas - T. Pagos Compras/Gastos</span></p>
                        <p>Total pagos comprobantes:<span class="custom-badge pull-right">S/ {{
                                balance.totals.total_payment_document
                        }}</span></p>
                        <p>Total pagos notas de venta:<span class="custom-badge pull-right">S/ {{
                                balance.totals.total_payment_sale_note
                        }}</span></p>
                        <p>Total pagos compras:<span class="custom-badge pull-right">- S/ {{
                                balance.totals.total_payment_purchase
                        }}</span></p>
                        <p>Total pagos gastos:<span class="custom-badge pull-right">- S/ {{
                                balance.totals.total_payment_expense
                        }}</span></p>
                    </div>
                </div>
                <div class="card has-background-danger has-text-white-ter" v-show="!loaders.balance">

                    <div class="card-content">
                        <p class="title is-4 has-text-white-ter">
                            Balance Compras - Gastos
                        </p>

                        <p><span class="custom-badge">T. Pagos Ventas - T. Pagos
                                Compras/Gastos</span></p>
                        <p>Total pagos comprobantes:<span class="custom-badge pull-right">S/ {{
                                balance.totals.total_payment_document
                        }}</span>
                        </p>
                        <p>Total pagos notas de venta:<span class="custom-badge pull-right">S/ {{
                                balance.totals.total_payment_sale_note
                        }}</span>
                        </p>
                        <p>Total pagos compras:<span class="custom-badge pull-right">- S/ {{
                                balance.totals.total_payment_purchase
                        }}</span>
                        </p>
                        <p>Total pagos gastos:<span class="custom-badge pull-right">- S/ {{
                                balance.totals.total_payment_expense
                        }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card" v-show="!loaders.sale_note">
                    <div class="card-content">
                        <p class="subtitle">
                            Utilidad/Ganancias
                        </p>
                        <div class="columns">
                            <div class="column has-text-info">
                                <p class="title is-4 has-text-info">
                                    Ingreso
                                </p>
                                S/ {{ utilities.totals.total_income }}
                            </div>
                            <div class="column has-text-danger">
                                <p class="title is-4 has-text-danger">
                                    Egreso
                                </p>
                                S/ {{ utilities.totals.total_egress }}
                            </div>
                            <div class="column">
                                <p class="title is-4">
                                    Utilidad
                                </p>
                                S/ {{ utilities.totals.utility }}
                            </div>
                        </div>
                        <div>
                            <b-checkbox v-model="form.enabled_expense" @change="loadDataUtilities">Considerar gastos
                            </b-checkbox>
                            <b-checkbox v-model="filter_item" @change="changeFilterItem">Filtrar por producto
                            </b-checkbox>
                        </div>
                        <div v-if="filter_item">
                            <el-select v-model="form.item_id" filterable remote popper-class="el-select-customers"
                                clearable placeholder="Buscar producto" :remote-method="searchRemoteItems"
                                :loading="loading_search" @change="loadDataUtilities">
                                <el-option v-for="option in items" :key="option.id" :value="option.id"
                                    :label="option.description">
                                </el-option>
                            </el-select>
                        </div>
                        <div class="card-content">
                            <x-graph type="doughnut" :all-data="utilities.graph"></x-graph>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column" v-show="!loaders.purchase">
                <div class="card">
                    <div class="card-content">
                        <p class="subtitle">
                            Compras
                        </p>
                        <div class="columns">
                            <div class="column has-text-danger">
                                <p class="title is-4 has-text-danger">
                                    Totol Percepciones
                                </p>
                                S/ {{ purchase.totals.purchases_total_perception }}
                            </div>
                            <div class="column has-text-info">
                                <p class="title is-4 has-text-info">
                                    Total Compras
                                </p>
                                S/ {{ purchase.totals.purchases_total }}
                            </div>
                            <div class="column">
                                <p class="title is-4">
                                    Total
                                </p>
                                S/ {{ purchase.totals.total }}
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <x-graph-line :all-data="purchase.graph"></x-graph-line>
                    </div>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <p class="subtitle">
                            Ventas de Productos
                        </p>
                        <el-checkbox v-model="form.enabled_move_item" @change="loadDataAditional">
                            Ordenar por movimientos</el-checkbox>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th class="text-right">
                                        Cantidad vendida
                                    </th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(row, index) in items_by_sales">
                                    <tr :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ row.internal_id }}</td>
                                        <td>{{ row.description }}</td>
                                        <td class="text-right">{{ row.move_quantity }}</td>
                                        <td class="text-right">{{ row.total }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <p class="subtitle">
                            Mejores Clientes
                        </p>
                        <el-checkbox v-model="form.enabled_transaction_customer" @change="loadDataAditional">Ordenar por
                            transacciones</el-checkbox>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th class="text-right">
                                        Cantidad Trans.
                                    </th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(row, index) in top_customers">
                                    <tr :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>
                                            {{ row.name }}
                                            <br />
                                            <small v-text="row.number"></small>
                                        </td>
                                        <td class="text-right">{{ row.transaction_quantity }}</td>
                                        <td class="text-right">{{ row.total }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <div class="column is-half">
                <dashboard-stock></dashboard-stock>
            </div>
        </div>
    </div>
</template>
<style>

.widget-summary .summary {
    min-height: inherit;
}

.custom-badge {
    font-size: 15px;
    font-weight: bold;
}
</style>
<script>
// import DocumentPayments from "../../../../../../resources/js/views/tenant/documents/partials/payments.vue";
// import SaleNotePayments from "../../../../../../resources/js/views/tenant/sale_notes/partials/payments.vue";
import DashboardStock from "./partials/dashboard_stock.vue";
import queryString from "query-string";
import LoaderGraph from "../components/loaders/l-graph.vue";

export default {
    props: ["typeUser", "soapCompany"],
    components: { DashboardStock, LoaderGraph },
    data() {
        return {
            loading_search: false,
            records_base: [],
            selected_customer: null,
            customers: [],
            resource: "dashboard",
            establishments: [],
            balance: {
                totals: {},
                graph: {}
            },
            document: {
                totals: {},
                graph: {}
            },
            sale_note: {
                totals: {},
                graph: {}
            },
            general: {
                totals: {},
                graph: {}
            },
            purchase: {
                totals: {},
                graph: {}
            },
            utilities: {
                totals: {},
                graph: {}
            },
            form: {},
            documents_quantity: 0,
            pickerOptionsDates: {
                disabledDate: time => {
                    time = moment(time).format("YYYY-MM-DD");
                    return this.form.date_start > time;
                }
            },
            pickerOptionsMonths: {
                disabledDate: time => {
                    time = moment(time).format("YYYY-MM");
                    return this.form.month_start > time;
                }
            },
            records: [],
            items_by_sales: [],
            top_customers: [],
            recordId: null,
            showDialogDocumentPayments: false,
            showDialogSaleNotePayments: false,
            filter_item: false,
            all_items: [],
            items: [],
            company: {},
            loaders: {}
        };
    },
    async created() {
        this.initForm();
        this.initLoaders()
        await this.$http.get(`/${this.resource}/filter`).then(response => {
            this.establishments = response.data.establishments;
            this.form.establishment_id =
                this.establishments.length > 0 ? this.establishments[0].id : null;
        });
        await this.loadAll();
        await this.filterItems()

        // this.$eventHub.$on("reloadDataUnpaid", () => {
        //   this.loadAll();
        // });
    },

    methods: {
        changeFilterItem() {
            this.form.item_id = null
            this.loadDataUtilities()
        },
        searchRemoteItems(input) {

            if (input.length > 1) {

                this.loading_search = true
                let parameters = `input=${input}`


                this.$http.get(`/reports/data-table/items/?${parameters}`)
                    .then(response => {
                        this.items = response.data.items
                        this.loading_search = false

                        if (this.items.length == 0) {
                            this.filterItems()
                        }
                    })
            } else {
                this.filterItems()
            }

        },
        filterItems() {
            this.items = this.all_items
        },
        calculateTotalCurrency(currency_type_id, exchange_rate_sale, total) {
            if (currency_type_id == 'USD') {
                return parseFloat(total) * exchange_rate_sale;
            }
            else {
                return parseFloat(total);
            }
        },
        clickDownloadDispatch(download) {
            window.open(download, "_blank");
        },
        clickDownload(type) {
            let query = queryString.stringify({
                ...this.form
            });
            window.open(`/reports/no_paid/${type}/?${query}`, "_blank");
        },
        initForm() {
            this.form = {
                item_id: null,
                establishment_id: null,
                enabled_expense: null,
                enabled_move_item: false,
                enabled_transaction_customer: false,
                period: "month",
                date_start: moment().format("YYYY-MM-DD"),
                date_end: moment().format("YYYY-MM-DD"),
                month_start: moment().format("YYYY-MM"),
                month_end: moment().format("YYYY-MM"),
                customer_id: null
            };
        },
        changeDisabledDates() {
            if (this.form.date_end < this.form.date_start) {
                this.form.date_end = this.form.date_start;
            }
            this.loadAll();
        },
        changeDisabledMonths() {
            if (this.form.month_end < this.form.month_start) {
                this.form.month_end = this.form.month_start;
            }
            this.loadAll();
        },
        changePeriod() {
            if (this.form.period === "month") {
                this.form.month_start = moment().format("YYYY-MM");
                this.form.month_end = moment().format("YYYY-MM");
            }
            if (this.form.period === "between_months") {
                this.form.month_start = moment()
                    .startOf("year")
                    .format("YYYY-MM"); //'2019-01';
                this.form.month_end = moment()
                    .endOf("year")
                    .format("YYYY-MM");
            }
            if (this.form.period === "date") {
                this.form.date_start = moment().format("YYYY-MM-DD");
                this.form.date_end = moment().format("YYYY-MM-DD");
            }
            if (this.form.period === "between_dates") {
                this.form.date_start = moment()
                    .startOf("month")
                    .format("YYYY-MM-DD");
                this.form.date_end = moment()
                    .endOf("month")
                    .format("YYYY-MM-DD");
            }
            this.loadAll();
        },
        loadAll() {
            this.loadData();
            // this.loadUnpaid();
            this.loadDataAditional();
            this.loadDataUtilities();
            //this.loadCustomer();
            this.loadCompany();
            this.changeStock()
        },
        changeStock() {

            this.$eventHub.$emit('changeStock', this.form.establishment_id)

        },
        loadCompany() {
            this.$http.get(`/companies/record`).then(response => {
                this.company = response.data.data
            });
        },
        initLoaders() {

            this.loaders = {
                document: true,
                sale_note: true,
                general: true,
                balance: true,
                utility: true,
                purchase: true,
                items_by_sales: true,
                top_customers: true,
            }

        },
        showLoadersLoadData() {

            this.loaders.document = true
            this.loaders.sale_note = true
            this.loaders.general = true
            this.loaders.balance = true

        },
        hideLoadersLoadData() {

            this.loaders.document = false
            this.loaders.sale_note = false
            this.loaders.general = false
            this.loaders.balance = false

        },
        loadData() {

            this.showLoadersLoadData()

            this.$http.post(`/${this.resource}/data`, this.form).then(response => {

                this.document = response.data.data.document;
                this.documents_quantity = response.data.data.quantity;
                this.balance = response.data.data.balance;
                this.sale_note = response.data.data.sale_note;
                this.general = response.data.data.general;
                this.customers = response.data.data.customers;
                this.items = response.data.data.items;
                this.hideLoadersLoadData()

            });

        },
        loadDataAditional() {

            this.showLoadersLoadDataAditional()

            this.$http
                .post(`/${this.resource}/data_aditional`, this.form)
                .then(response => {
                    this.purchase = response.data.data.purchase;
                    this.items_by_sales = response.data.data.items_by_sales;
                    this.top_customers = response.data.data.top_customers;
                    this.hideLoadersLoadDataAditional()
                })

        },
        loadDataUtilities() {

            this.loaders.utility = true

            this.$http
                .post(`/${this.resource}/utilities`, this.form)
                .then(response => {
                    this.utilities = response.data.data.utilities;
                    this.loaders.utility = false
                });

        },
        showLoadersLoadDataAditional() {

            this.loaders.purchase = true
            this.loaders.items_by_sales = true
            this.loaders.top_customers = true

        },
        hideLoadersLoadDataAditional() {

            this.loaders.purchase = false
            this.loaders.items_by_sales = false
            this.loaders.top_customers = false

        },
    }
};
</script>
