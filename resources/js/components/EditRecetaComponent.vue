<template>
  <v-btn class="ml-2" depressed x-small @click="getReceta(id)">Editar</v-btn>
</template>

<script>
export default {
  props: ["id"],
  data() {
    return {
     
    };
  },
  mounted: function() {},

  methods: {
    // getReceta: function(receta) {
    //   var urlReceta = `api/receta/edit/${receta}`;
    //   axios.get(urlReceta).then(response => {
    //     document.getElementById('formulario-edit-receta').classList.add('show')
		// 	  this.fillReceta.title = response.data.title;
    //     console.log(response)
    //   });
    // }
  }
};
</script>
