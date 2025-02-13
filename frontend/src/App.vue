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
  box-sizing: border-box;
  
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  text-align: center;
  color: #2c3e50;
  min-height: 100vh;
  background-size: cover;
  background-position: center;
  position: relative;
}

#app::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: url(../src/assets/capaDev.jpeg);
  background-size: cover;
  background-position: center;
  filter: blur(10px);
  z-index: -1;
}


header {
  background-color: #35495e;
  padding: 30px;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
  font-size: 1.8em;
  font-weight: bold;
}

nav {
  display: flex;
  gap: 15px;
}

nav a {
  color: white;
  font-size: 1.4em;
  text-decoration: none;
  padding: 10px 15px;
  border-radius: 5px;
  transition: background-color 0.3s, transform 0.2s;
  font-weight: bold;
  transition: background-color 0.3s;
}

nav a:hover {
  background-color: #42b983;
  transform: scale(1.1);
}

main {
  margin-top: 40px;
}

</style>
