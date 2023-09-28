<template>
    <div class="card radius-10">
        <div class="card-body" v-if="displayOrderForm">
            <span
                @click="displayOrderForm = !displayOrderForm"
                class="btn btn-info btn-sm pull-right"
                style="color: #fff"
            >
                View orders</span
            >
            <hr />

            <h6 class="mb-0 text-uppercase text-center">
               Assign Vehicle And Update Order Status Here
            </h6>
            <div class="card border-top border-0 border-4 border-white">
                <div class="card-body p-5">
               
                    <form class="row g-3" method="POST" @submit="updateOrder">
                        <div class="col-md-12">
                            <label for="order_no_plate" class="form-label"
                                >Order No</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <input
                                    type="text"
                                    v-model="order_no"
                                    class="form-control border-start-0"
                                    id="order_no_plate"
                                />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="order_model" class="form-label"
                                >Vehicle Assigned</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <select
                                    v-model="vehicle_assigned"
                                    class="form-control border-start-0"
                                >
                                    <option
                                        v-bind:value="vehicle.id"
                                        v-for="vehicle in vehicles"
                                        :key="vehicle.id"
                                    >
                                        {{ vehicle.vehicle_no_plate }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 clearfix">
                            <label for="order_capacity" class="form-label"
                                >Order Status</label
                            >
                            <div class="input-group">
                                <span class="input-group-text"></span>
                                <select
                                    v-model="order_status"
                                    name="order_status"
                                    id="order_status"
                                    class="form-control border-start-0"
                                >
                                    <option value="" disabled>
                                        Select Status
                                    </option>
                                    <option value="Pending">Pending</option>
                                    <option value="Loading">Loading</option>
                                    <option value="Dispatched">
                                        Dispatched
                                    </option>
                                    <option value="Delivered">Delivered</option>
                                </select>
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
        <div class="card-body" v-if="!displayOrderForm">
            <div class="d-flex align-items-center">
                <div class="center">
                    <h5 class="mb-0 text-center">Orders List</h5>
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
                            <th>Order No</th>
                            <th>Vehicle Assigned</th>
                            <th>Order Status</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(order, index) in orders" :key="order.id">
                            <td>{{ (i = index += 1) }}</td>
                            <td>
                                {{ order.order_no }}
                            </td>
                            <td>
                                {{
                                    order.vehicles !== null
                                        ? order.vehicles.vehicle_no_plate
                                        : " "
                                }}
                            </td>
                            <td>
                                <div class="badge rounded-pill bg-light w-100">
                                    {{ order.order_status }}
                                </div>
                            </td>
                            <td>
                                {{ order.created_at }}
                            </td>
                            <td>
                                <div class="d-flex order-actions">
                                    <button
                                        @click="
                                            editOrder(
                                                order.id,
                                                order.order_no,
                                                order.status,
                                                order.vehicle_id
                                            )
                                        "
                                        class="btn btn-info btn-sm"
                                    >
                                        Assign Vehicle
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
            orders: [],
            vehicles: [],
            displayOrderForm: false,
            order_no: "",
            order_status: "",
            vehicle_assigned: "",
            editorderId: "",
        };
    },
    methods: {
        //Fetch Vehicles For Select Vehicle Field
        fetchVehicles() {
            //Get orders list from the api
            axios.get("api/vehicles").then((response) => {
                this.vehicles = response.data;
            });
        },
        //Fetch All Orders For Displaying On Table
        fetchOrders() {
            
            axios.get("api/orders").then((response) => {
                this.orders = response.data;
            });
        },
        //Edit Order Details
        editOrder(key, order_no, order_status, vehicle_assigned) {
            if (
                key !== " " &&
                order_no !== "" &&
                order_status !== "" &&
                vehicle_assigned !== ""
            )
             {
                this.displayOrderForm = true;
                this.order_no = order_no;
                this.order_status = order_status;
                this.vehicle_assigned = vehicle_assigned;
                this.editorderId = key;
            }
            console.log(key, order_no);
        },
        //Clear Form Data After Submit
        clearFormData() {
            this.order_no = "";
            this.order_status = "";
            this.vehicle_assigned = "";
        },
        //Update Data
        updateOrder(e) {
            e.preventDefault();
            let obj = {
                order_no: this.order_no,
                order_status: this.order_status,
                vehicle_id: this.vehicle_assigned,
            };
            // let currentObj = this;
            // this.sendData = true;
            axios
                .put(`api/orders/${this.editorderId}`, obj)
                .then((response) => {
                    if (response.data.status == "success") {
                        alert("Order Successfully Updated");
                        this.clearFormData();
                        this.displayOrderForm = false;
                        this.orders = response.data.info;
                    } else {
                        alert("Error Updating Data Please Try Again Later");
                    }
                });
        },
    },
    created() {
        this.fetchOrders();
        this.fetchVehicles();
    },
};
</script>
