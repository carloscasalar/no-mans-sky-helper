<template>
  <v-container fluid>
    <v-slide-y-transition mode="out-in">
      <v-layout column align-center>
        <h1>No Man's Sky Helper</h1>
        <img src="@/assets/logo.png" alt="Vuetify.js" class="logo mb-5">
        <p>This is a simple helper for bookkeeping solar systems, planets and resources.</p>
      </v-layout>
    </v-slide-y-transition>
  </v-container>
</template>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
img.logo{
  height: 100px;
}
</style>
