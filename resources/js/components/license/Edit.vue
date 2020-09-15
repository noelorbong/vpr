<template>
<div>
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fa fa-pencil"></i> Edit License
        </div>
        <div class="card-body" style="padding:30px; margin:0;">
            <form autocomplete="off" v-on:submit="saveForm()">
                <div class="form-row">
                    <div class="form-group  col-md-4">
                        <label for="exampleFormControlInput1">Last Name</label>
                        <input type="text" class="form-control" v-model="data.last_name" required>
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="text" class="form-control" v-model="data.first_name" required>
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="exampleFormControlInput1">Middle Name</label>
                        <input type="text" class="form-control" v-model="data.middle_name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">License No.</label>
                        <input type="text" class="form-control" v-model="data.license_no" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlInput1">Nationalty</label>
                        <input type="text" class="form-control" v-model="data.nationality" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleFormControlInput1">Gender</label>
                        <select class="form-control" v-model="data.gender">
                            <option value='Male'>Male</option>
                            <option value='FeMale'>FeMale</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-3">
                        <label for="exampleFormControlInput1">Date of Birth</label>
                        <input type="date" class="form-control" v-model="data.date_of_birth" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlInput1">Weight</label>
                        <input type="number" class="form-control" v-model="data.weight" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlInput1">Height</label>
                        <input type="number" class="form-control" v-model="data.height" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="exampleFormControlInput1">Blood Type</label>
                        <select class="form-control" v-model="data.blood_type">
                            <option value='A'>A</option>
                            <option value='B'>B</option>
                            <option value='AB'>AB</option>
                            <option value='O'>O</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlInput1">Eye Color</label>
                        <input type="text" class="form-control" v-model="data.eye_color" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Restrictions</label>
                        <input type="text" class="form-control" v-model="data.restrictions" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Conditions</label>
                        <input type="text" class="form-control" v-model="data.conditions" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleFormControlInput1">Registration Date</label>
                        <input type="date" class="form-control" v-model="data.registration_date" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleFormControlInput1">Expiration Date</label>
                        <input type="date" class="form-control" v-model="data.expiration_date" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Contact Number</label>
                        <input type="text" class="form-control" v-model="data.contact_number" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Email Address</label>
                        <input type="email" class="form-control" v-model="data.email_address" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Complete Address</label>
                        <textarea class="form-control" v-model="data.complete_address" rows="2"  required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    mounted() {
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
    data: function () {
        return {

            data: {
                last_name: "",
                first_name: "",
                middle_name: "",
                license_no: "",
                nationality: "",
                gender: "Male",
                date_of_birth: null,
                weight: null,
                height: null,
                blood_type: "A",
                eye_color: "",
                restrictions: "",
                conditions: "",
                registration_date: null,
                expiration_data: null,
                contact_number: "",
                email_address: "",
                complete_address: "",
            }
        };
    },
    computed: {},

    methods: {
        saveForm() {
            event.preventDefault();
            var app = this;
            var data = app.data;
            axios
                .post("/license/update", data)
                .then(function (resp) {
                    console.log(resp);
                    if (resp.data == 'failed') {
                         alert("Could not Register: Updated License exist!");
                    }else{
                        app.$router.push("/license/profile/"+data.id);

                    }
                    
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not update");
                });
        }
    }
};
</script>

<style>
.card-header>.btn {
    margin-top: 1px !important;
}
</style>
