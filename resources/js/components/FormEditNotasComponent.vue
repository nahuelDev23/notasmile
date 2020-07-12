<template>
  <div class="formulario-receta hidden" id="formulario-edit-notas">
    <v-app>
      <div class="formulario-receta-header">
        <h1 class="formulario-receta-h1">Añade una nueva nota 🐷</h1>
        <span @click="cerrarFormularioEditarNotas">&times;</span>
      </div>
      <form id="formulario-edit-nota" method="POST" v-on:submit.prevent="updateNota">
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

        <v-btn depressed elevation="4" color="primary" type="submit" :loading="loading">Guardar</v-btn>
      </form>
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      idNota: "",
      loading: false,
      autoGrow: true,
      autofocus: true,
      clearable: true,
      counter: 10000,
      filled: false,
      flat: false,
      hint: "",
      label: "",
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
      fillNotas: {
        title: "",
        body: "",
      },
    };
  },

  mounted() {
    this.$root.$on("llenarFormEditNota", this.getNotaEdit);
  },
  computed: {},
  methods: {
    cerrarFormularioEditarNotas: function() {
      const formularioNotas = document.getElementById("formulario-edit-notas");
      formularioNotas.classList.remove("show");
    },
    /**
     * Obtengo los datos para llenar el formulario
     */
    getNotaEdit: function(nota) {
      let urlNota = `api/notas/edit/${nota}`;
      axios.get(urlNota).then(response => {
        document.getElementById("formulario-edit-notas").classList.add("show");
        this.title = response.data.title;
        this.body = response.data.body;
        console.log(response);
        this.idNota = nota;
      });
    },
    updateNota: function() {
      this.loading = true;
      this.fillNotas.title = this.title;
      this.fillNotas.body = this.body;

      axios
        .put("api/notas/update/" + this.idNota, this.fillNotas)
        .then(response => {
          if (response.status == 200) {
            this.loading = false;
            this.cerrarFormularioEditarNotas();

            /**
             * Actualizo la tabla el $on se encuentra en ListaNotaComponent
             * linea 59
             */
            this.$root.$emit('notas');
          }
        })
        .catch(error => {
          console.log(error);
        });
    }
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
    margin-bottom: 0.5rem;
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
