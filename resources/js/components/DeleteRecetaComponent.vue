<template>
  <v-dialog v-model="dialog" persistent max-width="290">
    <template v-slot:activator="{ on, attrs }">
      <v-btn class="ml-2" v-bind="attrs" v-on="on" depressed x-small>Eliminar</v-btn>
    </template>
    <v-card>
      <v-card-title class="headline">¿Estas segurx de que lo queres elimiar?</v-card-title>
      <v-card-text>
        Despues no le rompas las bolas a tu novio, con que se te
        perdieron las recetas
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="green darken-1" text @click="dialog = false">No,jeje</v-btn>
        <v-btn
          color="green darken-1"
          text
          @click="dialog = false"
          v-on:click.prevent="deleteReceta(id)"
        >Si,Estoy segurx</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: [
        "id",
        "categoria"
        ],
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
  mounted: function() {},

  methods: {
    deleteReceta: function(receta) {
      var urlReceta = `api/receta/eliminar/${receta}`;
      axios.delete(urlReceta).then(response => {
         if(this.categoria == 'almuerzo')
              {
                this.$root.$emit('almuerzo');
              }
              if(this.categoria == 'cena')
              {
                this.$root.$emit('cena');
              }
              if(this.categoria == 'desayuno')
              {
                this.$root.$emit('desayuno');
              }
              if(this.categoria == 'merienda')
              {
                this.$root.$emit('merienda');
              }
              if(this.categoria == 'otros')
              {
                this.$root.$emit('otros');
              }
              if(this.categoria == 'ideas')
              {
                this.$root.$emit('idea');
              }
              if(this.categoria == 'index')
              {
                this.$root.$emit('index');
              }
      });
    }
  }
};
</script>
