<template>
    <div>
        <div class="row ">

            <div class="col-md-12 col-lg-12 col-xl-12 ">

                <div class="row">
                    <div class="col-lg-8 col-md-8 mb-2">
                        <b-button label="Filtro de Documentos" type="is-primary" size="is-small"
                            @click="setModal()" />
                        <div class="modal" v-bind:class="{ 'modal is-active': isOpenModal }">
                            <div class="modal-background"></div>
                            <div class="modal-card">
                                <header class="modal-card-head">
                                    <p class="modal-card-title">Buscar Comprobantes</p>
                                    <button @click="setModal()" class="delete" aria-label="close"></button>
                                </header>
                                <section class="modal-card-body">
                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label class="label">Comprobante</label>
                                                    <el-select v-model="search.document_type_id"
                                                        @change="changeDocumentType"
                                                        popper-class="el-select-document_type" filterable clearable>
                                                        <el-option v-for="option in document_types" :key="option.id"
                                                            :value="option.id" :label="option.description"></el-option>
                                                    </el-select>
                                                </p>
                                            </div>
                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label class="label">Serie</label>
                                                    <el-select v-model="search.series" filterable clearable>
                                                        <el-option v-for="option in series" :key="option.number"
                                                            :value="option.number" :label="option.number"></el-option>
                                                    </el-select>
                                                </p>
                                            </div>

                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label class="label">Numero</label>
                                                    <el-input placeholder="Ingresar" v-model="search.number">
                                                    </el-input>
                                                </p>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label for="" class="label">Fecha Inicio</label>
                                                    <el-date-picker v-model="search.d_start" type="date"
                                                        style="width: 100%;" placeholder="Buscar"
                                                        value-format="yyyy-MM-dd" @change="changeDisabledDates">
                                                    </el-date-picker>
                                                </p>
                                            </div>

                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label for="" class="label">Fecha Fin</label>
                                                    <el-date-picker v-model="search.d_end" type="date"
                                                        style="width: 100%;" placeholder="Buscar"
                                                        value-format="yyyy-MM-dd" :picker-options="pickerOptionsDates"
                                                        @change="changeEndDate">
                                                    </el-date-picker>
                                                </p>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label class="label">Tipo de Comprobante</label>
                                                    <el-select v-model="search.document_type_id"
                                                        @change="changeDocumentType"
                                                        popper-class="el-select-document_type" filterable clearable>
                                                        <el-option v-for="option in document_types" :key="option.id"
                                                            :value="option.id" :label="option.description"></el-option>
                                                    </el-select>
                                                </p>
                                            </div>

                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label class="label">Serie</label>
                                                    <el-select v-model="search.series" filterable clearable>
                                                        <el-option v-for="option in series" :key="option.number"
                                                            :value="option.number" :label="option.number"></el-option>
                                                    </el-select>
                                                </p>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label class="label">Clientes</label>

                                                    <el-select v-model="search.customer_id" filterable remote
                                                        popper-class="el-select-customers" clearable
                                                        placeholder="Nombre o n??mero de documento"
                                                        :remote-method="searchRemoteCustomers"
                                                        :loading="loading_search">
                                                        <el-option v-for="option in customers" :key="option.id"
                                                            :value="option.id" :label="option.description"></el-option>
                                                    </el-select>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label class="label">Productos</label>
                                                    <el-select v-model="search.item_id" filterable remote
                                                        popper-class="el-select-customers" clearable
                                                        placeholder="Nombre o c??digo interno"
                                                        :remote-method="searchRemoteItems"
                                                        :loading="loading_search_item">
                                                        <el-option v-for="option in items" :key="option.id"
                                                            :value="option.id" :label="option.description"></el-option>
                                                    </el-select>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label for="" class="label">Categor??a</label>

                                                    <el-select v-model="search.category_id" filterable clearable>
                                                        <el-option v-for="option in categories" :key="option.id"
                                                            :value="option.id" :label="option.name"></el-option>
                                                    </el-select>

                                                </p>
                                            </div>
                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label for="" class="label">Fecha Emisi??n</label>

                                                    <el-date-picker v-model="search.date_of_issue" type="date"
                                                        style="width: 100%;" placeholder="Buscar"
                                                        value-format="yyyy-MM-dd" @change="changeDateOfIssue">
                                                    </el-date-picker>


                                                </p>
                                            </div>
                                            <div class="field">
                                                <p class="control is-expanded">
                                                    <label class="label">Estado</label>
                                                    <el-select v-model="search.state_type_id" filterable clearable>
                                                        <el-option v-for="option in state_types" :key="option.id"
                                                            :value="option.id" :label="option.description"></el-option>
                                                    </el-select>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <p class="control is-expanded">
                                                <el-checkbox v-model="search.pending_payment">Pendiente de Pago
                                                </el-checkbox>
                                            </p>
                                        </div>
                                    </div>
                                </section>
                                <footer class="modal-card-foot">
                                    <el-button class="submit" type="primary" @click.prevent="getRecordsByFilter"
                                        :loading="loading_submit" icon="el-icon-search">Buscar</el-button>
                                    <el-button class="submit" type="info" @click.prevent="cleanInputs"
                                        icon="el-icon-delete">Limpar Busqueda
                                    </el-button>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div id="scroll1" style="overflow-x:auto;">
                    <div style="height: 20px;"></div>
                </div>
                <div class="table-responsive" id="scroll2" style="overflow-x:auto;">
                    <table class="table">
                        <thead>
                            <slot name="heading"></slot>
                        </thead>
                        <tbody>
                            <slot v-for="(row, index) in records" :row="row" :index="customIndex(index)"></slot>
                        </tbody>
                    </table>
                    <div>
                        <el-pagination @current-change="getRecords" layout="total, prev, pager, next"
                            :total="pagination.total" :current-page.sync="pagination.current_page"
                            :page-size="pagination.per_page">
                        </el-pagination>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<style>
