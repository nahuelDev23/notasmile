<template>
  <div>
    <v-app id="inspire">
      <div>
        <search-receta :categoria="categoriaReceta"  @update:resuladoBusqueda="listarReceta = $event"></search-receta>
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
              <tr v-for="(receta, k) in listarReceta" :key="k">
                <td class="first-mayus">{{ receta.title }}</td>
                <td class="btn-accion">
                   <btn-ver-receta :id_receta="receta.id"></btn-ver-receta>
                   <v-btn class="ml-2" depressed x-small @click="getFillRecetaEdit(receta.id,categoriaReceta)">Editar</v-btn>
                   <btn-delete-receta :id="receta.id" :categoria="categoriaReceta"></btn-delete-receta>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
        </div>
        <v-pagination
          v-model="page"
          :length="pagination.last_page"
          @input="mostrarListaReceta(page)"
        ></v-pagination>
      
    </v-app>
  </div>
</template>

<script>
export default {
  props: ["categoriaReceta"],
  data() {
    return {
      listarReceta: [],
      pagination: {
        last_page: 0,
      },
      
      page: 1,
    };
  },
  mounted: function() {
    this.mostrarListaReceta();
    this.$root.$on(this.categoriaReceta,this.mostrarListaReceta)
  },
  methods: {
    /**
     * helper para ejecutar el root.on que esta en formEditReceta
     * lo que hago es pasar el id que consigo iterando arriba y se lo paso al otro archivo para que
     * triga los datos que me sirven para rellenar los input
     */
    getFillRecetaEdit(idDeLaReceta,valorCategoriaActual)
    {
      this.$root.$emit("llenarFormEdit",idDeLaReceta)

      /**
       * en formEditReceta uso $on("actualizaVariableCategoriaActual", this.setterCategoriaActual);
       * y aca le paso la categoria en la que estoy (valorCategoriaActual) 
       * la funcion setterCategoriaActual:function(valorCategoriaActual) 
       * en formEditReceta lo que hace es asignar 
       * el valor que paso valorCategoriaActual a una variable que se encuentra en formEditReceta (categoriaActual)
       * y de ahi una vez que el status del update es 200 uso this.$root.$emit(this.categoriaActual)
       * el cual proviene de este mismo documento en la linea 59
       */
      this.$root.$emit("actualizaVariableCategoriaActual",valorCategoriaActual)
      
    },
    mostrarListaReceta: function(page) {
      axios
        .get(`api/listar/receta/&categoria=${this.categoriaReceta}&page=${page}`)
        .then(response => {
          this.listarReceta = response.data.recetas.data;
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
.btn-accion{
  display:flex;
  justify-content: center;
  align-items: center;
}
.title-List {
  text-align: center;
}

.table-container-recetas {
 max-height:calc(100vh - 18rem);
 min-height:calc(100vh - 18rem);
  overflow:auto;
}

</style>
