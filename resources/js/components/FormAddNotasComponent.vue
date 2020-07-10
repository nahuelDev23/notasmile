<template>
  <div class="formulario-receta hidden" id="formulario-notas">
    <v-app>
      <div class="formulario-receta-header">
        <h1 class="formulario-receta-h1">Añade una nueva nota 🐷</h1>
        <span @click="cerrarFormularioNotas">&times;</span>
      </div>
      <form id="formulario-nota" method="POST" v-on:submit.prevent="crearNotas">
        <div class="input-group mb-3">
          <input
            class="form-control"
            type="text"
            v-model="title"
            placeholder="Titulo"
            name="title"
            required
          />
        </div>

        <div class="input-group mb-3">
         
            <v-textarea
            v-model="body"
            :auto-grow="autoGrow"
            :clearable="clearable"
            :counter="counter ? counter : false"
            :filled="filled"
            :flat="flat"
            :hint="hint"
            :label="label"
            :loading="loading"
            :no-resize="noResize"
            :outlined="outlined"
            :persistent-hint="persistentHint"
            placeholder="Estoy pensando en..."
            :rounded="rounded"
            :row-height="rowHeight"
            :rows="rows"
            :shaped="shaped"
            :single-line="singleLine"
            :solo="solo"
            name="body"
            required
          ></v-textarea>

       
        </div>
        
        <button type="submit" class="btn btn-primary mt-1">Guardar</button>
      </form>
  
    </v-app>
  </div>
</template>

<script>

export default {
  
  data() {
    return {
       autoGrow: true,
      autofocus: true,
      clearable: true,
      counter: 10000,
      filled: false,
      flat: false,
      hint: '',
      label: '',
      loading: false,
      noResize: false,
      outlined: false,
      persistentHint: false,
      rounded: false,
      rowHeight: 24,
      rows: 1,
      shaped: false,
      singleLine: false,
      solo: false,
      title: "",
      body: "",
    };
  },
  
  mounted() {
    //this.verReceta()
  },
  computed:{
   
  },
  methods: {
    cerrarFormularioNotas: function() {
      const formularioNotas = document.getElementById("formulario-notas");
      formularioNotas.classList.remove("show");
    },
   
    crearNotas() {
      var data = new FormData();
      data.append("title", this.title);
      data.append("body", this.body);
     
      axios
        .post("api/notas/store", data)
        .then(response => {
          if(response.status == 200)
          {
              this.cerrarFormularioNotas()  
              document.getElementById("formulario-nota").reset()
              
              this.$root.$emit('notas');
              
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    
  }
};
</script>
<style lang="scss" scoped>
.formulario-receta {
  position: fixed;
  content: "";
  min-width: 100vw;
  min-height: 100%;
  max-height: 100%;
  background-color: #fff;
  z-index: 900;
  color: #333;
  padding: 0 1rem;
  overflow-y: scroll;
  & form {
    height: 100%;
    overflow-y: scroll;
    margin-bottom: .5rem;
    background-color: #fff;
  }
  &-header span {
    cursor: pointer;
    margin-bottom: 1rem;
    font-size: 1.5rem;
  }

  &-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 1rem;
  }
  &-h1 {
    font-size: 1.3rem;
    margin: 0;
    margin-bottom: 1rem;
  }
}
.hidden {
  display: none; //none
}
.show {
  display: block;
}
</style>
