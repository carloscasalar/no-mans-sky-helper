<template>
  <v-container fluid>
    <v-slide-y-transition mode="out-in">
      <material-list></material-list>
    </v-slide-y-transition>
  </v-container>
</template>

<script>
import MaterialList from '../components/materials/MaterialList.vue';

export default {
  components: { MaterialList },
};
</script>
