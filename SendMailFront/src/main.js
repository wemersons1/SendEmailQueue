import { createApp } from 'vue';
import App from './App.vue';
import { createRouter, createWebHashHistory } from 'vue-router';
import { routes } from './common/routes';
import './assets/main.css';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
});

const app = createApp(App);

app.use(router);
app.use(Toast, {});

app.mount('#app');


