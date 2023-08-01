import './bootstrap';
import { createApp, defineAsyncComponent } from 'vue';
import router from '@/router';
// import App from '@/App.vue';

const App = defineAsyncComponent({
    loader: () => import('@/App.vue')

})
const app = createApp(App);
app.use(router);
app.mount('#app');