.font-custom {
    font-size: 15px !important
}
</style>
<script>

import moment from 'moment'
import queryString from 'query-string'
import $ from 'jquery'

export default {
    props: {
        resource: String,
    },
    data() {
        return {
            isOpenModal: false,
            loading_submit: false,
            columns: [],
            records: [],
            customers: [],
            all_customers: [],
            items: [],
            all_items: [],
            loading_search: false,
            loading_search_item: false,
            document_types: [],
            categories: [],
            state_types: [],
            pagination: {},
            search: {},
            all_series: [],
            establishment: null,
            establishments: [],
            series: [],
            activePanel: 0,
            see_more: false,
            pickerOptionsDates: {
                disabledDate: (time) => {
                    time = moment(time).format('YYYY-MM-DD')
                    return this.search.d_start > time
                }
            },
        }
    },
    computed: {
    },
    created() {
        this.initForm()
        this.$eventHub.$on('reloadData', () => {
            this.getRecords()
        })
    },
    async mounted() {

        await this.$http.get(`/${this.resource}/data_table`).then((response) => {
            this.all_customers = response.data.customers
            this.all_items = response.data.items
            this.categories = response.data.categories
            this.state_types = response.data.state_types
            this.document_types = response.data.document_types
            this.all_series = response.data.series
            this.establishments = response.data.establishments

        });

        await this.getRecords()
        await this.filterCustomers()
        await this.filterItems()

        await this.cargalo()
    },
    methods: {
        setModal() {
            this.isOpenModal = !this.isOpenModal
        },
        searchRemoteItems(input) {

            if (input.length > 0) {

                this.loading_search = true
                let parameters = `input=${input}`

                this.$http.get(`/documents/data-table/items?${parameters}`)
                    .then(response => {
                        // console.log(response.data)
                        this.items = response.data
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
        searchRemoteCustomers(input) {

            if (input.length > 0) {

                this.loading_search = true
                let parameters = `input=${input}`

                this.$http.get(`/documents/data-table/customers?${parameters}`)
                    .then(response => {
                        this.customers = response.data.customers
                        this.loading_search = false

                        if (this.customers.length == 0) {
                            this.filterCustomers()
                        }
                    })
            } else {
                this.filterCustomers()
            }

        },
        filterCustomers() {
            this.customers = this.all_customers
        },
        clickSeeMore() {
            this.see_more = (this.see_more) ? false : true
        },
        initForm() {

            this.search = {
                date_of_issue: null,
                document_type_id: null,
                customer_id: null,
                item_id: null,
                category_id: null,
                state_type_id: null,
                series: null,
                number: null,
                d_start: null,
                d_end: null,
                pending_payment: false,
            }
        },
        changeDocumentType() {
            this.filterSeries();
        },
        filterSeries() {
            this.search.series = null
            this.series = _.filter(this.all_series, { 'document_type_id': this.search.document_type_id });
            this.search.series = (this.series.length > 0) ? this.series[0].number : null
        },
        customIndex(index) {
            return (this.pagination.per_page * (this.pagination.current_page - 1)) + index + 1
        },
        async getRecordsByFilter() {

            this.loading_submit = await true
            await this.getRecords()
            this.loading_submit = await false

        },
        getRecords() {
            return this.$http.get(`/${this.resource}/records?${this.getQueryParameters()}`).then((response) => {
                this.records = response.data.data
                this.pagination = response.data.meta
                this.pagination.per_page = parseInt(response.data.meta.per_page)
                this.loading_submit = false
            });

        },
        getQueryParameters() {
            return queryString.stringify({
                page: this.pagination.current_page,
                limit: this.limit,
                ...this.search
            })
        },
        changeClearInput() {
            this.search.value = ''
            // this.getRecords()
        },
        changeDisabledDates() {
            this.search.date_of_issue = null
            if (this.search.d_end < this.search.d_start) {
                this.search.d_end = this.search.d_start
            }
        },
        changeDateOfIssue() {
            this.search.d_start = null
            this.search.d_end = null
        },
        changeEndDate() {
            this.search.date_of_issue = null
        },
        cleanInputs() {
            this.initForm()
        },
        cargalo() {
            $("#scroll1 div").width($(".table").width());
            $("#scroll1").on("scroll", function () {
                $("#scroll2").scrollLeft($(this).scrollLeft());
            });
            $("#scroll2").on("scroll", function () {
                $("#scroll1").scrollLeft($(this).scrollLeft());
            });
        }
    }
}
</script>
