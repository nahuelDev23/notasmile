<template>
  <div>
    <v-app id="inspire">
      <div>
        <search-receta :categoria="'otros'"  @update:resuladoBusqueda="listarOtros = $event"></search-receta>
      </div>
      <div class="table-container-recetas">
        <v-simple-table fixed-header>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Titulo</th>
                <th class="text-left">Acción</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(otros, k) in listarOtros" :key="k">
                <td class="first-mayus">{{ otros.title }}</td>
                <td>
                  <btn-ver-receta :id_receta="otros.id"></btn-ver-receta>
                  <btn-delete-receta :id="otros.id" :categoria="'otros'"></btn-delete-receta>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </div>
      <v-pagination v-model="page" :length="pagination.last_page" @input="mostrarListaOtros(page)"></v-pagination>
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listarOtros: [],
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0
      },
      page: 1,
      search: ""
    };
  },
  mounted: function() {
    this.mostrarListaOtros();
    this.$root.$on("otros", this.mostrarListaOtros);
  },

  methods: {
    mostrarListaOtros: function(page) {
      axios
        .get("api/listar/otros?page=" + page)
        .then(response => {
          this.listarOtros = response.data.recetas.data;
          this.pagination = response.data.pagination;
          console.log(this.pagination);
        })
        .catch(error => {
          console.log(error);
        });
    },
  }
};
</script>
<style lang="scss" scoped>
.title-List {
  text-align: center;
}

.table-container-recetas {
  max-height: calc(100vh - 18rem);
  min-height: calc(100vh - 18rem);
  overflow: auto;
}
</style>
