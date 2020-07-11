<template>
  <div>
    <v-app id="inspire">
      <div>
        <search-receta :categoria="'desayuno'"  @update:resuladoBusqueda="listarDesayuno = $event"></search-receta>
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
              <tr v-for="(desayuno, k) in listarDesayuno" :key="k">
                <td class="first-mayus">{{ desayuno.title }}</td>
                <td>
                  <btn-ver-receta :id_receta="desayuno.id"></btn-ver-receta>
                  <btn-delete-receta :id="desayuno.id" :categoria="'desayuno'"></btn-delete-receta>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
        </div>
        <v-pagination
          v-model="page"
          :length="pagination.last_page"
          @input="mostrarListaDesayuno(page)"
        ></v-pagination>
      
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listarDesayuno: [],
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
    this.mostrarListaDesayuno();
    this.$root.$on('desayuno',this.mostrarListaDesayuno)
  },
  methods: {
   
    mostrarListaDesayuno: function(page) {
      axios
        .get("api/listar/desayuno?page=" + page)
        .then(response => {
          this.listarDesayuno = response.data.recetas.data;
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

</style>
