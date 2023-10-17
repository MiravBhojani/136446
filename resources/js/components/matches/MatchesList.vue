<template>
    <div class="card radius-10">

                           	<div class="card-body" v-if="displayScoreForm">
				<span  @click="displayScoreForm = !displayScoreForm" class="btn btn-warning btn-sm pull-right" >
                                  View Matches</span>
                                  <hr>

                            <h6 class="mb-0 text-uppercase text-center">Add Match Score Details Here</h6>
						<div class="card border-top border-0 border-4 border-white">
							<div class="card-body p-5">

								<hr>
								<form class="row g-3" method="POST" @submit="updatScore">
									<div class="col-md-12">
										<label for="overs" class="form-label">Overs</label>
										<div class="input-group"> <span class="input-group-text"></span>
											<input type="text"  class="form-control border-start-0" id="overs"  />
										</div>
									</div>
									<div class="col-md-12">
										<label for="overs_per_bowler" class="form-label">Overs Per Bowler</label>
										<div class="input-group"> <span class="input-group-text"></span>
											<input type="text"  class="form-control border-start-0" id="overs_per_bowler"  />
										</div>
									</div>
									<div class="col-12 clearfix">
										<label for="win_team" class="form-label">Win Team</label>
										<div class="input-group"> <span class="input-group-text"></span>
											<input type="number"  class="form-control border-start-0" id="win_team"  />
										</div>
									</div>
                                    						<div class="col-12 clearfix">
										<label for="power_play" class="form-label">Power Play</label>
										<div class="input-group"> <span class="input-group-text"></span>
											<input type="number"  class="form-control border-start-0" id="power_play"  />
										</div>
									</div>


									<div class="col-12 mx-auto center">
										<button type="submit" class="btn btn-light px-5 text-center my-auto">ADD SCORE</button>
									</div>
								</form>
							</div>
						</div>
						</div>

						<!-- Matches  List -->
						<div class="card-body" v-if="!displayScoreForm">
							<div class="d-flex align-items-center">
								<div class="center">
									<h5 class="mb-0 text-center ">Matches List</h5>
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
											<th>Home Team </th>
                                            <th>Away Team</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Home Captain</th>
											<th>Away Captain</th>
                                            <th>Twelveth Man</th>
											<th>Keeper</th>
                                            <th>Ground</th>
                                            <th>Action</th>

										</tr>
									</thead>
									<tbody>
										<tr v-for="(match,index) in matches" :key="match.id">
											<td>{{index++}}</td>
											<td>
												{{match.home_team}}
											</td>
											<td>{{match.away_team}}</td>
											<td>{{match.start_date}}</td>
                                            <td>{{match.end_date}}</td>
											<td>{{match.home_captain}}</td>
											<td>
												{{match.away_captain}}
											</td>
											<td>
												{{match.twelveth_man}}
											</td>
                                            <td>
												{{match.keeper}}
											</td>
                                             <td>
												{{match.ground}}
											</td>
                                            <td>
												<div class="d-flex order-actions">
											 <button  @click="addScore(match.id)" class="btn btn-primary" style="margin:3px;cursor:pointer;">Add Score </button>
                                            <button @click="deleteVehicle(vehicle.id)" class="btn btn-success" style="margin:3px;cursor:pointer;">View Score</button>

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
          matches:[],
		  displayScoreForm:false,
		  	overs:"",
			overs_per_bowler:"",
			win_team:"",
			power_play:"",
			match_id:"",
		 }
	},
	methods:
	{
		fetchMatches()
		{
            let values = JSON.parse(document.querySelector("meta[name='user']").getAttribute('content'));
            let club_id =values.club_id;
			//Get Projects List from the api
			axios.get('api/matches').then(response => {
				this.matches=response.data;
			})
		},
		addScore(key)
		{

			 if(key!=="")
			 {
				this.displayScoreForm = true;
				this.match_id = key
			 }
			// console.log(key,no_plate);
		},
		clearFormData()
		{
			this.overs="";
			this.capacity="";
			this.status="";
			this.model="";
		},
		updatScore(e)
		{
			e.preventDefault();
            
            alert("Scores Successfully Updated")

            this.displayScoreForm=false
			// let obj = {
			// 	overs:this.overs,
			// 	capacity:this.capacity,
			// 	status:this.status,
			// 	model:this.model,
			// };
			// // let currentObj = this;
			// // this.sendData = true;

			// axios.put(`api/admins/${this.editAdminId}`,obj).then(response => {

			// 	if(response.data.status=="success")
			// 	{
			// 		alert("admin Successfully Updated");
			// 		this.clearFormData();
			// 		this.displayScoreForm = false;
			// 		this.vehicles = response.data.info;
			// 	}
			// 	else
			// 	{
			// 		alert("Error Updating Data Please Try Again Later");
			// 	}

			// })
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
		this.fetchMatches();
	}
}
</script>
