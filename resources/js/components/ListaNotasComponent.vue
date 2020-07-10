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
              <tr v-for="(notas, k) in listarnotas" :key="k">
                <td>{{ notas.title }}</td>
                <td>
                  <router-link
                    :to="{
                                            name: 'notas/detalle',
                                            params: { id: notas.id }
                                        }"
                  >
                    <v-btn depressed x-small>Ver</v-btn>
                  </router-link>
                  <v-btn depressed x-small v-on:click.prevent="deleteNota(notas.id)">Eliminar</v-btn>
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
      listarnotas: [],
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
          this.listarnotas = response.data.recetas.data;
          this.pagination = response.data.pagination;
        })
        .catch(error => {
          console.log(error);
        });
    },
    searchData: function() {
      axios
        .get("api/buscar/notas?title=" + this.search)
        .then(response => {
          this.listarnotas = response.data.recetas.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    
    deleteNota:function(notas){
			var urlReceta = `api/notas/eliminar/${notas}`
			axios.delete(urlReceta).then(response=>{
				this.mostrarListaNotas();
			})
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
