require('./bootstrap');

window.Vue = require('vue');
Vue.component('app', 				require('./components/AppComponent.vue').default);
Vue.component('form-add-receta', 				require('./components/FormAddRecetaComponent.vue').default);
Vue.component('menu-footer', 	require('./components/FooterMenuComponent.vue').default);
Vue.component('lista-desayuno', 	require('./components/ListaDesayunoComponent.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import router from './routes'
const app = new Vue({
    el: '#app',
    router,
});
