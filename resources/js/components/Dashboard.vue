<template>
<div class="row">
    <div class="col-md-4 col-lg-4 col-xl-4">
        <div class="card ">
            <div class="card-header">
                <i class="nav-icon fa fa-camera"></i> Camera
            </div>
            <div id="camera_body" class="card-body" style="padding:5px;">
                <img style="width: 100%;margin-left: auto; margin-right: auto;" :src="camera" />
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-xl-4">
        <div class="card ">
            <div class="card-header">
                <i class="nav-icon fa fa-car"></i> Last Scanned Plate
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-sm-6">
                        <u>{{data.plate_no}}</u>
                        <br />
                        <span style="font-weight: bold;">Plate Number</span>
                    </div>
                    <div class="col-sm-6">
                        <u>{{data.owners_name}}</u>
                        <br />
                        <span style="font-weight: bold;">Owner's Name</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-6">
                        <u>{{data.title}}</u>
                        <br />
                        <span style="font-weight: bold;">Violation</span>
                    </div>
                    <div class="col-sm-6">
                        <u>{{data.fine}}</u>
                        <br />
                        <span style="font-weight: bold;">Fine</span>
                    </div>
                </div>
                <br />
                <u>{{data.date_violated}} {{data.time_violated}}</u>
                <br />
                <span style="font-weight: bold;">Date Violated</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-xl-4">
        <div class="card ">
            <div class="card-header">
                <i class="nav-icon fa fa-list-alt"></i> Today's Violator
            </div>
            <div class="card-body text-center">
                    <div style="height: 40%;" >
                        <u><h3>{{violator_manual}}</h3></u>
                        <br />
                        <span style="font-weight: bold;"> Manual Input Violator</span>
                    </div>
                    <hr>
                    <div style="height: 50%;">
                        <u><h3>{{violator_scanned}}</h3></u>
                        <br />
                        <span style="font-weight: bold;">Scanned Violator</span>
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
            camera: "http://vpr:8081/",
            reportcount: 0,
            reports: [],
            data: {},
            totalReport: 0,
            respondedReport: 0,
            unrespondedReport: 0,
            currentDate: this.getCurrentDate(),
            violator_scanned:0,
            violator_manual:0
        };
    },
    created: function () {
        let app = this;
        app.loadCamera();
        setInterval(
            function () {
                app.loadDashData();
            }.bind(app),
            3000
        );

    },
    computed: {},
    methods: {
        loadCamera() {
            let app = this;
            //var windowLocation = window.location.protocol + "//" + window.location.hostname + ":8081/";
            var windowLocation = "http://vpr:8081/";
            app.camera = windowLocation;
            // document.getElementById('camera').src = windowLocation; 
        },
        getCurrentDate() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();

            if (dd < 10) {
                dd = "0" + dd;
            }

            if (mm < 10) {
                mm = "0" + mm;
            }
            today = yyyy + "-" + mm + "-" + dd;
            console.log(today);
            return today;
        },
        loadDashData() {
            let app = this;
            axios
                .get("/dashdata")
                .then(function (resp) {
                    app.data = resp.data.last_plate;
                    app.violator_manual = resp.data.violator_manual;
                    app.violator_scanned = resp.data.violator_scanned;
                })
                .catch(function () {
                    alert("Could not load data");
                });
        }
    }
};
</script>

<style lang='scss' scoped>

</style>
