<template>
  <div>
    <div class="container">
      <div class="display-grid">
        <div v-for="(d,k) in desayuno" :key="k">
          <h1>{{d.title}}</h1>
          <h2 v-html="d.body"></h2>
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

<style lang="scss"></style>
