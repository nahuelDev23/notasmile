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
			path: 'desayuno',
			name: 'desayuno',
			component: require('./views/desayuno').default
		},
		{
			path: '/desayuno/:id',
			name: 'desayuno/detalle',
			component: require('./views/desayunoDetalle').default
		},
		{
			path: 'almuerzo',
			name: 'almuerzo',
			component: require('./views/almuerzo').default
		},
		{
			path: 'cena',
			name: 'cena',
			component: require('./views/cena').default
		},
		{
			path: 'ideas',
			name: 'ideas',
			component: require('./views/ideas').default
		},
		{
			path: 'merienda',
			name: 'merienda',
			component: require('./views/merienda').default
		},
		{
			path: 'notas',
			name: 'notas',
			component: require('./views/notas').default
		},
		{
			path: 'otros',
			name: 'otros',
			component: require('./views/otros').default
		},
		{
			path: '*',
			component: require('./views/404').default
		}
	],
	
})