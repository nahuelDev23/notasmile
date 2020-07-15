<template>
  <v-skeleton-loader
    :loading="loading"
    :transition="transition"
    height="94"
    type="list-item-two-line"
  >
    <div class="container-detalle">
      <div v-for="(d, k) in desayuno">
        <h1 class="detalle-title first-mayus">{{ d.title }}</h1>
        <p class="detalle-description first-mayus">{{ d.descripcion }}</p>
        <h3 class="detalle-title-title">Ingredientes</h3>
        <ul>
          <li class="list-ing first-mayus" v-for="ing in JSON.parse(d.ingrediente)">{{ ing.name }}</li>
        </ul>
        <hr />
        <h3 class="detalle-title-title" v-if="JSON.parse(d.paso).length > 1">Pasos</h3>
        <ol v-if="JSON.parse(d.paso).length > 1">
          <li class="list-pasos first-mayus" v-for="(paso, p) in JSON.parse(d.paso)">{{ paso.name }}</li>
        </ol>
      </div>
    </div>
  </v-skeleton-loader>
</template>

<script>
export default {
  data() {
    return {
      desayuno: [],
      loading: true,
      transition: "scale-transition",
      transitions: [
        {
          text: "None",
          value: undefined
        },
        {
          text: "Fade Transition",
          value: "fade-transition"
        }
      ]
    };
  },
  mounted() {
    this.mostrarDetalleReceta();
  },
  methods: {
    mostrarDetalleReceta() {
      axios
        .get("api/mostrar/receta/" + this.$route.params.id)
        .then(response => {
          this.loading = false;
          this.desayuno = response.data;
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style lang="scss">
.container-detalle {
  position: relative;
  min-width: 100vw;
  max-height: calc(100vh - 7rem);
  min-height: calc(100vh - 7rem);
  background-color: #fff;
  color: #333;
  padding: 0 1rem;
  overflow-y: scroll;
}
.detalle-title {
  font-size: 1.5rem;
  margin-top: 1rem;
  color: #333;
}
.detalle-description {
  font-size: 1rem;
}
.detalle-title-title {
  font-size: 1rem;
}
.first-mayus {
  text-transform: lowercase;
  &::first-letter {
    text-transform: uppercase;
  }
}
.list-ing {
  padding: 0.5rem;
  border-bottom: 0.1rem dotted rgba(51, 51, 51, 0.5);
  &:last-child {
    border-bottom: none;
  }
}
.list-pasos {
  padding: 0.5rem;
}
</style>
