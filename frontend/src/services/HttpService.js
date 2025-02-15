import axios from "axios";

const laravelApi = axios.create ({
  baseURL: "http://127.0.0.1:8000/api",
  Headers: {
    "content-type": "application/json",
  },
})

export default laravelApi;
