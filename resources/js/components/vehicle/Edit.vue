<template>
<div>
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fa fa-pencil"></i> Edit Vehicle
        </div>
        <div class="card-body" style="padding:30px; margin:0;">
            <form autocomplete="off" v-on:submit="saveForm()">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">CR No.</label>
                        <input type="text" class="form-control" v-model="data.cr_no"  required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">My File No.</label>
                        <input type="text" class="form-control" v-model="data.my_file_no" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Plate No.</label>
                        <input type="text" class="form-control" v-model="data.plate_no" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Engine No.</label>
                        <input type="text" class="form-control" v-model="data.engine_no" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Chassis No.</label>
                        <input type="text" class="form-control" v-model="data.chassis_no" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Denomination</label>
                        <input type="text" class="form-control" v-model="data.denomination" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Pistion Displacement</label>
                        <input type="text" class="form-control" v-model="data.pistion_displacement" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">No. of Cylinders</label>
                        <input type="text" class="form-control" v-model="data.no_of_cylinders" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Fuel</label>
                        <input type="text" class="form-control" v-model="data.fuel" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Make</label>
                        <input type="text" class="form-control" v-model="data.make" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Series</label>
                        <input type="text" class="form-control" v-model="data.series" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Body Type</label>
                        <input type="text" class="form-control" v-model="data.body_type" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlInput1">Body No.</label>
                        <input type="text" class="form-control" v-model="data.body_no" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlInput1">Year Model</label>
                        <select class="form-control" v-model="data.year_model">
                            <option v-for="year_option in year_options" :key="year_option.value" v-bind:value="year_option.value">{{ year_option.text }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlInput1">Gross Wt.</label>
                        <input type="number" class="form-control" v-model="data.gross_wt" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlInput1">Net Wt.</label>
                        <input type="number" class="form-control" v-model="data.net_wt" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Shipping Wt.</label>
                        <input type="number" class="form-control" v-model="data.shipping_wt" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Net Capacity</label>
                        <input type="number" class="form-control" v-model="data.net_capacity" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">OR No.</label>
                        <input type="text" class="form-control" v-model="data.or_no" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">OR Date</label>
                        <input type="date" class="form-control" v-model="data.or_date" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Expiration Date</label>
                        <input type="date" class="form-control" v-model="data.expiration_date" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Amount</label>
                        <input type="number" class="form-control" v-model="data.amount" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Owner's FullName</label>
                        <input type="text" class="form-control" v-on:keyup="showMembers" v-model="data.full_name" required>
                        <input type="hidden" v-model="data.owners_name">
                        </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Owner's Number</label>
                        <input type="text" class="form-control" v-model="data.owners_number" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Complete Address</label>
                        <textarea class="form-control" v-model="data.complete_address" rows="3"></textarea>
                    </div> -->
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <modal name="members-modal" height="auto" :scrollable="true">
        <div class="card" >
            <div class="card-header">
                License list
                <div style="float:right" class="search-wrapper panel-heading col-sm-4">
                    <input class="form-control" v-model="inputSearchMessage" ref="search" type="text" placeholder="Search" v-focus />
                </div>
            </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data) in searchResult" :key="data.id">
                                <td @click="selectOwner(data)" style="cursor:pointer">{{data.full_name}}</td>
                                    <td @click="selectOwner(data)" style="cursor:pointer">{{data.license_no}}</td>
                                    <td @click="selectOwner(data)" style="cursor:pointer">{{data.contact_number}}</td>
                                    <td @click="selectOwner(data)" style="cursor:pointer">{{data.registration_date}}</td>
                                    <td @click="selectOwner(data)" style="cursor:pointer">{{data.expiration_date}}</td>

                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </modal>
    
</div>
</template>

<script>
export default {
    mounted() {
        let app = this;
        app.yearOptions();
        let id = app.$route.params.id;
        axios
            .get("/vehicle/edit/" + id)
            .then(function (resp) {
                app.data = resp.data.record;
            })
            .catch(function () {
                alert("Could not load vehicle");
            });
    },
    data: function () {
        return {
            inputSearchMessage: "",
            members: [],
            data: {
                cr_no: "",
                my_file_no: "",
                plate_no: "",
                engine_no: "",
                chassis_no: "",
                denomination: "",
                pistion_displacement: "",
                no_of_cylinders: "",
                fuel: "",
                make: "",
                series: "",
                body_type: "",
                body_no: "",
                year_model: "2019",
                gross_wt: null,
                net_wt: null,
                shipping_wt: null,
                net_capacity: null,
                owners_name: 0,
                full_name:"",
                or_no: "",
                or_date: null,
                expiration_date: null,
                amount: null,
                complete_address: "",
                owners_number: ""
            },
            year_options: [],
        };
    },
    computed: {

        searchResult: function () {
            var self = this;
            return this.members.filter(item => {
                return (
                    (
                        item.full_name +
                        " " +
                        item.license_no +
                        " " +
                        item.contact_number +
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
        yearOptions() {
            let app = this;
            var current_year = 2019;
            var started_year = 1990;
            var year = {
                text: 1994,
                value: 1994
            }

            for (current_year = 2019; started_year < current_year; current_year--) {
                year = {
                    text: current_year,
                    value: current_year,
                }
                app.year_options.push(year);
            }
        },
        saveForm() {
            event.preventDefault();
            var app = this;
            var data = app.data;

            if(app.data.owners_name == 0){
                alert("Please Select Owner");
                return;
            }

            axios
                .post("/vehicle/update", data)
                .then(function (resp) {
                    console.log(resp);
                    if (resp.data == 'failed') {
                        alert("Could not Update: Updated plate number exist!");
                    } else {
                        app.$router.push("/vehicle/profile/"+data.id);
                    }

                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not create vehicle");
                });
        },
         showMembers() {
            var app = this;

            app.inputSearchMessage = app.data.full_name;
            app.memberList();
            this.$modal.show("members-modal");
        },
        hide() {
            this.$modal.hide("members-modal");
        },
        selectOwner(data) {
            var app = this;

            app.data.owners_name = data.id;
            app.data.full_name = data.full_name;
            app.hide();
        },
        memberList() {
            var app = this;
            app.isLoading = true;
            axios
                .get("/license/list/")
                .then(function (resp) {
                    app.members = resp.data.records;
                    app.isLoading = false;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load vehicles");
                    app.isLoading = false;
                });
        },
    }
};
</script>

<style>
.card-header>.btn {
    margin-top: 1px !important;
}
</style>
