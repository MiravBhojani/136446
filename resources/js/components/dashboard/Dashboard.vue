<template>
    <div class="card radius-10">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group g-0">
            <div class="col">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{ delivered_orders }}</h5>
                        <div class="ms-auto">
                            <i class="bx bx-cart fs-3 text-white"></i>
                        </div>
                    </div>
                    <div class="progress my-3" style="height: 3px">
                        <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: 55%"
                            aria-valuenow="25"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        ></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Clubs</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{ pending_orders }}</h5>
                        <div class="ms-auto">
                            <i class="bx bx-book-alt fs-3 text-white"></i>
                        </div>
                    </div>
                    <div class="progress my-3" style="height: 3px">
                        <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: 55%"
                            aria-valuenow="25"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        ></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Players</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{ loading_orders }}</h5>
                        <div class="ms-auto">
                            <i class="bx bx-book fs-3 text-white"></i>
                        </div>
                    </div>
                    <div class="progress my-3" style="height: 3px">
                        <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: 55%"
                            aria-valuenow="25"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        ></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Matches Played</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{ dispatched_orders }}</h5>
                        <div class="ms-auto">
                            <i class="bx bx-envelope fs-3 text-white"></i>
                        </div>
                    </div>
                    <div class="progress my-3" style="height: 3px">
                        <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: 55%"
                            aria-valuenow="25"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        ></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Upcoming Matches</p>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
        <hr>
           <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group g-0">

            <div class="col">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{ available_admins }}</h5>
                        <div class="ms-auto">
                            <i class="bx bx-car fs-3 text-white"></i>
                        </div>
                    </div>
                    <div class="progress my-3" style="height: 3px">
                        <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: 55%"
                            aria-valuenow="25"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        ></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Admins</p>
                    </div>
                </div>
            </div>


        </div>
        <!--end row-->
    </div>
</template>
<script>
export default {
    data() {
        return {
            dispatched_orders: 0,
            loading_orders: 0,
            delivered_orders: 0,
            pending_orders: 0,
            loading_vehicles:0,
            available_admins:0,
            available_vehicles:0,
        };
    },
    methods: {},
    computed: {
        //Sort Orders And Count Them
        fetchSortedOrders() {
            axios.get("api/orders").then((response) => {
                const all_orders = response.data;

                for (const obj of all_orders) {
                    if (obj.order_status === "Pending") this.pending_orders++;
                    if (obj.order_status === "Delivered")
                        this.delivered_orders++;
                    if (obj.order_status === "Dispatched")
                        this.dispatched_orders++;
                    if (obj.order_status === "Delivered")
                        this.delivered_orders++;
                    if (obj.order_status === "Loading")
                        this.delivered_loading++;
                }
            });
        },
        //Sort Vehicles And Count Them
        fetchSortedVehicles() {
            axios.get("api/vehicles").then((response) => {
                const all_vehicles = response.data;

                for (const obj of all_vehicles) {
                    if (obj.status === "Available")
                    this.available_vehicles++;
                    if (obj.status === "Ontransit")
                        this.ontransit_vehicles++;
                    if (obj.status === "Loading")
                        this.loading_vehicles++;


                }
            });
        },
    },
    created() {
        this.fetchSortedOrders();
        this.fetchSortedVehicles();
    },
};
</script>
