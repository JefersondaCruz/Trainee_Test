<template>
    <div id="home">
      <nav>
        <router-link to="/desenvolvedor" class="mc-button">
          <div class="title">Desenvolvedores</div>
        </router-link>
        <router-link to="/niveis" class="mc-button">
          <div class="title">Níveis</div>
        </router-link>
      </nav>
      <main>
        <RouterView />
      </main>
    </div>
</template>

<script setup>
</script>

<style scoped>
@font-face {
  font-family: 'Minecraftia';
  src: url('@/assets/fonts/Minecraftia-Regular.ttf') format('truetype');
}

#home {
  font-family: 'Minecraftia', sans-serif;
  text-align: center;
  color: #2c3e50;
  min-height: 100vh;
  background-size: cover;
  background-position: center;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

#home::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: url(../src/assets/1347935.png);
  background-size: cover;
  background-position: center;
  filter: blur(4px);
  z-index: -1;
}

.mc-button {
  height: 50pt;
  width: calc(30pt * 10); 
  cursor: pointer;
  overflow: hidden;
  white-space: nowrap;
  user-select: none;
  background: #999 url('https://i.ibb.co/rb2TWXL/bgbtn.png') center / cover;
  image-rendering: pixelated;
  border: 2px solid #000;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.mc-button .title {
  font-size: 1.2em; 
  margin-top: 15px;
}

.mc-button:hover {
  background-color: rgba(100, 100, 255, .45);
  text-shadow: 2px 2px #202013CC;
  color: #FFFFA0;
}

h1 {
  font-size: 1.8em;
  font-weight: bold;
}

nav {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 20px;
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

nav a:active {
  transform: scale(1);
}

main {
  margin-top: 40px;
}
</style>
