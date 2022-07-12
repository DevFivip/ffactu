<template>
    <div class="card">
        <!-- <div class="card-header bg-success">
            <h3 class="my-0">Tareas programadas</h3>
        </div> -->
        <div class="card-content">
            <span class="title">Tareas Programadas</span>
            <div class="row">
                <div class="col">
                    <b-button type="is-primary"  @click.prevent="clickCreate()">Nueva</b-button>
                </div>
            </div>
            <template>
                <el-table :data="tableData" style="width: 100%">
                    <el-table-column label="Clase" prop="class"></el-table-column>
                    <el-table-column label="Hora de ejecución" prop="execution_time"></el-table-column>
                    <el-table-column label="Ultima ejecución" prop="updated_at"></el-table-column>
                    <el-table-column label="Log" prop="output"></el-table-column>
                    <el-table-column fixed="right" label="Acciones" width="120">
                        <template slot-scope="scope">
                            <el-button block size="mini" type="danger" @click="handleDelete(scope.$index, scope.row)">Eliminar</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </template>
        </div>
        <tenant-tasks-form :showDialog.sync="showDialog" :tableData.sync="tableData" @refresh="refresh"></tenant-tasks-form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                resource: 'tasks',
                showDialog: false,
                tableData: [],
            }
        },
        created() {
            this.refresh();
        },
        methods: {
            refresh() {
                axios.post(`/${this.resource}/tables`).then((response) => {
                    this.tableData = response.data;
                }).catch((error) => {
                    console.log(error);
                }).then(() => {});
            },
            handleDelete(index, row) {
                axios.delete(`/${this.resource}/${row.id}`).then((response) => {
                    if (response.data.success) {
                        this.$message.success(response.data.message);
                        this.tableData.splice(index, 1);
                    }
                    else {
                        this.$message.error(response.data.message);
                    }
                }).catch((error) => {
                    this.$message.error(error.response.data.message);
                }).then(() => {});
            },
            clickCreate() {
                this.showDialog = true;
            }
        }
    }
</script>
