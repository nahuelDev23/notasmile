<template>
      <router-link
            :to="{
            name: 'notas/detalle',
            params: { id: id_notas }
            }"
      >
      <v-btn depressed x-small>Ver</v-btn>
      </router-link>
</template>
<script>
export default {
 props: ["id_notas"],
};
</script>