<template>
    <div class="card radius-10">
       <div class="card-body" v-if="displayEditForm">
            <span
                @click="displayEditForm = !displayEditForm"
                class="btn btn-warning btn-sm pull-right"
            >
                View Clubs</span
            >
            <hr />

            <h6 class="mb-0 text-uppercase text-center">
                Edit Club Details Here
            </h6>
            <div class="card border-top border-0 border-4 border-white">
                <div class="card-body p-5">
                    <hr />
                    <form class="row g-3" method="POST" @submit="updateAdmin">
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
                                >Home Ground</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bx-calendar"></i
                                ></span>
                                <input
                                    type="text"
                                    v-model="home_ground"
                                    class="form-control border-start-0"
                                    id="name"
                                />
                            </div>
                        </div>






                        <div class="col-12 mx-auto center">
                            <button
                                type="submit"
                                class="btn btn-light px-5 text-center my-auto"
                            >
                                UPDATE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



						<!-- Admins List -->
						<div class="card-body" v-if="!displayEditForm">
							<div class="d-flex align-items-center">
								<div class="center">
									<h5 class="mb-0 text-center ">Clubs List</h5>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<hr>
							<div class="table-responsive">
								<table class="table align-middle mb-0">
									<thead class="table-light">
										<tr>
											<th>#</th>
											<th>Name </th>
											<th>Email</th>
											<th>Phone</th>
											<th>Home Ground</th>
                                            <th>Edit</th>


										</tr>
									</thead>
									<tbody>
										<tr v-for="(admin,index) in admins" :key="admin.id">
											<td>{{index++}}</td>
											<td>
												{{admin.name}}
											</td>
											<td>{{admin.email}}</td>
											<td>{{admin.phone}}</td>
											<td>{{admin.home_ground}}</td>
                                             <td>
                                <div class="d-flex order-actions">
                                    <button
                                        @click="editAdmin(admin.id,admin.name,admin.email,admin.phone,admin.home_ground)"
                                        class="btn btn-primary"
                                        style="margin: 3px; cursor: pointer"
                                    >
                                        Edit
                                    </button>
                                    </div>
                                    </td>


										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>
</template>
<script>
export default {
	data(){
		 return {
          admins:[],
		  displayEditForm:false,
		  	name:"",
			email:"",
			phone:"",
			home_ground:"",
            edit_admin_id:""
		 }
	},
	methods:
	{
		fetchAdmins()
		{
			//Get Projects List from the api
			axios.get('api/admin-clubs').then(response => {
				this.admins=response.data.filter((item)=>item.role==="club-admin")
			})
		},
		editAdmin(key,name,email,phone,home_ground)
		{
			if(key!==" " && name!=="" && email!=="" && phone!=="" && home_ground!=="")
			{
				this.displayEditForm = true;
				this.name= name,
				this.email = email;
				this.phone = phone;
				this.home_ground = home_ground;
				this.edit_admin_id = key;
			}
			console.log("addmin id is " + this.edit_admin_id);
		},
		clearFormData()
		{
			this.name= "",
				this.email ="";
				this.phone = "";
				this.home_ground = "";
				this.edit_admin_id = "";
		},
		updateAdmin(e)
		{
			e.preventDefault();
			let obj = {
				name:this.name,
				phone:this.phone,
				home_ground:this.home_ground,
				email:this.email,
			};
			// let currentObj = this;
			// this.sendData = true;

			axios.put(`api/admin-clubs/${this.edit_admin_id}`,obj).then(response => {

				if(response.data.status=="success")
				{
					alert("admin Successfully Updated");
					this.clearFormData();
					this.displayEditForm = false;
					this.admins = response.data.info.filter((item)=>item.role==="club-admin");
				}
				else
				{
					alert("Error Updating Data Please Try Again Later");
				}

			})
		},
		deleteAdmin(key)
		{
			if(key!=="" && key!==null)
			{
				if(confirm("Are you sure you want to delete this admin"))
				{
					axios.delete(`api/vehicles/${key}`).then(response => {
						if(response.data.status=="success")
						{
							alert("Admin Has Been Removed");
							this.vehicles = response.data.info
						}
						else
						{
							alert("Error Removing admin,Please Contact The Administrator")
						}
					})
				}
			}
		}
	},
	created()
	{
		this.fetchAdmins();
	}
}
</script>
