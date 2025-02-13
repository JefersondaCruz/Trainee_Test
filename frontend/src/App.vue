<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Home from './components/Home.vue'
</script>

<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<style scoped>
@font-face {
  font-family: 'Minecraftia';
  src: url('@/assets/fonts/Minecraftia-Regular.ttf') format('truetype');
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Minecraftia', sans-serif;
}

</style>
