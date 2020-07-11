<template>
  <div class="container-detalle">
        <div v-for="(d,k) in desayuno" :key="k">
          <h1 class="detalle-title first-mayus">{{d.title}}</h1>
          <p class="first-mayus" v-html="d.body"></p>
        </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      desayuno: []
    };
  },
  mounted() {
    this.mostrarDetalleNotas();
  },
  methods: {
    mostrarDetalleNotas() {
      axios
        .get("api/mostrar/notas/" + this.$route.params.id)
        .then(response => {
          this.desayuno = response.data;
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style lang="scss">
/*
* El estilo esta declarado en recetasDetalle 
*/

</style>
