<template>
  <div>
   
  
    <v-app id="inspire" >
      <div>
         <v-text-field  v-model="search" label="Buscar receta"  v-on:keyup="searchData"></v-text-field>
      
      </div>
      <v-simple-table fixed-header height="50vh">
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Titulo</th>
              <th class="text-left">Acción</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(desayuno,k) in listarDesayuno" :key="k">
              <td>{{desayuno.title}}</td>
              <td>
                <router-link :to="{name: 'desayuno/detalle', params: {id: desayuno.id}}">
                  <v-btn depressed x-small>Ver</v-btn>
                </router-link>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
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
      search:'',
    };
  },
  created: function() {
    this.mostrarListaDesayuno();
  },

  methods: {
    mostrarListaDesayuno: function(page) {
      axios
        .get("api/listar/desayuno?page=" + page)
        .then(response => {
          this.listarDesayuno = response.data.recetas.data;
          this.pagination = response.data.pagination;
          console.log(this.pagination);
        })
        .catch(error => {
          console.log(error);
        });
    },
    searchData:function()
    {
      axios
        .get("api/buscar/desayuno?title=" + this.search)
        .then(response => {
          this.listarDesayuno = response.data.recetas.data;
         
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
</style>
