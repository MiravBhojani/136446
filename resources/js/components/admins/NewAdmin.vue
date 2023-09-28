<template>
    <div class="card">
        <div class="card-body">
            <h6 class="mb-0 text-uppercase text-center">NEW ADMIN DETAILS</h6>
            <div class="card border-top border-0 border-4 border-white">
                <div class="card-body">
                    <!-- <div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-white"></i>
									</div>
									<h5 class="mb-0 text-white">New Admin</h5>
								</div> -->
                    <hr />
                    <form class="row g-3" method="POST" @submit="addAdmin">
                        <div class="col-md-6">
                            <label for="name" class="form-label"
                                >Name</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bxs-user"></i
                                ></span>
                                <input
                                    type="text"
                                    v-model="name"
                                    class="form-control border-start-0"
                                    id="name"
                                />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label"
                                >Email</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bx-mail-send"></i
                                ></span>
                                <input
                                    type="text"
                                    v-model="email"
                                    class="form-control border-start-0"
                                    id="name"
                                />
                            </div>
                        </div>
                       <div class="col-md-6">
                            <label for="name" class="form-label"
                                >Phone</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bx-phone"></i
                                ></span>
                                <input
                                    type="text"
                                    v-model="phone"
                                    class="form-control border-start-0"
                                    id="name"
                                />
                            </div>
                        </div>
                       <div class="col-md-6">
                            <label for="name" class="form-label"
                                >Date Of Birth</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bx-calendar"></i
                                ></span>
                                <input
                                    type="date"
                                    v-model="dob"
                                    class="form-control border-start-0"
                                    id="name"
                                />
                            </div>
                        </div>
                        <div class="col-12 clearfix">
                            <label  class="form-label"
                                >Nationality</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bxs-edit-location"></i
                                ></span>
                                 <select class="form-control border-start-0" v-model="nationality">
                                    <option value="" disabled>Select Nationality</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ethiopia">Ethiopia</option>


                                </select>
                            </div>
                        </div>





                        <div class="col-12 mx-auto center">
                            <button
                                type="submit"
                                class="btn btn-light px-5 text-center my-auto"
                            >
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            phone: "",
            dob: "",
            nationality:"",
            sub_nationality:"",
            budget:"",
            financial_year:"",
            department_id:"",
            status:""
        };
    },
    methods: {
        clearFormData() {
            this.name = "";
            this.email = "";
            this.phone = "";
            this.dob = "";
            this.nationality="";

        },
        addAdmin(e) {
            e.preventDefault();
            let password="$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
            let obj = {
                name: this.name,
                email: this.email,
                phone: this.phone,
                dob: this.dob,
                nationality:this.nationality,
                password:password
            };
            // let currentObj = this;
            // this.sendData = true;
            axios.post("api/admin-clubs", obj).then((response) => {
                if (response.data.status == "success") {
                    alert("New Admin Successfully Added");
                    this.clearFormData();
                } else {
                    alert("Error Saving Data Please Try Again Later");
                }
            });
        },
    },
};
</script>
