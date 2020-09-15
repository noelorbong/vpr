<template>
<div>
    <div class="row">
        <div class="col-sm-6">
            <h1>Missing Vehicles</h1>
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
                                    <th>Plate Number</th>
                                    <th>Vehicle Model</th>
                                    <th>Owner Name</th>
                                    <th>Date Missing</th>
                                    <th>Missing Note</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(data) in searchResult" :key="data.id">
                                    <td>{{data.plate_no}}</td>
                                    <td>{{data.make}}</td>
                                    <td>{{data.full_name}}</td>
                                    <td>{{data.date_missing}}</td>
                                    <td>{{data.missing_note}}</td>

                                    <td align="right">
                                        <!-- <router-link :to="{name: 'MissingEdit' , params: {id: data.missing_vehicles_id}}" class="btn btn-orange  btn-sm">
                                            <i class="nav-icon fa fa-pencil"></i> Edit
                                        </router-link> -->

                                        <!-- <button type="button" class="btn btn-orange  btn-sm">Edit</button> -->
                                        <button @click="deleteEntry(data.missing_vehicles_id,data.id)" class="btn btn-danger active btn-sm">Delete</button>
                                        <button @click="showFound(data)" class="btn btn-success active btn-sm">Found</button>

                                    </td>

                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <modal name="found-modal" height="auto" :scrollable="true">
        <div class="card" >
            <div class="card-header">
                Found Vehicle
            </div>
            <div class="card-body">
                <form autocomplete="off" v-on:submit="saveForm()">
                <div class="form-row">
                    <div class="form-group  col-md-8">
                        <label for="exampleFormControlInput1">Vehicle Plate</label>
                        <input type="text" class="form-control" v-model="data.vehicle_plate" readonly>
                        <input type="hidden" v-model="data.vehicle_id">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="exampleFormControlInput1">Date Missing</label>
                        <input type="date" class="form-control" v-model="data.date_found" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Note</label>
                        <textarea class="form-control" v-model="data.found_note" rows="2" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </modal>

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
            data: {
                id:0,
                vehicle_id: 0,
                vehicle_plate:"",
                date_found: null,
                found_note: ""
            },
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
                        item.plate_no +
                        " " +
                        item.make +
                        " " +
                        item.full_name +
                        " " +
                        item.date_missing +
                        " " +
                        item.missing_note
                    )
                    .toLowerCase()
                    .indexOf(this.inputSearchMessage.toLowerCase()) > -1
                );
            });
        }
    },
    methods: {
        getRecords() {
            var app = this;
            app.isLoading = true;
            axios
                .get("/missing/list/")
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
        saveForm() {
            event.preventDefault();
            var app = this;
            var data = app.data;
            var id = app.data.vehicle_id;
            axios
                .post("/missing/update/found", data)
                .then(function (resp) {
                    console.log(resp);
                    var index = app.reports
                            .map(x => {
                                return x.id;
                            })
                            .indexOf(id);
                        app.reports.splice(index, 1);

                        app.hide();
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Command Having trouble");
                });
        },
        showFound(data) {
            var app = this;
            app.data.id = data.missing_vehicles_id;
            app.data.vehicle_id = data.id;
            app.data.vehicle_plate = data.plate_no;
            this.$modal.show("found-modal");
        },
        hide() {
            this.$modal.hide("found-modal");
        },
        deleteEntry(id,vehicle_id) {
            if (confirm("Do you really want to delete it?")) {
                var app = this;
                axios
                    .delete("/missing/delete/" + id+"/"+vehicle_id)
                    .then(function (resp) {
                        var index = app.reports
                            .map(x => {
                                return x.id;
                            })
                            .indexOf(vehicle_id);
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
