<template>
  <div class="container-detalle">
    <div v-for="(d,k) in desayuno" :key="k">
      <h1>{{d.title}}</h1>
      <h2>{{d.descripcion}}</h2>
      <h3>Ingredientes</h3>
      <ul>
        <li class="list-ing" v-for="ing in JSON.parse(d.ingrediente)" :key="ing">{{ing.name}}</li>
      </ul>

      <h3 v-if="JSON.parse(d.paso).length > 1">Pasos</h3>
      <ol v-if="JSON.parse(d.paso).length > 1">
        <li class="list-pasos" v-for="(paso,p) in JSON.parse(d.paso)" :key="p">{{paso.name}}</li>
      </ol>
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
    this.mostrarDetalleReceta();
  },
  methods: {
    mostrarDetalleReceta() {
      axios
        .get("api/mostrar/receta/" + this.$route.params.id)
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
.container-detalle{
  position: relative;
  min-width: 100vw;
 max-height:calc(100vh - 7rem);
  min-height:calc(100vh - 7rem);
  background-color: #fff;
  color: #333;
  padding: 0 1rem;
  overflow-y: scroll;
}
.list-ing {
  padding: 0.5rem;
  border-bottom: 0.1rem dotted rgba(51, 51, 51, 0.5);
  &:last-child {
    border-bottom: none;
  }
}
.list-pasos{
  padding: 0.5rem;
 
}
</style>
