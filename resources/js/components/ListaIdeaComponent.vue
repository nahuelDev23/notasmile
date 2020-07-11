<template>
  <div>
    <v-app id="inspire">
      <div>
        <v-text-field v-model="search" label="Buscar receta" v-on:keyup="searchData"></v-text-field>
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
              <tr v-for="(idea, k) in listaridea" :key="k">
                <td>{{ idea.title }}</td>
                <td>
                  <btn-ver-receta :id_receta="idea.id"></btn-ver-receta>
                  <btn-delete-receta :id="idea.id" :categoria="'ideas'"></btn-delete-receta>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
        </div>
        <v-pagination
          v-model="page"
          :length="pagination.last_page"
          @input="mostrarListaIdea(page)"
        ></v-pagination>
      
    </v-app>
  </div>
</template>

<script>
//this.$root.$emit('eliminarReceta');
export default {
  data() {
    return {
      listaridea: [],
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
    this.mostrarListaIdea();
    this.$root.$on('idea',this.mostrarListaIdea)
  },

  methods: {
    mostrarListaIdea: function(page) {
      axios
        .get("api/listar/idea?page=" + page)
        .then(response => {
          this.listaridea = response.data.recetas.data;
          this.pagination = response.data.pagination;
          console.log(this.pagination);
        })
        .catch(error => {
          console.log(error);
        });
    },
    searchData: function() {
      axios
        .get("api/buscar/idea?title=" + this.search)
        .then(response => {
          this.listaridea = response.data.recetas.data;
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
