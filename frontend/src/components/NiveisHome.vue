<template>
    <div>
        <router-link to="/" class="button-back">
            Voltar <span class="icon"></span>
        </router-link>
        <div class="container">
            <h2>Página de Niveis</h2>
            <p>Aqui você pode gerenciar os Niveis.</p>
        <button class="btn register" @click="OpenModal(true)">Registrar Nivel</button>
        <ul class="developer-list">
            <li v-for="Nivel in Niveis" :key="Nivel.id" class="developer-item">
            <span>{{ Nivel.nivel }}</span>
                <div>
                    <button class="btn edit">Editar</button>
                    <button class="btn delete" type="submit" @click="removeNivel(Nivel.id)">Remover</button>
                </div>
            </li>
        </ul>
        </div>
        <div v-if="showModal" class="modal fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Nível</h5>
                        <button type="button" class="close" @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="name">Nome do Nível:</label>
                        <input type="text" class="form-control" v-model="selectedNivel.name" />
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="submit" 
                            class="btn btn-primary" 
                            @click="RegistrationSubmit"
                        >
                            Registrar
                        </button>
                        <button type="button" class="btn btn-secondary" @click="closeModal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { RegisterNivel, GetNiveis, UpdateNivel, DeleteNivel } from '@/services/NiveisService';

export default {
    data() {
        return {
            Niveis: [],
            showModal: false,
            selectedNivel: { name: "" },
        };
    },
    methods: {
        async RegistrationSubmit() {
            try {
                const response = await RegisterNivel(this.selectedNivel.name);
                console.log(response);
                console.log("Nivel Registrado com sucesso!");
            } catch (error) {
                console.error(error);
            }
        },

        OpenModal() {
            this.selectedNivel = { name:"" };
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        },
        
        

        async getNiveis() {
            console.log("getNiveis");
            try {
                const response = await GetNiveis();
                console.log("respota do get", response);
                this.Niveis = response.data.Niveis;
            } catch (error) {
                console.error(error);
            }
        },

        async removeNivel(id) {
            try {
                const response = await DeleteNivel(id);
                console.log("Resposta do delete", response);
                this.getNiveis();
            } catch (error) {
                console.error(error);
            }
        },
    },
        mounted() {
            this.getNiveis();
            console.log("componente mounted, chamadn get niveis");
        },
    
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

.modal-content {
    background: #2c3e50; 
    color: white;
    border-radius: 8px;
    padding: 20px;
}

.modal-header {
    border-bottom: 1px solid #42b983;
    padding-bottom: 10px;
}

.modal-body {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.modal-body label {
    font-weight: bold;
    color: #42b983;
    margin-bottom: 5px;
}

.modal-body input {
    width: 100%;
    padding: 10px;
    border: 1px solid #42b983;
    border-radius: 5px;
    background: #35495e;
    color: white;
}

.modal-footer {
    display: flex;
    justify-content: space-between;
    border-top: 1px solid #42b983;
    padding-top: 10px;
}

.btn-primary {
    background: #42b983;
    border: none;
    color: white;
}

.btn-secondary {
    background: #e74c3c;
    border: none;
    color: white;
}

.close {
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
}
</style>