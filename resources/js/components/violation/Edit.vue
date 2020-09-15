<template>
<div>
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fa fa-pencil"></i> Edit Violation
        </div>
        <div class="card-body" style="padding:30px; margin:0;">
            <form autocomplete="off" v-on:submit="saveForm()">
                <div class="form-row">
                    <div class="form-group  col-md-8">
                        <label for="exampleFormControlInput1">Title</label>
                        <input v-if="data.default == 0" type="text" class="form-control" v-model="data.title" required >
                        <input v-else type="text" class="form-control" v-model="data.title" readonly>
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="exampleFormControlInput1">Fine</label>
                        <input type="number" class="form-control" v-model="data.fine" required>
                    </div>
                   
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Description</label>
                        <textarea class="form-control" v-model="data.description" rows="2" required></textarea>
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
            .get("/violation/edit/" + id)
            .then(function (resp) {
                app.data = resp.data.record;
            })
            .catch(function () {
                alert("Could not load violation");
            });
    },
    data: function () {
        return {
            
            data: {
                title: "",
                fine: null,
                decription: ""
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
                .post("/violation/update", data)
                .then(function (resp) {
                    console.log(resp);
                    // if (resp.data == 'failed') {
                    //     alert("Could not Register: License number exist!");
                    // }
                       app.$router.push("/violation/list");
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not update Violation");
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
