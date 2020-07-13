<template>
  <div>
    <v-text-field v-model="search" label="Buscar receta" v-on:keyup="searchData"></v-text-field>
  </div>
</template>

<script>
export default {
  props: ["categoria"],
  data() {
    return {
      search: ""
    };
  },
  methods: {
    searchData: function() {
      axios
        .get("api/receta/buscar/?categoria="+this.categoria+"&title=" + this.search)
        .then(response => {
          this.$emit("update:resuladoBusqueda", response.data.recetas.data);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
