<template>
  <div>
    <v-text-field v-model="search" label="Buscar nota" v-on:keyup="searchData"></v-text-field>
  </div>
</template>

<script>
export default {
  data() {
    return {
      search: ""
    };
  },
 methods: {
    searchData: function() {
      axios
        .get("api/buscar/notas?title=" + this.search)
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