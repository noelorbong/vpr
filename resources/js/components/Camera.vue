<template>
<div >
 <div class="card">
  <div class="card-header">
    <i class="nav-icon fa fa-camera"></i>Camera
  </div>
  <div class="card-body" style="padding:0px; margin:0;">
    <iframe  id="modify-me" :src="camera"  class="camera" ></iframe>
  </div>
  <div class="card-footer text-muted">
    <a class="pull-right"  href="/" onclick="javascript:event.target.port=8765" target="_blank">More</a>
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

    },
    computed: {},
    methods: {
        loadCamera() {
            let app = this;
            //var windowLocation = window.location.protocol + "//" + window.location.hostname + ":8081/";
           //   document.getElementById('modify-me').src = window.location.protocol + "//" + window.location.hostname + ":8765/";
            var windowLocation = "http://vpr:8765/";
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
        }
    }
};
</script>

<style lang='scss' scoped>
	.camera{
		height:65vh; 
		width:100%;
	}
</style>
