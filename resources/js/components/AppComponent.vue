<style lang="css">
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
<template>
	<div>
      <form-add-receta></form-add-receta>
    	<div class="absolute">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <div >
                        <li class="nav-item active"><router-link :to="{name: 'index'}" class="nav-link">Home<span class="sr-only">(current)</span></router-link></li>
                        <li class="nav-item"><router-link :to="{name: 'desayuno'}" class="nav-link">Desayuno</router-link></li>   
                        <li class="nav-item"><router-link :to="{name: 'almuerzo'}" class="nav-link">Almuerzo</router-link></li>
                        <li class="nav-item"><router-link :to="{name: 'cena'}" class="nav-link">Cena</router-link></li>
                        <li class="nav-item"><router-link :to="{name: 'ideas'}" class="nav-link">Ideas</router-link></li>
                        <li class="nav-item"><router-link :to="{name: 'merienda'}" class="nav-link">Merienda</router-link></li>
                        <li class="nav-item"><router-link :to="{name: 'notas'}" class="nav-link">Notas</router-link></li>
                        <li class="nav-item"><router-link :to="{name: 'otros'}" class="nav-link">Otros</router-link></li>
                    </div>
                </ul>
              </div>
            </nav>
        </div>

		<transition name="fade" mode="out-in">
			<router-view :key="$route.fullPath"></router-view>
		</transition>
      <menu-footer></menu-footer>
     </div>
</template>