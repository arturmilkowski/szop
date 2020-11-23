import Vue from "vue";
import Vuex from "vuex";
import { update } from "../api";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
      orderStatus: Object
    },
    mutations: {},
    actions: {
        async updateOrderStatus(state, payload) {
          // console.log("state:", state);
          const response = await update(`backend/order/${payload.orderID}/status/${payload.statusID}`, payload.statusID);
          // console.log(response.data.status);
          this.state.orderStatus = response.data.status;
        }
    }
});
