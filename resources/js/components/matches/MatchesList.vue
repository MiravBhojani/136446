<template>
    <div class="card radius-10">
        <div class="card-body" v-if="displayScoreForm">
            <span
                @click="displayScoreForm = !displayScoreForm"
                class="btn btn-warning btn-sm pull-right"
            >
                View Matches</span
            >
            <hr />

            <h6 class="mb-0 text-uppercase text-center">
                Add Match Score Details Here
            </h6>
            <div class="card border-top border-0 border-4 border-white">
                <div class="card-body p-5">
                    <hr />
                    <form class="row g-3" method="POST" @submit="updatScore">
                        <div class="col-12 clearfix">
                            <label class="form-label">Select Players</label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bxs-edit-location"></i
                                ></span>
                                <select
                                    class="form-select border-start-0"
                                    v-model="twelveth_man"
                                    multiple
                                >
                                    <option
                                        v-for="(player, index) in players"
                                        :key="player.id"
                                        :value="player.id"
                                    >
                                        {{ player.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 clearfix">
                            <label class="form-label">Select Keeper</label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bxs-edit-location"></i
                                ></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="twelveth_man"
                                >
                                    <option
                                        v-for="(player, index) in players"
                                        :key="player.id"
                                        :value="player.id"
                                    >
                                        {{ player.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label"
                                >Pitch Type</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="pitch_type"
                                >
                                    <option value="" disabled>
                                        Select Pitch Type
                                    </option>
                                    <option value="Dry Pitch">Dry Pitch</option>
                                    <option value="Green Pitch">
                                        Green Pitch
                                    </option>
                                    <option value="Flat Pitch">
                                        Flat Pitch
                                    </option>
                                    <option value="Slow Pitch">
                                        Slow Pitch
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="overs" class="form-label">Overs</label>
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <input
                                    type="text"
                                    class="form-control border-start-0"
                                    id="overs"
                                />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="overs_per_bowler" class="form-label"
                                >Overs Per Bowler</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <input
                                    type="text"
                                    class="form-control border-start-0"
                                    id="overs_per_bowler"
                                />
                            </div>
                        </div>
                        <div class="col-6 clearfix">
                            <label for="win_team" class="form-label"
                                >Toss Winner</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="home_team"
                                >
                                    <option
                                        v-for="(club, index) in clubs"
                                        :key="club.id"
                                        :value="club.club_id"
                                    >
                                        {{ club.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 clearfix">
                            <label for="win_team" class="form-label"
                                >After Toss</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="home_team"
                                >
                                    <option value="Bat">Bat</option>
                                    <option value="Bat">Bowl</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 clearfix">
                            <label class="form-label">Select Stricker</label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bxs-edit-location"></i
                                ></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="twelveth_man"
                                >
                                    <option
                                        v-for="(player, index) in players"
                                        :key="player.id"
                                        :value="player.id"
                                    >
                                        {{ player.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 clearfix">
                            <label class="form-label">Select Non Striker</label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bxs-edit-location"></i
                                ></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="twelveth_man"
                                >
                                    <option
                                        v-for="(player, index) in players"
                                        :key="player.id"
                                        :value="player.id"
                                    >
                                        {{ player.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                         <div class="col-6 clearfix">
                            <label class="form-label">Select Bowler</label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bxs-edit-location"></i
                                ></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="twelveth_man"
                                >
                                    <option
                                        v-for="(player, index) in players"
                                        :key="player.id"
                                        :value="player.id"
                                    >
                                        {{ player.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 clearfix">
                            <label for="power_play" class="form-label"
                                >Power Play</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <input
                                    type="number"
                                    class="form-control border-start-0"
                                    id="power_play"
                                />
                            </div>
                        </div>

                        <div class="col-12 mx-auto center">
                            <button
                                type="submit"
                                class="btn btn-light px-5 text-center my-auto"
                            >
                                SAVE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Matches  List -->
        <div class="card-body" v-if="!displayScoreForm">
            <div class="d-flex align-items-center">
                <div class="center">
                    <h5 class="mb-0 text-center">Matches List</h5>
                </div>
                <div class="font-22 ms-auto">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </div>
            </div>
            <hr />
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Home Team</th>
                            <th>Away Team</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(match, index) in matches" :key="match.id">
                            <td>{{ index++ }}</td>
                            <td>
                                {{ match.home_team.name }}
                            </td>
                            <td>{{ match.away_team.name }}</td>
                            <td>{{ match.start_date }}</td>
                            <td>{{ match.end_date }}</td>
                            <td>
                                <div class="d-flex order-actions">
                                    <button
                                        @click="addScore(match.id)"
                                        class="btn btn-primary"
                                        style="margin: 3px; cursor: pointer"
                                    >
                                        Start Scoring
                                    </button>
                                    <button
                                        @click="deleteVehicle(vehicle.id)"
                                        class="btn btn-success"
                                        style="margin: 3px; cursor: pointer"
                                    >
                                        View Score
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
    data() {
        return {
            matches: [],
            players: [],
            clubs: [],
            displayScoreForm: false,
            overs: "",
            overs_per_bowler: "",
            win_team: "",
            power_play: "",
            match_id: "",
        };
    },
    methods: {
        fetchMatches() {
            let values = JSON.parse(
                document
                    .querySelector("meta[name='user']")
                    .getAttribute("content")
            );
            let club_id = values.club_id;
            //Get Projects List from the api
            axios.get("api/matches").then((response) => {
                this.matches = response.data;
            });
        },
        fetchPlayers() {
            let values = JSON.parse(
                document
                    .querySelector("meta[name='user']")
                    .getAttribute("content")
            );
            let club_id = values.club_id;
            //Get Projects List from the api
            axios.get("api/players").then((response) => {
                this.players = response.data.filter(
                    (item) => item.role === "player"
                );
            });
        },
        fetchAdmins() {
            //Get Projects List from the api
            axios.get("api/admin-clubs").then((response) => {
                this.clubs = response.data.filter(
                    (item) => item.role === "club-admin"
                );
            });
        },
        addScore(key) {
            if (key !== "") {
                this.displayScoreForm = true;
                this.match_id = key;
            }
            // console.log(key,no_plate);
        },
        clearFormData() {
            this.overs = "";
            this.capacity = "";
            this.status = "";
            this.model = "";
        },
        updatScore(e) {
            e.preventDefault();

            alert("Scores Successfully Updated");

            this.displayScoreForm = false;
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
        deleteVehicle(key) {
            if (key !== "" && key !== null) {
                if (confirm("Are you sure you want to delete this vehicle")) {
                    axios.delete(`api/vehicles/${key}`).then((response) => {
                        if (response.data.status == "success") {
                            alert("Vehicle Has Been Removed");
                            this.vehicles = response.data.info;
                        } else {
                            alert(
                                "Error Removing admin,Please Contact The Administrator"
                            );
                        }
                    });
                }
            }
        },
    },
    created() {
        this.fetchMatches();
        this.fetchPlayers();
        this.fetchAdmins();
    },
};
</script>
