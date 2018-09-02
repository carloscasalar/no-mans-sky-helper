<template>
  <v-layout column align-center>
    <h1>Materials</h1>
    <div class="text-xs-center" v-if="loading">
      <v-progress-circular
        indeterminate
        color="primary"
      ></v-progress-circular>
    </div>

    <div v-if="error" class="error">
      {{ error }}
    </div>

    <div v-if="materials" class="content">

      <p>{{ materials.length }}</p>
    </div>

  </v-layout>
</template>

<script>
import { getAllMaterials } from './injector';

export default {
  name: 'MaterialList',
  data() {
    return {
      loading: false,
      materials: null,
      error: null,
    };
  },
  created() {
    this.fetchData();
  },
  watch: {
    $route: 'fetchData',
  },
  methods: {
    async fetchData() {
      this.error = null;
      this.materials = null;
      this.loading = true;
      try {
        this.materials = await getAllMaterials.execute();
        this.loading = false;
      } catch (e) {
        this.error = e.message;
        this.loading = false;
      }
    },
  },
};
</script>

<style scoped>
  h1 {
    font-weight: normal;
  }
</style>
