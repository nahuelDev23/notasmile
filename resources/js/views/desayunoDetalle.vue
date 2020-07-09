<template>
  <div>
    <div class="container">
      <div class="display-grid">
        <div v-for="(d,k) in desayuno" :key="k">
          <h1>{{d.title}}</h1>
          <h2>{{d.descripcion}}</h2>
          <h3>Ingredientes</h3>
          <ul>
            <li v-for="ing in JSON.parse(d.ingrediente)" :key="ing">{{ing.name}}</li>
          </ul>
          <h3 v-if="d.paso">Pasos</h3>
          <ol>
            <li v-for="(paso,p) in JSON.parse(d.paso)" :key="p">{{paso.paso}}</li>
          </ol>
        </div>
      </div>
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
    this.mostrarDetalleDesayuno();
  },
  methods: {
    mostrarDetalleDesayuno() {
      axios
        .get("api/mostrar/desayuno/" + this.$route.params.id)
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

<style lang="scss"></style>
