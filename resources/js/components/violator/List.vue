<template>
<div>
    <div class="row">
        <div class="col-sm-6">
            <h1>Violators</h1>
        </div>
        <div class="col-sm-2">
        </div>
        <div class="search-wrapper col-sm-4">
            <input class="form-control" type="text" v-model="inputSearchMessage" placeholder="Search" />
        </div>
    </div>
    <div class="row mb-5">

        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Driver Name</th>
                                    <th>Plate No</th>
                                    <th>Vehicle Owner</th>
                                    <th>Violation</th>
                                    <th>Fine</th>
                                    <th>Date Violated</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(data) in searchResult" :key="data.id">
                                    <td @click="goToLicense(data.license_id)" style="cursor:pointer">{{data.full_name}}</td>
                                    <td @click="goToVehicle(data.vehicle_id)" style="cursor:pointer" >{{data.plate_no}}</td>
                                    <td >{{data.owners_name}}</td>
                                    <td >{{data.title}}</td>
                                    <td >{{data.fine}}</td>
                                    <td >{{data.date_violated}} {{data.time_violated}}</td>

                                    <td align="right">
                                        <router-link :to="{name: 'ViolatorEdit' , params: {id: data.id}}" class="btn btn-orange  btn-sm">
                                            <i class="nav-icon fa fa-pencil"></i> Edit
                                        </router-link>

                                        <!-- <button type="button" class="btn btn-orange  btn-sm">Edit</button> -->
                                        <button @click="deleteEntry(data.id)" class="btn btn-danger active btn-sm">Delete</button>

                                    </td>

                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            inputSearchMessage: "",
            startdate: "",
            enddate: "",
            reports: [],
            isLoading: false,
            fullPage: true,
            loader: "dots",
            loaderColor: "rgb(255,0,0)",
            reportcount: 0
        };
    },
    created: function () {
        this.getRecords();
    },
    computed: {
        searchResult: function () {
            var self = this;
            return this.reports.filter(item => {
                return (
                    (
                        item.full_name +
                        " " +
                        item.plate_no +
                        " " +
                        item.owners_name +
                        " " +
                        
                        item.title +
                        " " +
                        item.fine +
                        " " +
                        item.date_violated+
                        " " +
                        item.time_violated
                    )
                    .toLowerCase()
                    .indexOf(this.inputSearchMessage.toLowerCase()) > -1
                );
            });
        }
    },
    methods: {
        goToLicense(id) {
            this.$router.push({
                name: "LicenseProfile",
                params: {
                    id: id
                }
            });
        },
        goToVehicle(id) {
            this.$router.push({
                name: "VehicleProfile",
                params: {
                    id: id
                }
            });
        },
        getRecords() {
            var app = this;
            app.isLoading = true;
            axios
                .get("/violator/list/")
                .then(function (resp) {
                    app.reports = resp.data.records;

                    app.isLoading = false;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load users");
                    app.isLoading = false;
                });
        },
        deleteEntry(id) {
            if (confirm("Do you really want to delete it?")) {
                var app = this;
                axios
                    .delete("/violator/delete/" + id)
                    .then(function (resp) {
                        var index = app.reports
                            .map(x => {
                                return x.id;
                            })
                            .indexOf(id);
                        app.reports.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert("Could not delete");
                    });
            }
        },

    }
};
</script>

<style lang='scss' scoped>

</style>
