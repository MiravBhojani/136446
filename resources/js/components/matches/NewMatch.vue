<template>
    <div class="card">
        <div class="card-body">
            <h6 class="mb-0 text-uppercase text-center">Enter Match Details</h6>
            <div class="card border-top border-0 border-4 border-white">
                <div class="card-body">
                    <!-- <div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-white"></i>
									</div>
									<h5 class="mb-0 text-white">New Admin</h5>
								</div> -->
                    <hr />
                    <form class="row g-3" method="POST" @submit="addMatch">
                        <div class="col-md-6">
                            <label for="name" class="form-label"
                                >Home Team</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bxs-user"></i
                                ></span>
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
                        <div class="col-md-6">
                            <label for="name" class="form-label"
                                >Away Team</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bx-mail-send"></i
                                ></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="away_team"
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
                        <div class="col-md-6">
                            <label for="name" class="form-label"
                                >Start Date</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bx-calendar"></i
                                ></span>
                                <input
                                    type="datetime-local"
                                    v-model="start_date"
                                    class="form-control border-start-0"
                                    id="name"
                                />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label"
                                >End Date</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bx-calendar"></i
                                ></span>
                                <input
                                    type="datetime-local"
                                    v-model="end_date"
                                    class="form-control border-start-0"
                                    id="name"
                                />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label"
                                >Home Captain</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="home_captain"
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
                        <div class="col-md-6">
                            <label for="name" class="form-label"
                                >Away Captain</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="away_captain"
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
                            <label class="form-label">Twelveth Man</label>
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

                        <div class="col-md-6">
                            <label for="name" class="form-label">Ground</label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bx-calendar"></i
                                ></span>
                                <input
                                    type="text"
                                    v-model="ground"
                                    class="form-control border-start-0"
                                    id="name"
                                />
                            </div>
                        </div>

                        <div class="col-6 clearfix">
                            <label class="form-label">Keeper</label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    ><i class="bx bxs-edit-location"></i
                                ></span>
                                <select
                                    class="form-control border-start-0"
                                    v-model="keeper"
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

                        <div class="col-12 mx-auto center">
                            <button
                                type="submit"
                                class="btn btn-light px-5 text-center my-auto"
                            >
                                CREATE MATCH
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
            players:[],
            clubs:[],
            home_team: "",
            away_team: "",
            start_date: "",
            end_date: "",
            home_captain:"",
            away_captain:"",
            twelveth_man:"",
            keeper:"",
            ground:""
        };
    },
    methods: {
        clearFormData() {
            this.home_team = "";
            this.away_team = "";
            this.start_date = "";
            this.end_date = "";
            this.home_captain="";
            this.away_captain="",
            this.twelveth_man="",
            this.keeper="",
            this.ground="";
        },
       addMatch(e) {
            e.preventDefault();

            let obj = {
                home_team: this.home_team,
                away_team: this.away_team,
                start_date: this.start_date,
                end_date: this.end_date,
                home_captain:this.home_captain,
                away_captain:this.away_captain,
                twelveth_man:this.twelveth_man,
                keeper:this.keeper,
                ground:this.ground
            };
            // let currentObj = this;
            // this.sendData = true;
            axios.post("api/matches", obj).then((response) => {
                if (response.data.status == "success") {
                    alert("Match Successfully Added");
                    this.clearFormData();
                } else {
                    alert("Error Saving Data Please Try Again Later");
                }
            });
        },
        fetchPlayers()
		{
            let values = JSON.parse(document.querySelector("meta[name='user']").getAttribute('content'));
            let club_id =values.club_id;
			//Get Projects List from the api
			axios.get('api/players').then(response => {
				this.players=response.data.filter((item)=>item.role==="player")
			})
		},
        fetchAdmins()
		{
			//Get Projects List from the api
			axios.get('api/admin-clubs').then(response => {
				this.clubs=response.data.filter((item)=>item.role==="club-admin")
			})
		},
    },
    created()
	{
		this.fetchPlayers();
        this.fetchAdmins();
	}
};
</script>
