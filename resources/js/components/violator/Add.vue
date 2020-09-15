<template>
<div>
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fa fa-plus"></i> Add Violator
        </div>
        <div class="card-body" style="padding:30px; margin:0;">
            <form autocomplete="off" v-on:submit="saveForm()">
                <div class="form-row">
                    <div class="form-group  col-md-4">
                        <label for="exampleFormControlInput1">Driver Name</label>
                        <input type="text" class="form-control" v-on:keyup="showOwners" v-model="data.full_name" required>
                        <input type="hidden" v-model="data.license_id">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="exampleFormControlInput1">Vehicle Plate</label>
                        <input type="text" class="form-control" v-on:keyup="showMembers" v-model="data.plate_no" required>
                        <input type="hidden" v-model="data.vehicle_id">
                    </div>
                    <div class="form-group  col-md-2">
                        <label for="exampleFormControlInput1">Date Violated</label>
                        <input type="date" class="form-control" v-model="data.date_violated" required>
                    </div>
                    <div class="form-group  col-md-2">
                        <label for="exampleFormControlInput1">Time Violated</label>
                        <input type="time" class="form-control" v-model="data.time_violated" required>
                    </div>
                    <div class="form-group  col-md-12">
                        <label for="exampleFormControlInput1">Violation</label>
                        <select class="form-control" v-model="data.violation">
                            <option v-for="violation in violations" :key="violation.id" v-bind:value="violation.id">{{ violation.title }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Note</label>
                        <textarea class="form-control" v-model="data.note" rows="2"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

    <modal name="members-modal" height="auto" :scrollable="true">
        <div class="card" style="height:80vh;">
            <div class="card-header">
                Vehicle list
                <div style="float:right" class="search-wrapper panel-heading col-sm-4">
                    <input class="form-control" v-model="inputSearchMessage" ref="search" type="text" placeholder="Search" v-focus />
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Plate Number</th>
                                <th>Vehicle Model</th>
                                <th>Owner Name</th>
                                <th>Contact</th>
                                <th>OR Date</th>
                                <th>Expiration Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data) in searchResult" :key="data.id">
                                <td @click="selectVehicle(data)">{{data.plate_no}}</td>
                                <td @click="selectVehicle(data)">{{data.make}}</td>
                                <td @click="selectVehicle(data)">{{data.full_name}}</td>
                                <td @click="selectVehicle(data)">{{data.contact_number}}</td>
                                <td @click="selectVehicle(data)">{{data.or_date}}</td>
                                <td @click="selectVehicle(data)">{{data.expiration_date}}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </modal>

     <modal name="owners-modal" height="auto" :scrollable="true">
        <div class="card" >
            <div class="card-header">
                License list
                <div style="float:right" class="search-wrapper panel-heading col-sm-4">
                    <input class="form-control" v-model="inputSearchOwner" ref="search" type="text" placeholder="Search" v-focus />
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
                            <tr v-for="(data) in searchOwner" :key="data.id">
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
    axios
      .get("/violation/list")
      .then(function(resp) {
        app.violations = resp.data.records;
      })
      .catch(function() {
        alert("Something Went Wrong");
      });
    },
    data: function () {
        return {
            inputSearchMessage: "",
            inputSearchOwner: "",
            vehicle_plate: "",
            members: [],
            owners: [],
            data: {
                full_name:"",
                license_id:0,
                plate_no:"",
                vehicle_id: 0,
                date_violated: null,
                time_violated:null,
                violation: 1,
            }
            ,violations:[]
        };
    },
    computed: {
        searchResult: function () {
            var self = this;
            return this.members.filter(item => {
                return (
                    (
                        item.plate_no +
                        " " +
                        item.make +
                        " " +
                        item.full_name +
                        " " +
                        item.contact_number +
                        " " +
                        item.or_date +
                        " " +
                        item.expiration_date
                    )
                    .toLowerCase()
                    .indexOf(this.inputSearchMessage.toLowerCase()) > -1
                );
            });
        },
         searchOwner: function () {
            var self = this;
            return this.owners.filter(item => {
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
                    .indexOf(this.inputSearchOwner.toLowerCase()) > -1
                );
            });
        }
    },
    methods: {
        saveForm() {
            event.preventDefault();
            var app = this;
            var data = app.data;
            if (app.data.vehicle_id == 0) {
                alert("Please Select Vehicle");
                return;
            }

            if (app.data.license_id == 0) {
                alert("Please Select Violator");
                return;
            }

            axios
                .post("/violator/store", data)
                .then(function (resp) {
                    console.log(resp);
                    // if (resp.data == 'failed') {
                    //     alert("Could not Register: License number exist!");
                    // }
                    app.$router.push("/violator/list");
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not create data");
                });
        },
        showMembers() {
            var app = this;

            app.inputSearchMessage = app.data.plate_no;
            app.memberList();
            this.$modal.show("members-modal");
        },
        hide() {
            this.$modal.hide("members-modal");
        },
        selectVehicle(data) {
            var app = this;

            app.data.vehicle_id = data.id;
            app.data.plate_no = data.plate_no;
            app.hide();
        },
        memberList() {
            var app = this;
            app.isLoading = true;
            axios
                .get("/vehicle/list")
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
        showOwners() {
            var app = this;

            app.inputSearchOwner = app.data.full_name;
            app.licenseList();
            this.$modal.show("owners-modal");
        },
        hideOwner() {
            this.$modal.hide("owners-modal");
        },
        selectOwner(data) {
            var app = this;

            app.data.license_id = data.id;
            app.data.full_name = data.full_name;
            app.hideOwner();
        },
        licenseList() {
            var app = this;
            app.isLoading = true;
            axios
                .get("/license/list/")
                .then(function (resp) {
                    app.owners = resp.data.records;
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
