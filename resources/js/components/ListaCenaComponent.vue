<template>
  <div>
    <v-app id="inspire">
      <div>
        <search-receta :categoria="'cena'" @update:resuladoBusqueda="listarCena = $event"></search-receta>
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
              <tr v-for="(cena, k) in listarCena" :key="k">
                <td class="first-mayus">{{ cena.title }}</td>
                <td>
                   <btn-ver-receta :id_receta="cena.id"></btn-ver-receta>
                   <btn-delete-receta :id="cena.id" :categoria="'cena'"></btn-delete-receta>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
        </div>
        <v-pagination
          v-model="page"
          :length="pagination.last_page"
          @input="mostrarListaCena(page)"
        ></v-pagination>
      
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listarCena: [],
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
    this.mostrarListaCena();
    this.$root.$on('cena',this.mostrarListaCena)
  },

  methods: {
    mostrarListaCena: function(page) {
      axios
        .get("api/listar/cena?page=" + page)
        .then(response => {
          this.listarCena = response.data.recetas.data;
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
