<template>
    <div>
        <section class="hero is-primary is-rounded">
            <div class="hero-body">
                <p class="title">
                    Consulta Kardex
                </p>
            </div>
        </section>
        <div class="card mb-0">
            <!-- <div class="card-header bg-success">
            <h3 class="my-0">Consulta kardex asd</h3>
        </div> -->
            <div class="card-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12  ">
                        <el-tabs v-model="activeName">
                            <el-tab-pane label="General" name="first">
                                <tenant-report-kardex-index></tenant-report-kardex-index>
                            </el-tab-pane>
                            <el-tab-pane label="Por Lotes" name="second">
                                <tenant-report-kardex-lots></tenant-report-kardex-lots>
                            </el-tab-pane>
                            <el-tab-pane label="Por series" name="third">
                                <tenant-report-kardex-series></tenant-report-kardex-series>
                            </el-tab-pane>
                        </el-tabs>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    data() {
        return {
            activeName: "first"
        };
    }
};
</script>
