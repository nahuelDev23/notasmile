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
          <div class="ck">
            <ckeditor :editor="editor" v-model="body" :config="editorConfig"></ckeditor>
          </div>
        </div>
        
        <v-btn depressed elevation="4" color="primary" type="submit" :loading="loading">Guardar</v-btn>
      </form>
  
    </v-app>
  </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
  
  data() {
    return {
       editor: ClassicEditor,
        editorData: '<p>Content of the editor.</p>',
        editorConfig: {
             toolbar: [ 'bold', 'bulletedList', '|', 'link' ]
        },
      title: "",
      body: "",
      loading:false,
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
      this.loading=true;
      var data = new FormData();
      data.append("title", this.title);
      data.append("body", this.body);
     
      axios
        .post("api/notas/store", data)
        .then(response => {
          if(response.status == 200)
          {
              this.loading=false;
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
.ck{
  background-color: red;
  width:100%;
  max-width: 100%;
  overflow-x:auto;
}
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
