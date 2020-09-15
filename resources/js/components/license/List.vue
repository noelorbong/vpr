<template>
<div>
    <div class="row">
        <div class="col-sm-6">
            <h1>Registered License</h1>
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
                                    <th>Full Name</th>
                                    <th>License Number</th>
                                    <th>Mobile</th>
                                    <th>Registration Date</th>
                                    <th>Expiration Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(data) in searchResult" :key="data.id">
                                    <td @click="goToProfile(data.id)" style="cursor:pointer">{{data.full_name}}</td>
                                    <td @click="goToProfile(data.id)" style="cursor:pointer">{{data.license_no}}</td>
                                    <td @click="goToProfile(data.id)" style="cursor:pointer">{{data.contact_number}}</td>
                                    <td @click="goToProfile(data.id)" style="cursor:pointer">{{data.registration_date}}</td>
                                    <td @click="goToProfile(data.id)" style="cursor:pointer">{{data.expiration_date}}</td>

                                    <td align="right">
                                        <router-link :to="{name: 'LicenseEdit' , params: {id: data.id}}" class="btn btn-orange  btn-sm">
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
                        item.license_no +
                        " " +
                        item.complete_address +
                        " " +
                        item.registration_date +
                        " " +
                        item.expiration_date
                    )
                    .toLowerCase()
                    .indexOf(this.inputSearchMessage.toLowerCase()) > -1
                );
            });
        }
    },
    methods: {
        goToProfile(id) {
            this.$router.push({
                name: "LicenseProfile",
                params: {
                    id: id
                }
            });
        },
        getRecords() {
            var app = this;
            app.isLoading = true;
            axios
                .get("/license/list/")
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
                    .delete("/license/delete/" + id)
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
