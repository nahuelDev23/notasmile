<template>
  <div>
    <v-app id="inspire">
      <h2 class="title-List">Desayuno veggie 🐣</h2>  
      <input type="text" v-model="name" placeholder="buscar">
      <v-simple-table>
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
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listarDesayuno: [],
    };
  },
  mounted() {
    this.mostrarListaDesayuno();
  },
  
  methods: {
    mostrarListaDesayuno() {
      axios
        .get("api/listar/desayuno")
        .then(response => {
          this.listarDesayuno = response.data;
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
<style lang="scss" scoped>
.title-List{
  text-align: center;
}
</style>
