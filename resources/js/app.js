require('./bootstrap');

window.Vue = require('vue');
Vue.component('app', 				            require('./components/AppComponent.vue').default);

Vue.component('btn-delete-receta', 				require('./components/DeleteRecetaComponent.vue').default);
Vue.component('btn-delete-notas', 				require('./components/DeleteNotasComponent.vue').default);
Vue.component('btn-ver-receta', 				require('./components/VerRecetaComponent.vue').default);
Vue.component('btn-ver-notas', 				    require('./components/VerNotasComponent.vue').default);
Vue.component('btn-edit-receta', 				require('./components/EditRecetaComponent.vue').default);

Vue.component('search-receta', 				    require('./components/SearchRecetaComponent.vue').default);
Vue.component('search-notas', 				    require('./components/SearchNotasComponent.vue').default);

Vue.component('form-add-receta', 				require('./components/FormAddRecetaComponent.vue').default);
Vue.component('form-add-notas', 				require('./components/FormAddNotasComponent.vue').default);
Vue.component('form-edit-receta', 				require('./components/FormEditReceta.vue').default);

Vue.component('menu-footer', 	                require('./components/FooterMenuComponent.vue').default);

Vue.component('lista-receta', 	                require('./components/ListaRecetaComponent.vue').default);
Vue.component('lista-notas', 	                require('./components/ListaNotasComponent.vue').default);

import router from './routes'
import Vuetify from 'vuetify'

Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
    
});
