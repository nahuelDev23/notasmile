<template>
  <div>
    <v-app id="inspire">
      <div>
        <search-receta :categoria="'merienda'"  @update:resuladoBusqueda="listarMerienda = $event"></search-receta>
      </div>
      <div class="table-container-recetas">
        <v-simple-table fixed-header>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Titulo</th>
                <th class="text-left" colspan="2">Acción</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(merienda, k) in listarMerienda" :key="k">
                <td class="first-mayus">{{ merienda.title }}</td>
                <td>
                  <btn-ver-receta :id_receta="merienda.id"></btn-ver-receta>
                  <btn-delete-receta :id="merienda.id" :categoria="'merienda'"></btn-delete-receta>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
        </div>
        <v-pagination
          v-model="page"
          :length="pagination.last_page"
          @input="mostrarListaMerienda(page)"
        ></v-pagination>
      
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listarMerienda: [],
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
    this.mostrarListaMerienda();
    this.$root.$on('merienda',this.mostrarListaMerienda)
  },

  methods: {
    mostrarListaMerienda: function(page) {
      axios
        .get("api/listar/merienda?page=" + page)
        .then(response => {
          this.listarMerienda = response.data.recetas.data;
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
 max-height:calc(100vh - 18rem);
 min-height:calc(100vh - 18rem);
  overflow:auto;
}

</style>
