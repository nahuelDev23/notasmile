<template>
  <div>
    <v-app id="inspire">
      <div>
        <search-receta :categoria="'index'"  @update:resuladoBusqueda="listarIndex = $event"></search-receta>
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
              <tr v-for="(Index, k) in listarIndex" :key="k">
                <td class="first-mayus">{{ Index.title }}</td>
                <td class="btn-accion">
                   <btn-ver-receta :id_receta="Index.id"></btn-ver-receta>
                   <btn-delete-receta :id="Index.id" :categoria="'index'"></btn-delete-receta>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
        </div>
        <v-pagination
          v-model="page"
          :length="pagination.last_page"
          @input="mostrarListaIndex(page)"
        ></v-pagination>
      
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listarIndex: [],
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0
      },
      page: 1,
    };
  },
  mounted: function() {
    this.mostrarListaIndex();
    this.$root.$on('index',this.mostrarListaIndex)
  },
  methods: {
    mostrarListaIndex: function(page) {
      axios
        .get("api/listar/index?page=" + page)
        .then(response => {
          this.listarIndex = response.data.recetas.data;
          this.pagination = response.data.pagination;
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

.btn-accion{
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
