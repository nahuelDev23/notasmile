<template>
  <router-link
    :to="{
            name: 'receta/detalle',
            params: { id: id_receta }
        }"
  >
    <v-btn depressed x-small>Ver</v-btn>
  </router-link>
</template>

<script>
export default {
 props: ["id_receta"],
};
</script>

