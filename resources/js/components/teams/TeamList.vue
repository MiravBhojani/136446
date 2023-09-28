<template>
    <div class="card radius-10">
		<!-- Edit Form  -->
			<div class="card-body" v-if="displayEditForm">
				<span  @click="displayEditForm = !displayEditForm" class="btn btn-primary btn-sm pull-right" >
                                  View Vehicles</span>
                                  <hr>
							
                            <h6 class="mb-0 text-uppercase text-center">Update Vehicle Registration Details Here</h6>
						<div class="card border-top border-0 border-4 border-white">
							<div class="card-body p-5">
								
								<hr>
								<form class="row g-3" method="POST" @submit="updateVehicle">
									<div class="col-md-12">
										<label for="vehicle_no_plate" class="form-label">Vehicle No Plate</label>
										<div class="input-group"> <span class="input-group-text"><i class='bx bxs-car'></i></span>
											<input type="text" v-model="vehicle_no_plate" class="form-control border-start-0" id="vehicle_no_plate"  />
										</div>
									</div>
									<div class="col-md-12">
										<label for="vehicle_model" class="form-label">Vehicle Model</label>
										<div class="input-group"> <span class="input-group-text"><i class='bx bxs-category'></i></span>
											<input type="text" v-model="model" class="form-control border-start-0" id="vehicle_model"  />
										</div>
									</div>
									<div class="col-12 clearfix">
										<label for="vehicle_capacity" class="form-label">Vehicle Capacity</label>
										<div class="input-group"> <span class="input-group-text"><i class='bx bxs-volume' ></i></span>
											<input type="number" v-model="capacity" class="form-control border-start-0" id="vehicle_capacity"  />
										</div>
									</div>
									<div class="col-12 clearfix">
										<label for="vehicle_status" class="form-label">Vehicle Status</label>
										 <select
                                    v-model="status"
                                    name="order_status"
                                    id="order_status"
                                    class="form-control border-start-0"
                                >
                                    <option value="" disabled>
                                        Select Status
                                    </option>
                                    <option value="Available">Available</option>
                                    <option value="OnTransit">OnTransit</option>
                                    <option value="Loading">
                                        Loading
                                    </option>
                                    
                                </select>
									</div>
									
								
									<div class="col-12 mx-auto center">
										<button type="submit" class="btn btn-light px-5 text-center my-auto">UPDATE</button>
									</div>
								</form>
							</div>
						</div>
						</div>
						<!-- Assign Order -->
					
			<!-- <div class="card-body" v-if="displayEditForm">
				<span  @click="displayEditForm = !displayEditForm" class="btn btn-warning btn-sm pull-right" >
                                  View Vehicles</span>
                                  <hr>
							
                            <h6 class="mb-0 text-uppercase text-center">Update Vehicle Registration Details Here</h6>
						<div class="card border-top border-0 border-4 border-white">
							<div class="card-body p-5">
								
								<hr>
								<form class="row g-3" method="POST" @submit="assignOrder">
									<div class="col-md-12">
										<label for="vehicle_no_plate" class="form-label">Vehicle No Plate</label>
										<div class="input-group"> <span class="input-group-text"><i class='bx bxs-car'></i></span>
											<input type="text" v-model="vehicle_no_plate" class="form-control border-start-0" id="vehicle_no_plate"  />
										</div>
									</div>
									<div class="col-md-12">
										<label for="vehicle_model" class="form-label">Vehicle Model</label>
										<div class="input-group"> <span class="input-group-text"><i class='bx bxs-category'></i></span>
											<input type="text" v-model="model" class="form-control border-start-0" id="vehicle_model"  />
										</div>
									</div>
									<div class="col-12 clearfix">
										<label for="vehicle_capacity" class="form-label">Vehicle Capacity</label>
										<div class="input-group"> <span class="input-group-text"><i class='bx bxs-volume' ></i></span>
											<input type="number" v-model="capacity" class="form-control border-start-0" id="vehicle_capacity"  />
										</div>
									</div>
									
								
									<div class="col-12 mx-auto center">
										<button type="submit" class="btn btn-light px-5 text-center my-auto">UPDATE</button>
									</div>
								</form>
							</div>
						</div>
						</div> -->
						<!-- Vehicles List -->
						<div class="card-body" v-if="!displayEditForm">
							<div class="d-flex align-items-center">
								<div class="center">
									<h5 class="mb-0 text-center ">Vehicles List</h5>
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
											<th>Vehicle Model</th>
											<th>Vehicle No Plate</th>
											<th>Vehicle Capacity</th>
											<th>Vehicle Status</th>
											<th>Date Registered</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(vehicle,index) in vehicles" :key="vehicle.id">
											<td>{{i = index+=1}}</td>
											<td>
												{{vehicle.model}}
											</td>
											<td>{{ vehicle.vehicle_no_plate}}</td>
											<td>{{ vehicle.capacity }}</td>
											<td><div class="badge rounded-pill bg-light w-100">{{vehicle.status}}</div></td>
											<td>
												{{ vehicle.created_at}}
											</td>
											<td>
												<div class="d-flex order-actions">
											 <i  @click="editVehicle(vehicle.id,vehicle.vehicle_no_plate,vehicle.capacity,vehicle.status,vehicle.model)" class="bx bx-edit" style="margin:3px;cursor:pointer;"></i>
                                            <i @click="deleteVehicle(vehicle.id)" class="bx bx-trash" style="margin:3px;cursor:pointer; color:red;"></i>

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
          vehicles:[],
		  displayEditForm:false,
		  	vehicle_no_plate:"",
			capacity:"",
			status:"",
			model:"",
			editVehicleId:"",
		 }
	},
	methods:
	{
		fetchVehicles()
		{
			//Get vehicles list from the api
			axios.get('api/vehicles').then(response => {
				this.vehicles=response.data
			})
		},
		editVehicle(key,no_plate,capacity,status,model)
		{
			if(key!==" " && no_plate!=="" && capacity!=="" && status!=="" && model!=="")
			{
				this.displayEditForm = true;
				this.vehicle_no_plate = no_plate,
				this.capacity = capacity;
				this.model = model;
				this.status = status;
				this.editVehicleId = key;
			}
			console.log(key,no_plate);
		},
		clearFormData()
		{
			this.vehicle_no_plate="";
			this.capacity="";
			this.status="";
			this.model="";
		},
		updateVehicle(e)
		{
			e.preventDefault();
			let obj = {
				vehicle_no_plate:this.vehicle_no_plate,
				capacity:this.capacity,
				status:this.status,
				model:this.model,
			};
			// let currentObj = this;
			// this.sendData = true;
			
			axios.put(`api/vehicles/${this.editVehicleId}`,obj).then(response => {
				
				if(response.data.status=="success")
				{
					alert("Vehicle Successfully Updated");
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
							alert("Error Removing Vehicle,Please Contact The Administrator")
						}
					})
				}
			}
		}
	},
	created()
	{
		this.fetchVehicles();
	}
}
</script>