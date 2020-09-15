<template>
<div class="row vld-parent">
    <div class="col-sm-6 col-xl-5">
        <div class="card">
            <div class="card-header">
                <i class="nav-icon fa fa-user"></i> Owner's Info

            </div>
            <div class="card-body text-center">
                <u>{{ data.full_name || ''}}</u>
                <br />
                <span style="font-weight: bold;">Full Name</span>
                <br />
                <br />
                <u>{{data.license_no || ''}}</u>
                <br />
                <span style="font-weight: bold;">License</span>

                <br />
                <br />
                <div class="row">
                    <div class="col-sm-6">
                        <u>{{data.nationality || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Nationality</span>
                    </div>
                    <div class="col-sm-6">
                        <u>{{ data.gender || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Gender</span>
                    </div>
                </div>
                <br />
                <u>{{data.date_of_birth || ''}}</u>
                <br />
                <span style="font-weight: bold;">Date of Birth</span>

                <br />
                <br />
                <div class="row">
                    <div class="col-sm-6">
                        <u>{{data.weight || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Weight</span>
                    </div>
                    <div class="col-sm-6">
                        <u>{{ data.height || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Height</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-6">
                        <u>{{data.blood_type || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Blood Type</span>
                    </div>
                    <div class="col-sm-6">
                        <u>{{ data.eye_color || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Eye Color</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-6">
                        <u>{{data.restrictions || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Restrictions</span>
                    </div>
                    <div class="col-sm-6">
                        <u>{{ data.conditions || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Conditions</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-6">
                        <u>{{data.registration_date || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Registration Date</span>
                    </div>
                    <div class="col-sm-6">
                        <u>{{ data.expiration_date || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Expiration Date</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-6">
                        <u>{{data.contact_number || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Contact Number</span>
                    </div>
                    <div class="col-sm-6">
                        <u>{{ data.email_address || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Email Address</span>
                    </div>
                </div>
                <br />
                <u>{{data.complete_address || ''}}</u>
                <br />
                <span style="font-weight: bold;">Address</span>

                <br />
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-7">
        <div class="card">
            <div class="card-header">
                <i class="nav-icon fa fa-car"></i> Vehicle Info
                <router-link  :to="{name: 'VehicleEdit' ,params: {id: data1.id}}" style="float:right;" class="btn btn-sm btn-info">
                    <i class="fa fa-pencil"></i>
                </router-link>
            </div>
            <div class="card-body text-center">

                <div class="row">
                    <div class="col-sm-4">
                        <u>{{data1.cr_no || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">CR No.</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.my_file_no || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">My File No.</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.plate_no || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Plate No.</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-4">
                        <u>{{data1.engine_no || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Engine No.</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.chassis_no || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Chassis No.</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.denomination || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Denomination</span>
                    </div>
                </div>

                <br />
                <div class="row">
                    <div class="col-sm-4">
                        <u>{{data1.pistion_displacement || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Pistion Displacement</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.no_of_cylinders || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">No of Cylinders</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.fuel || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Fuel</span>
                    </div>
                </div>

                <br />
                <div class="row">
                    <div class="col-sm-4">
                        <u>{{data1.make || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Make</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.series || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Series</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.body_type || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Body Type</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-4">
                        <u>{{data1.body_no || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Body No</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.year_model || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Year Model</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.gross_wt || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Gross wt.</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-4">
                        <u>{{data1.net_wt || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Net wt.</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.shipping_wt || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Shipping wt.</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.net_capacity || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Net Capacity</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-4">
                        <u>{{data1.or_no || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">OR no.</span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.or_date || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">OR date </span>
                    </div>
                    <div class="col-sm-4">
                        <u>{{ data1.expiration_date || ''}}</u>
                        <br />
                        <span style="font-weight: bold;">Expiration Date</span>
                    </div>
                </div>
                <br />
                <u>{{ data1.amount || ''}}</u>
                <br />
                <span style="font-weight: bold;">Amount</span>

            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    mounted() {
        var app = this;
        app.loadVehicle();
    },
    data: function () {
        return {
            userId: 0,
            reports: [],
            members: [],
            data: {},
            data1: {},
            fullPage: false,
            isLoading: false,
            loader: "dots",
            loaderColor: "rgb(255,0,0)"
        };
    },
    computed: {},
    methods: {
        loadActivity() {

            let app = this;
            let id = app.$route.params.id;
            axios
                .get("/license/edit/" + id)
                .then(function (resp) {
                    app.data = resp.data.record;
                })
                .catch(function () {
                    alert("Could not load license");
                });

        },
        loadVehicle() {

            let app = this;
            let id = app.$route.params.id;
            axios
                .get("/vehicle/edit/" + id)
                .then(function (resp) {
                    app.data1 = resp.data.record;
                    app.loadActivity();
                })
                .catch(function () {
                    alert("Could not load license");
                });

        },
    }
};
</script>

<style>
.profile-img {
    max-width: 150px;
    width: 100px;
    height: 100px;
    border: 5px solid #fff;
    border-radius: 100%;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
}

.v--modal-box {
    height: auto !important;
    width: 60% !important;
    /* margin: 0 !important; */
    padding: 0 !important;
    margin-left: auto;
    margin-right: auto;
    margin-top: 8%;
    /* margin: auto; */
    top: auto !important;
    left: auto !important;
}

.card-header>.btn {
    margin-top: 1px !important;
}
</style>
