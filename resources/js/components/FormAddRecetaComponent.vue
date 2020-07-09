<template>
  <div class="formulario-receta hidden" id="formulario-receta">
    <div class="formulario-receta-header">
      <h1 class="formulario-receta-h1">Añade una nueva receta 🐷</h1>
      <span @click="cerrarFormularioReceta">&times;</span>
    </div>
    <form method="POST" v-on:submit.prevent="crearReceta">
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
        <input
          class="form-control"
          type="text"
          v-model="descripcion"
          placeholder="Descripcion (Opcional)"
          name="descripcion"
        />
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Categorias</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" v-model="categoria">
          <option selected>Elegi</option>
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
          <span class="input-group-text" @click="remove(k)" v-show="k || (!k && inputs.length > 1)">Menos</span>

          <span class="input-group-text" @click="add(k)" v-show="k == inputs.length - 1">Mas</span>
        </div>
      </div>

      <div class="input-group mb-3" v-for="(paso, p) in pasos" :key="p+100">
        <input
          class="form-control"
          type="text"
          v-model="paso.name"
          :placeholder="'Paso Nº'+ p"
          name="paso"
        />
        <div class="input-group-append">
          <span class="input-group-text" @click="removePaso(p)" v-show="p || (!p && pasos.length > 1)">Menos</span>

          <span class="input-group-text" @click="addPaso(p)" v-show="p == pasos.length - 1">Mas</span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-1">Guardar</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title: "",
      descripcion: "",
      categoria: "",
      inputs: [
        {
          name: ""
        }
      ],
      pasos: [
        {
          name: ""
        }
      ],
    };
  },
  mounted() {
    //this.verReceta()
  },
  methods: {
    cerrarFormularioReceta: function() {
      const formularioReceta = document.getElementById("formulario-receta");
      formularioReceta.classList.remove("show");
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
    crearReceta() {
      var data = new FormData();
      data.append("title", this.title);
      data.append("descripcion", this.descripcion);
      data.append("ingrediente", JSON.stringify(this.inputs));
      data.append("categoria", JSON.stringify(this.categoria));
      data.append("paso", JSON.stringify(this.pasos));

      axios
        .post("api/receta/store", data)
        .then(response => {
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
.formulario-receta {
  position: fixed;
  content: "";
  min-width: 100vw;
  min-height: 100vh;
  max-height: 100vh;
  background-color: #fff;
  z-index: 2;
  color: #333;
  padding: 0 1rem;
  overflow-y: scroll;

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
  display: block; //none
}
.show {
  display: block;
}
</style>
