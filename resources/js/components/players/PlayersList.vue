<template>
    <div class="card radius-10">



						<!-- Players List -->
						<div class="card-body" v-if="!displayEditForm">
							<div class="d-flex align-items-center">
								<div class="center">
									<h5 class="mb-0 text-center ">Players List</h5>
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
                                            <th>Batting Style</th>
											<th>Bowling Style</th>
											<th>Phone</th>
											<th>Date Of Birth</th>
											<th>Nationality</th>
											<th>Date Registered</th>

										</tr>
									</thead>
									<tbody>
										<tr v-for="(player,index) in players" :key="player.id">
											<td>{{index++}}</td>
											<td>
												{{player.name}}
											</td>
											<td>{{player.batting}}</td>
											<td>{{player.bowling}}</td>
                                            <td>{{player.phone}}</td>
											<td>{{player.dob}}</td>
											<td>
												{{player.nationality}}
											</td>
											<td>
												{{player.created_at}}
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
          players:[],
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
		fetchPlayers()
		{
            let values = JSON.parse(document.querySelector("meta[name='user']").getAttribute('content'));
            let club_id =values.club_id;
			//Get Projects List from the api
			axios.get('api/players').then(response => {
				this.players=response.data.filter((item)=>item.role==="player" && item.club_id===club_id)
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
		this.fetchPlayers();
	}
}
</script>
