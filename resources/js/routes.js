import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
	routes: [
		{
			path: '/',
			name: 'index',
			component: require('./views/index').default
		},
		{
			path: '/desayuno',
			name: 'desayuno',
			component: require('./views/desayuno').default
		},
		
		{
			path: '/almuerzo',
			name: 'almuerzo',
			component: require('./views/almuerzo').default
		},
		{
			path: '/cena',
			name: 'cena',
			component: require('./views/cena').default
		},
		{
			path: '/idea',
			name: 'idea',
			component: require('./views/ideas').default
		},
		{
			path: '/merienda',
			name: 'merienda',
			component: require('./views/merienda').default
		},
		{
			path: '/notas',
			name: 'notas',
			component: require('./views/notas').default
		},
		{
			path: '/otros',
			name: 'otros',
			component: require('./views/otros').default
		},
		{
			path: '/receta/:id',
			name: 'receta/detalle',
			component: require('./views/recetaDetalle').default
		},
		{
			path: '/notas/:id',
			name: 'notas/detalle',
			component: require('./views/notasDetalle').default
		},
		{
			path: '*',
			component: require('./views/404').default
		}
	],
	
})