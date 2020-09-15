<template>
<div>
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fa fa-plus"></i> Add Missing Vehicle
        </div>
        <div class="card-body" style="padding:30px; margin:0;">
            <form autocomplete="off" v-on:submit="saveForm()">
                <div class="form-row">
                    <div class="form-group  col-md-8">
                        <label for="exampleFormControlInput1">Vehicle Plate</label>
                        <input type="text" class="form-control" v-on:keyup="showMembers" v-model="vehicle_plate" required>
                        <input type="hidden" v-model="data.vehicle_id">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="exampleFormControlInput1">Date Missing</label>
                        <input type="date" class="form-control" v-model="data.date_missing" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Note</label>
                        <textarea class="form-control" v-model="data.missing_note" rows="2"></textarea>
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

</div>
</template>

<script>
export default {
    mounted() {
        let app = this;
    },
    data: function () {
        return {
            inputSearchMessage: "",
            vehicle_plate: "",
            members: [],
            data: {
                vehicle_id: 0,
                date_missing: null,
                missing_note: ""
            }
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

            axios
                .post("/missing/store", data)
                .then(function (resp) {
                    console.log(resp);
                    // if (resp.data == 'failed') {
                    //     alert("Could not Register: License number exist!");
                    // }
                    app.$router.push("/missing/list");
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not create data");
                });
        },
        showMembers() {
            var app = this;

            app.inputSearchMessage = app.vehicle_plate;
            app.memberList();
            this.$modal.show("members-modal");
        },
        hide() {
            this.$modal.hide("members-modal");
        },
        selectVehicle(data) {
            var app = this;

            app.data.vehicle_id = data.id;
            app.vehicle_plate = data.plate_no;
            app.hide();
        },
        memberList() {
            var app = this;
            app.isLoading = true;
            axios
                .get("/vehicle/list/notmissing")
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
