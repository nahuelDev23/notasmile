<template>
  <div class="footer">
    <div class="v-list-link"><router-link :to="{name: 'index'}" >Home</router-link></div>
    <div @click="mostrarModalAgregarReceta">Recetas</div>
    <div @click="mostrarModalAgregarNotas">Notas</div>
  </div>
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
  & a {
    color: #cdd5dc;
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