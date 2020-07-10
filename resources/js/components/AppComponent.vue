<style lang="css">
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
<template>
  <div>
    <form-add-receta></form-add-receta>

    <v-app id="inspire">
      <v-card class="mx-auto overflow-hidden" height="100vh" width="100%">
        <v-app-bar color="#333" dark>
          <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

          <v-toolbar-title>Mile viggie</v-toolbar-title>
        </v-app-bar>

        <v-navigation-drawer v-model="drawer" absolute temporary color="#333">
          <v-list nav dense>
            <v-list-item-group v-model="group" active-class="text--accent-4">
              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="#cdd5dc">mdi-home</v-icon>
                </v-list-item-icon>
                <v-list-item-title class="v-list-link">
                  <router-link :to="{name: 'index'}">Home</router-link>
                </v-list-item-title>
              </v-list-item>
              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="#cdd5dc">mdi-tea</v-icon>
                </v-list-item-icon>
                <v-list-item-title class="v-list-link">
                  <router-link :to="{name: 'desayuno'}">Desayuno</router-link>
                </v-list-item-title>
              </v-list-item>
              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="#cdd5dc">mdi-apple</v-icon>
                </v-list-item-icon>
                <v-list-item-title class="v-list-link">
                  <router-link :to="{name: 'almuerzo'}">Almuerzo</router-link>
                </v-list-item-title>
              </v-list-item>
              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="#cdd5dc">mdi-moon-waning-crescent</v-icon>
                </v-list-item-icon>
                <v-list-item-title class="v-list-link">
                  <router-link :to="{name: 'cena'}">Cena</router-link>
                </v-list-item-title>
              </v-list-item>
              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="#cdd5dc">mdi-lightbulb</v-icon>
                </v-list-item-icon>
                <v-list-item-title class="v-list-link">
                  <router-link :to="{name: 'ideas'}">Ideas</router-link>
                </v-list-item-title>
              </v-list-item>
              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="#cdd5dc">mdi-cookie</v-icon>
                </v-list-item-icon>
                <v-list-item-title class="v-list-link">
                  <router-link :to="{name: 'merienda'}">Merienda</router-link>
                </v-list-item-title>
              </v-list-item>
              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="#cdd5dc">mdi-note-multiple</v-icon>
                </v-list-item-icon>
                <v-list-item-title class="v-list-link">
                  <router-link :to="{name: 'notas'}">Notas</router-link>
                </v-list-item-title>
              </v-list-item>
              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="#cdd5dc">mdi-alien</v-icon>
                </v-list-item-icon>
                <v-list-item-title class="v-list-link">
                  <router-link :to="{name: 'otros'}">Otros</router-link>
                </v-list-item-title>
              </v-list-item>
            </v-list-item-group>
          </v-list>
        </v-navigation-drawer>
        <transition>
          <router-view :key="$route.fullPath"></router-view>
        </transition>
        <menu-footer></menu-footer>
      </v-card>
    </v-app>
  </div>
</template>
<script>
export default {
  data() {
    return {
      drawer: false,
      group: ""
    };
  }
};
</script>

<style lang="scss" scoped>
.v-list-link {
  & a {
    color: #cdd5dc;
  }
}
</style>