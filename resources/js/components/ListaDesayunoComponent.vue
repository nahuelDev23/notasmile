<template>
  <div class="container">
    <h1>list desayuno</h1>
    <table class="table table-hover table-striped">
      <thead class="thead-dark">
        <tr>
          <th>Titulo</th>  
          <th>Acción</th>  
        </tr>
       
      </thead>
      <tbody>
        
        <tr v-for="(desayuno,k) in listarDesayuno" :key="k">
          <td>{{desayuno.title}}</td>
          <td><router-link class="badge badge-dark" :to="{name: 'desayuno/detalle', params: {id: desayuno.id}}">Ver</router-link></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
     listarDesayuno : []
    };
  },
  mounted() {
    this.mostrarListaDesayuno()
  },
  methods: {
   
    mostrarListaDesayuno()
    {
         axios.get("api/listar/desayuno")
       .then(response => {
                this.listarDesayuno = response.data
                console.log(response)
            })
        .catch(error => {

          console.log(error)
			}); 
    },
  }
};
</script>
