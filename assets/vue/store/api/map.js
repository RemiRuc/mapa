import axios from "axios";

export default {
  findOne(id) {
    console.log(id)
    return axios.get(`/api/maps/${id}`);
  }
};