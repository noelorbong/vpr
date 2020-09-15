<template>
<div>
    <div class="row">
        <div class="col-sm-6">
            <h1>Violations</h1>
        </div>
        <div class="col-sm-2">
        </div>
        <div class="search-wrapper col-sm-4">
            <input class="form-control" type="text" v-model="inputSearchMessage" placeholder="Search" />
        </div>
    </div>
    <div class="row mb-5">

        <div v-for="(data) in searchResult" :key="data.id" class="col-sm-12 col-md-3 col-xl-3 mb-5">
            <div class="card bg-primary bg-gradient text-center card-goal-reached">
                <!-- Accepts qp-animate-type which contains an optional animation type from animate.css -->
                <div class="card-body">
                    <h6 class="my-5">{{ data.title}}</h6>
                    <p>Fine</p>
                    <div class="display-4 mt-3">{{data.fine}}</div>
                    <div style="max-width: 300px;">
                    <p class="truncate" :id="'truncate_'+data.id" style="cursor:pointer;" @click="showMoreLess(data.id)">{{data.description}}</p>
                    </div>
                    <!-- <div class="spacer" style="margin:20px;"></div> -->
                    <div class="data-manager">
                        <router-link :to="{name: 'ViolationEdit' , params: {id: data.id}}" class="btn btn-orange  btn-sm">
                            <i class="nav-icon fa fa-pencil"></i> Edit
                        </router-link>
                        <button v-if="data.default != 1" @click="deleteEntry(data.id)" class="btn btn-danger active btn-sm">Delete</button>
                    </div>
                    <!-- <div class="spacer" style="margin-bottom:20px;"></div> -->
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
                        item.title +
                        " " +
                        item.fine +
                        " " +
                        item.description
                    )
                    .toLowerCase()
                    .indexOf(this.inputSearchMessage.toLowerCase()) > -1
                );
            });
        }
    },
    methods: {
        showMoreLess(index) {
            var element = document.getElementById("truncate_" + index);
            element.classList.toggle("truncate");
        },
        getRecords() {
            var app = this;
            app.isLoading = true;
            axios
                .get("/violation/list/")
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
                    .delete("/violation/delete/" + id)
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

<style lang="scss" scoped>
.truncate {
    /* need automatic multi-line height */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    word-wrap: break-word;
    /* color:#170694; */
}

// .data-manager {
//     margin-top: auto;
//     /* display: block; */
//     position: absolute;
// }
</style>
