<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <div id="app">
    <header>
      <h1>Gerenciamento de Desenvolvedores</h1>
      <nav>
        <router-link to="/">Home</router-link>
        <router-link to="/desenvolvedor">Desenvolvedores</router-link>
        <router-link to="/niveis">Níveis</router-link>
      </nav>
    </header>
    <main>
      <RouterView />
    </main>
  </div>
  
</template>

<style scoped>
* {
  margin: 0;
  padding: 0;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  text-align: center;
  color: #2c3e50;
}

header {
  background-color: #35495e;
  padding: 20px;
  color: white;
}

nav {
  margin: 20px 0;
}

nav a {
  color: white;
  text-decoration: none;
  margin: 0 15px;
  padding: 10px 15px;
  border-radius: 5px;
  transition: background-color 0.3s;
}

nav a:hover {
  background-color: #42b983;
}

main {
  margin-top: 40px;
}

</style>
