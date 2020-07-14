<template>
      <v-bottom-navigation
      :value="activeBtn"
      color="purple lighten-1"
      fixed
    >
      <v-btn>
        <div class="v-list-link">
        <router-link :to="{name: 'index'}" >
        <span>Home</span>
        <v-icon>mdi-home</v-icon>
        </router-link>
        </div>
      </v-btn>
  
      <v-btn @click="mostrarModalAgregarReceta">
        <div class="v-list-link">
        <span  > Recetas</span>
        <v-icon>mdi-heart</v-icon>
        </div>
      </v-btn>
  
      <v-btn @click="mostrarModalAgregarNotas">
        <div class="v-list-link">
        <span >Notas</span>
        <v-icon>mdi-note</v-icon>
         </div>
      </v-btn>
     
    </v-bottom-navigation>
</template>

<script>
export default {
  data() {
    return {
     
    };
  },
  mounted() {
    //this.verReceta()
  },
  methods: {
    mostrarModalAgregarReceta()
    {
       /**
        * Mostrar Farmulario
        * FormAddRecetaComponent
        * <form-add-receta>
        */
       const formularioReceta = document.getElementById('formulario-receta')
       formularioReceta.classList.add('show')
    },
    mostrarModalAgregarNotas()
    {
         /**
        * Mostrar Farmulario
        * FormAddRecetaComponent
        * <form-add-receta>
        */
       const formularioNotas = document.getElementById('formulario-notas')
       formularioNotas.classList.add('show')
    },

  }
};
</script>
<style lang="scss" scoped>
.v-list-link {
    display: flex;
    flex-direction: column-reverse;
    text-decoration: none;
    color: #333;
  & a {
     display: flex;
    flex-direction: column-reverse;
    text-decoration: none;
    color: #333;
  }
}
.footer{
      position:fixed;
      display: flex;
      justify-content: space-around;
      width: 100vw;
      bottom:0;
      background-color: #333;
      line-height: 3;
      color:#e6e6e6;
      font-size: 1rem;
}
</style>