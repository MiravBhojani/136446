<template>
    <div class="card radius-10">
						<div class="card-body">
							
                            <h6 class="mb-0 text-uppercase text-center">Enter Vehicle Registration Details Here</h6>
						<div class="card border-top border-0 border-4 border-white">
							<div class="card-body p-5">
								<!-- <div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-white"></i>
									</div>
									<h5 class="mb-0 text-white">User Registration</h5>
								</div> -->
								<hr>
								<form class="row g-3" method="POST" @submit="addVehicle">
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
										<button type="submit" class="btn btn-light px-5 text-center my-auto">Register</button>
									</div>
								</form>
							</div>
						</div>
						</div>
					</div>

</template>
<script>
export default {
	data()
	{
		return {
			vehicle_no_plate:"",
			capacity:"",
			status:"",
			model:""
		}
	},
	methods:
	{
		clearFormData()
		{
			this.vehicle_no_plate="";
			this.capacity="";
			this.status="";
			this.model="";
		},
		addVehicle(e)
		{
			e.preventDefault();
			let obj = {
				vehicle_no_plate:this.vehicle_no_plate,
				capacity:this.capacity,
				status:"Available",
				model:this.model,
			};
			// let currentObj = this;
			// this.sendData = true;
			axios.post('api/vehicles',obj).then(response => {
				
				if(response.data.status=="success")
				{
					alert("New Vehicle Successfully Added");
					this.clearFormData();
				}
				else
				{
					alert("Error Saving Data Please Try Again Later");
				}

			})
		}

	}
	
	
}
</script>