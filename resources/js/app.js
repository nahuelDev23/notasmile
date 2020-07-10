require('./bootstrap');

window.Vue = require('vue');
Vue.component('app', 				require('./components/AppComponent.vue').default);
Vue.component('form-add-receta', 				require('./components/FormAddRecetaComponent.vue').default);
Vue.component('form-add-notas', 				require('./components/FormAddNotasComponent.vue').default);
Vue.component('menu-footer', 	require('./components/FooterMenuComponent.vue').default);
Vue.component('lista-desayuno', 	require('./components/ListaDesayunoComponent.vue').default);
Vue.component('lista-almuerzo', 	require('./components/ListaAlmuerzoComponent.vue').default);
Vue.component('lista-cena', 	require('./components/ListaCenaComponent.vue').default);
Vue.component('lista-idea', 	require('./components/ListaIdeaComponent.vue').default);
Vue.component('lista-merienda', 	require('./components/ListaMeriendaComponent.vue').default);
Vue.component('lista-otros', 	require('./components/ListaOtrosComponent.vue').default);
Vue.component('lista-notas', 	require('./components/ListaNotasComponent.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);


import router from './routes'
import Vuetify from 'vuetify'
import VueQuillEditor from 'vue-quill-editor'


Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
    
});
