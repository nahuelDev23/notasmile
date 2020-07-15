<template>
  <div class="formulario-receta hidden" id="formulario-edit-receta">
    <v-app>
      <div class="formulario-receta-header">
        <h1 class="formulario-receta-h1">Editar receta 🐷</h1>
        <span @click="cerrarFormularioEditarReceta">&times;</span>
      </div>
      <form id="formulario-edit-recetas" method="POST" v-on:submit.prevent="updateReceta">
        <div class="input-group mb-3">
          <input
            class="form-control"
            type="text"
            v-model="fillReceta.title"
            placeholder="Titulo"
            name="title"
            required
          />
        </div>

        <div class="input-group mb-3">
          <input
            class="form-control"
            type="text"
            v-model="fillReceta.descripcion"
            placeholder="Descripcion (Opcional)"
            name="descripcion"
          />
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect02">Categorias</label>
          </div>
          <select
            class="custom-select"
            id="inputGroupSelect02"
            v-model="fillReceta.categoria"
            required
          >
            <option value selected>Elegi</option>
            <option value="almuerzo">Almuerzo</option>
            <option value="cena">Cena</option>
            <option value="desayuno">Desayuno</option>
            <option value="merienda">Merienda</option>
            <option value="otros">Otros</option>
            <option value="ideas">Ideas</option>
          </select>
        </div>

        <div class="input-group mb-3" v-for="(input, k) in inputs" :key="k">
          <input
            class="form-control"
            type="text"
            v-model="input.name"
            placeholder="Ingrediente"
            name="ingrediente"
            required
          />
          <div class="input-group-append">
            <span
              class="input-group-text"
              @click="remove(k)"
              v-show="k || (!k && inputs.length > 1)"
            >Menos</span>

            <span class="input-group-text" @click="add(k)" v-show="k == inputs.length - 1">Mas</span>
          </div>
        </div>
        <!-- PASOS -->

        <v-switch v-model="switch1" label="¿Agregar pasos?"></v-switch>
        <div v-if="switch1">
          <div class="input-group mb-3" v-for="(paso, p) in pasos" :key="p + 100">
            <input
              class="form-control"
              type="text"
              v-model="paso.name"
              :placeholder="'Paso Nº' + p"
              name="paso"
            />
            <div class="input-group-append">
              <span
                class="input-group-text"
                @click="removePaso(p)"
                v-show="p || (!p && pasos.length > 1)"
              >Menos</span>

              <span class="input-group-text" @click="addPaso(p)" v-show="p == pasos.length - 1">Mas</span>
            </div>
          </div>
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
      categoriaActual:'',
      idReceta: "",
      loading: false,
      switch1: true,
      descripcion: "",
      categoria: "",
      fillReceta: {
        title: "",
        descripcion: "",
        categoria: ""
      },
      inputs: [
        {
          name: ""
        }
      ],
      pasos: [
        {
          name: ""
        }
      ]
    };
  },
  mounted() {
    this.$root.$on("llenarFormEdit", this.getRecetaEdit);
    this.$root.$on("actualizaVariableCategoriaActual", this.setterCategoriaActual);
    
  },
  methods: {
    cerrarFormularioEditarReceta: function() {
      const formularioEditarReceta = document.getElementById(
        "formulario-edit-receta"
      );
      formularioEditarReceta.classList.remove("show");
    },
    add(index) {
      this.inputs.push({ name: "" });
    },
    remove(index) {
      this.inputs.splice(index, 1);
    },
    addPaso(index) {
      this.pasos.push({ name: "" });
    },
    removePaso(index) {
      this.pasos.splice(index, 1);
    },
    /**
     * Obtengo los datos para llenar el formulario
     */
    getRecetaEdit: function(idDeLaReceta) {
      let urlReceta = `api/receta/edit/${idDeLaReceta}`;
      axios.get(urlReceta).then(response => {
        document.getElementById("formulario-edit-receta").classList.add("show");
        this.fillReceta.title = response.data.title;
        this.fillReceta.descripcion = response.data.descripcion;
        this.fillReceta.categoria = response.data.categoria;
        this.inputs = JSON.parse(response.data.ingrediente);
        this.pasos = JSON.parse(response.data.paso);
        this.idReceta = idDeLaReceta;
      });
    },
    updateReceta: function() {
      this.loading = true;
      this.fillReceta.ingrediente = this.inputs;
      this.fillReceta.paso = this.pasos;

      axios
        .put("api/receta/update/" + this.idReceta, this.fillReceta)
        .then(response => {
          if (response.status == 200) {
            this.resetForm()
            this.loading = false;
            this.cerrarFormularioEditarReceta();

            /**
             * Actualizo la tabla el $on se encuentra en ListaRecetaComponent
             * linea 59
             */
            this.$root.$emit(this.categoriaActual)
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    setterCategoriaActual:function(valorCategoriaActual)
    {
         this.categoriaActual = valorCategoriaActual;
    },
    resetForm:function()
    {
      document.getElementById("formulario-edit-recetas").reset();
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
