<template>
  <v-layout>

    <v-layout column align-center v-if="loading">
      <div class="text-xs-center">
        <v-progress-circular
          indeterminate
          color="primary"
        ></v-progress-circular>
      </div>
    </v-layout>

    <v-layout v-if="error" class="error">
      {{ error }}
    </v-layout>

    <v-layout row v-if="materials">
      <v-flex xs12 sm6 offset-sm3>
        <v-card>
          <v-toolbar color="cyan" dark>
            <v-toolbar-title>Materials</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn icon>
              <v-icon>search</v-icon>
            </v-btn>
          </v-toolbar>

          <v-list two-line>
            <v-list-tile
              v-for="material in materials"
              :key="material.id"
              avatar
            >
              <v-list-tile-avatar>
                <v-avatar color="cyan">{{material.abbreviation}}</v-avatar>
              </v-list-tile-avatar>

              <v-list-tile-content>
                <v-list-tile-title>{{ material.name }}</v-list-tile-title>
                <v-list-tile-sub-title v-if="material.composed">
                  Made of: {{ material.composition }}
                </v-list-tile-sub-title>
              </v-list-tile-content>

              <v-list-tile-action>
                <v-btn icon ripple>
                  <v-icon color="grey lighten-1">info</v-icon>
                </v-btn>
              </v-list-tile-action>

            </v-list-tile>
          </v-list>
        </v-card>
      </v-flex>
    </v-layout>

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
