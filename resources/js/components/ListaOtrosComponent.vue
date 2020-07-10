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
              <tr v-for="(otros, k) in listarotros" :key="k">
                <td>{{ otros.title }}</td>
                <td>
                  <router-link
                    :to="{
                                            name: 'receta/detalle',
                                            params: { id: otros.id }
                                        }"
                  >
                    <v-btn depressed x-small>Ver</v-btn>
                  </router-link>
                  <v-dialog v-model="dialog" persistent max-width="290">
                    <template v-slot:activator="{ on, attrs }">
                      <v-btn class="ml-2" v-bind="attrs" v-on="on" depressed x-small>Eliminar</v-btn>
                    </template>
                    <v-card>
                      <v-card-title class="headline">¿Estas segurx de que lo queres elimiar?</v-card-title>
                      <v-card-text>Despues no le rompas las bolas a tu novio, con que se te perdieron las recetas</v-card-text>
                      <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="green darken-1" text @click="dialog = false">No,jeje</v-btn>
                        <v-btn
                          color="green darken-1"
                          text
                          @click="dialog = false"
                          v-on:click.prevent="deleteReceta(otros.id)"
                        >Si,Estoy segurx</v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-dialog>
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
      dialog: false,
      listarotros: [],
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
          this.listarotros = response.data.recetas.data;
          this.pagination = response.data.pagination;
          console.log(this.pagination);
        })
        .catch(error => {
          console.log(error);
        });
    },
    searchData: function() {
      axios
        .get("api/buscar/otros?title=" + this.search)
        .then(response => {
          this.listarotros = response.data.recetas.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    deleteReceta: function(receta) {
      var urlReceta = `api/receta/eliminar/${receta}`;
      axios.delete(urlReceta).then(response => {
        this.mostrarListaOtros();
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
  max-height: calc(100vh - 18rem);
  min-height: calc(100vh - 18rem);
  overflow: auto;
}
</style>
