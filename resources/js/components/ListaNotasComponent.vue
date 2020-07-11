<template>
  <div>
    <v-app id="inspire">
      <div>
        <search-notas  @update:resuladoBusqueda="listarNotas = $event"></search-notas>
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
              <tr v-for="(notas, k) in listarNotas" :key="k">
                <td>{{ notas.title }}</td>
                <td>
                  <btn-ver-notas :id_notas="notas.id"></btn-ver-notas>
                  <btn-delete-notas :id="notas.id"></btn-delete-notas>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
        </div>
        <v-pagination
          v-model="page"
          :length="pagination.last_page"
          @input="mostrarListaNotas(page)"
        ></v-pagination>
      
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listarNotas: [],
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
  created: function() {
    this.mostrarListaNotas();
    this.$root.$on('notas',this.mostrarListaNotas)
  },

  methods: {
    mostrarListaNotas: function(page) {
      axios
        .get("api/listar/notas?page=" + page)
        .then(response => {
          console.log(response)
          this.listarNotas = response.data.notas.data;
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
