<template>
<div class="row vld-parent">
    <div class="col-sm-6 col-xl-5">
        <div class="card">
            <div class="card-header">
                <i class="nav-icon fa fa-fort-awesome"></i> License Info
                <router-link v-if="userId != 1" :to="{name: 'LicenseEdit' ,params: {id: data.id}}" style="float:right;" class="btn btn-sm btn-info">
                    <i class="fa fa-pencil"></i>
                </router-link>
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
                <i class="nav-icon fa fa-list-alt"></i>
                Violations
            </div>
            <div class="card-body" style="padding:0px">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="flocks-tab" data-toggle="tab" href="#flocks" role="tab" aria-controls="flocks" aria-selected="true">Manual Inputed Violations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Attended-tab" data-toggle="tab" href="#Attended" role="tab" aria-controls="Attended" aria-selected="false">Scanned Violations</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="flocks" role="tabpanel" aria-labelledby="flocks-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Plate No</th>
                                                <th>Violation</th>
                                                <th>Fine</th>
                                                <th>Date Violated</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(data) in searchResult" :key="data.id">
                                                <td style="cursor:pointer">{{data.plate_no}}</td>
                                                <td>{{data.title}}</td>
                                                <td>{{data.fine}}</td>
                                                <td>{{data.date_violated}} {{data.time_violated}}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Attended" role="tabpanel" aria-labelledby="Attended-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Plate No</th>
                                                <th>Violation</th>
                                                <th>Fine</th>
                                                <th>Date Violated</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(data) in searchResult2" :key="data.id">
                                                <td style="cursor:pointer">{{data.plate_no}}</td>
                                                <td>{{data.title}}</td>
                                                <td>{{data.fine}}</td>
                                                <td>{{data.date_violated}} {{data.time_violated}}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    mounted() {
        var app = this;
        app.loadActivity();
        app.memberList();
    },
    data: function () {
        return {
            userId: 0,
            reports: [],
            inputSearchMessage: "",
            inputSearchMembers: "",
            searchResult: [],
            searchResult2:[],
            members: [],
            data: {},
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
        memberList() {
            let app = this;
            let id = app.$route.params.id;
            axios
                .get("/license/violation/" + id)
                .then(function (resp) {
                    app.searchResult = resp.data.records;
                    app.searchResult2 = resp.data.records2;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load violation");
                    // app.isLoading = false;
                });
        },
        removeEntry(id) {
            var app = this;
            //console.log("Id: " + id + " index:" + mainIndex);

            if (confirm("Do you really want to remove it?")) {
                axios
                    .delete("/auth/tribe/remove/" + id)
                    .then(function (resp) {
                        var index = app.reports
                            .map(x => {
                                return x.id;
                            })
                            .indexOf(id);

                        app.reports.splice(index, 1);

                        app.data.tribe_member = app.reports.length;
                        app.availability = [];
                        app.unavailability = [];
                        $.each(app.reports, function (key, value) {
                            app.availability.push(value.id);
                        });
                        app.unavailability = app.availability;
                    })
                    .catch(function (resp) {
                        alert("Could not remove!");
                    });
            }
        }
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
