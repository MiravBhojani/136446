<template>
    <div class="card radius-10">



						<!-- Admins List -->
						<div class="card-body" v-if="!displayEditForm">
							<div class="d-flex align-items-center">
								<div class="center">
									<h5 class="mb-0 text-center ">Admins List</h5>
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
											<th>Date Of Birth</th>
											<th>Nationality</th>
											<th>Date Registered</th>

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
											<td>{{admin.dob}}</td>
											<td>
												{{admin.nationality}}
											</td>
											<td>
												{{admin.created_at}}
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
		  	admin_no_plate:"",
			capacity:"",
			status:"",
			model:"",
			editadminId:"",
		 }
	},
	methods:
	{
		fetchAdmins()
		{
			//Get Projects List from the api
			axios.get('api/admin-clubs').then(response => {
				this.admins=response.data
			})
		},
		editadmin(key,no_plate,capacity,status,model)
		{
			if(key!==" " && no_plate!=="" && capacity!=="" && status!=="" && model!=="")
			{
				this.displayEditForm = true;
				this.admin_no_plate = no_plate,
				this.capacity = capacity;
				this.model = model;
				this.status = status;
				this.editadminId = key;
			}
			console.log(key,no_plate);
		},
		clearFormData()
		{
			this.admin_no_plate="";
			this.capacity="";
			this.status="";
			this.model="";
		},
		updateadmin(e)
		{
			e.preventDefault();
			let obj = {
				admin_no_plate:this.admin_no_plate,
				capacity:this.capacity,
				status:this.status,
				model:this.model,
			};
			// let currentObj = this;
			// this.sendData = true;

			axios.put(`api/admins/${this.editAdminId}`,obj).then(response => {

				if(response.data.status=="success")
				{
					alert("admin Successfully Updated");
					this.clearFormData();
					this.displayEditForm = false;
					this.vehicles = response.data.info;
				}
				else
				{
					alert("Error Updating Data Please Try Again Later");
				}

			})
		},
		deleteVehicle(key)
		{
			if(key!=="" && key!==null)
			{
				if(confirm("Are you sure you want to delete this vehicle"))
				{
					axios.delete(`api/vehicles/${key}`).then(response => {
						if(response.data.status=="success")
						{
							alert("Vehicle Has Been Removed");
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
