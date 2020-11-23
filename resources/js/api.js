import Axios from "axios";
// todo remove this to config or env file
const baseUrl = "http://127.0.0.1:8000/api/";
Axios.defaults.withCredentials = true;
// backend/order/{order}/status/{status}
//export class API {
  async function all(urlFragment) {
    return await Axios.get(`${baseUrl}${urlFragment}/`);
  };
  /*
  async get(urlFragment, id) {
    return await Axios.get(`${baseUrl}${urlFragment}/${id}`);
  }
  */
  /*
  async save(urlFragment, payload) {
    return await Axios.post(`${baseUrl}`, payload);
  }
  */
  async function update(urlFragment, payload) {
    return await Axios.put(`${baseUrl}${urlFragment}`, payload);
  };
  /*
  async delete(urlFragment, id, payload) {
    return await Axios.delete(`${baseUrl}${urlFragment}/${id}`, payload);
  }
  */
//}
export { all, update };