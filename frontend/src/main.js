import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from "./store";

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";

const app = createApp(App)


app.use(router)
app.use(store)

app.mount('#app')
