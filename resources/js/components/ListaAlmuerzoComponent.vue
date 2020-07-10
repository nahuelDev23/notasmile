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
              <tr v-for="(almuerzo, k) in listaralmuerzo" :key="k">
                <td>{{ almuerzo.title }}</td>
                <td>
                  <router-link
                    :to="{
                                            name: 'receta/detalle',
                                            params: { id: almuerzo.id }
                                        }"
                  >
                    <v-btn depressed x-small>Ver</v-btn>
                  </router-link>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
        </div>
        <v-pagination
          v-model="page"
          :length="pagination.last_page"
          @input="mostrarListaAlmuerzo(page)"
        ></v-pagination>
      
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listaralmuerzo: [],
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
    this.mostrarListaAlmuerzo();
    this.$root.$on('almuerzo',this.mostrarListaAlmuerzo)
  },

  methods: {
    alerta:function()
    {
      console.log("ok")
    },
    mostrarListaAlmuerzo: function(page) {
      axios
        .get("api/listar/almuerzo?page=" + page)
        .then(response => {
          this.listaralmuerzo = response.data.recetas.data;
          this.pagination = response.data.pagination;
        })
        .catch(error => {
          console.log(error);
        });
    },
    searchData: function() {
      axios
        .get("api/buscar/almuerzo?title=" + this.search)
        .then(response => {
          this.listaralmuerzo = response.data.recetas.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
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
