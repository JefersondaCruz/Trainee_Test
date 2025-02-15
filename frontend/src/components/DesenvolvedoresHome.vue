<template>
    <div>
        <router-link to="/" class="button-back">
            Voltar <span class="icon"></span>
        </router-link>
        <div class="container">
            <h2>Página de Desenvolvedores</h2>
            <p>Aqui você pode gerenciar os desenvolvedores.</p>
            
            <button class="btn register">Registrar Desenvolvedor</button>
            
            <ul class="developer-list">
                <li v-for="developer in developers" :key="developer.id" class="developer-item">
                    <span>{{ developer.name }}</span>
                    <div>
                        <button class="btn edit" @click="editDeveloper(developer.id)">Editar</button>
                        <button class="btn delete" @click="removeDeveloper(developer.id)">Remover</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { RegisterDev } from '@/services/DevServices';

export default {
    data() {
        return {
            desenvolvedores: [],
            selectedDev: { nome: "", sexo: "", data_nascimento: "", hobby: "" },
        };
    },
    methods: {
        async RegisterDevSubmit() {
            try {
                const response = await RegisterDev(this.selectedDev.nome, this.selectedDev.sexo, this.selectedDev.data_nascimento, this.selectedDev.hobby);
                this.closeModal();
                this.showToast("Desenvolvedor Registrado com sucesso!", "success");
                this.getDesenvolvedores();
            } catch (error) {
                console.error(error);
            }
        },
    }
}
</script>

<style scoped>


.container {
    min-height: 80vh;
    max-width: 600px;
    margin: 20px auto;
    background: #35495e;
    color: white;
    padding: 20px;
    border-radius: 8px;
}

.container::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url(../src/assets/capaDEV.jpg);
    background-size: cover;
    background-position: center;
    filter: blur(4px);
    z-index: -1;
}

h2, p {
    text-align: center;
    margin-bottom: 10px;
}

.btn {
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    margin: 5px;
}

.register {
    background: #42b983;
    color: white;
    width: 100%;
}

.edit {
    background: #42b983;
    color: white;
}

.delete {
    background: red;
    color: white;
}

.developer-list {
    list-style: none;
    padding: 0;
    margin-top: 10px;
}

.developer-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #2c3e50;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 5px;
}

.button-back {
    display: flex;
    align-items: center;
    font-size: 1.2em;
    text-decoration: none;
    color: #fff;
    padding: 25px;
}

.button-back span {
    width: 24px;
    height: 24px;
    background-image: url('../assets/icons/picareta.png');
    background-size: contain;
    background-repeat: no-repeat;
    margin-right: 8px;
}
</style>
