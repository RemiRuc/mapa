import Vue from "vue";
import Vuex from "vuex";
import MapModule from "./map";
import SecurityModule from "./security";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    map: MapModule,
    security: SecurityModule
  }
});