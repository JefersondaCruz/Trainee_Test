<template>
    <div>
        <router-link to="/" class="button-back">
            Voltar <span class="icon"></span>
        </router-link>
        <div class="container">
            <h2>Página de Desenvolvedores</h2>
            <p>Aqui você pode gerenciar os desenvolvedores.</p>
            <button class="btn register" @click="OpenModal(true)">Registrar Desenvolvedor</button>
            <p v-if="desenvolvedores.length === 0" class="alert alert-danger" style="margin-top: 20px; text-align: center;">
                Nenhum dev Registrado, Cadastre um desenvolvedor primeiro.
            </p>

            <ul class="developer-list">
                <li v-for="desenvolvedor in desenvolvedores" :key="desenvolvedor.id" class="developer-item">
                    <span>{{ desenvolvedor.nome }}</span>
                    <span>{{ desenvolvedor.data_nascimento }}</span>
                    <div>
                        <button class="btn edit" @click="OpenModalEdit(desenvolvedor)" >Editar</button>
                        <button class="btn delete" @click="openDeleteConfirmationModal(desenvolvedor.id)">Remover</button>
                    </div>
                    
                </li>
            </ul>
        </div>
        <div v-if="showModalRegister" class="modal fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Desenvolvedor</h5>
                        <button type="button" class="close" @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="name">Nome do Desenvolvedor:</label>
                        <input type="text" class="form-control" v-model="selectedDev.nome" />
                        <label for="name">sexo:</label>
                        <select class="Select-form" v-model="selectedDev.sexo">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>

                        <label for="name">Data de Nascimento:</label>
                        <input type="date" class="form-control" v-model="selectedDev.data_nascimento" />
                        <label for="name">seu hobby:</label>
                        <textarea class="form-control" v-model="selectedDev.hobby" rows="4" maxlength="255"></textarea>
                        <label for="name">Nivel do desenvolvedor: </label>

                        <p v-if="Niveis.length === 0" class="alert alert-danger">
                            Nenhum Nivel Registrado, Cadastre um Nivel primeiro.
                        </p>

                        <select class="Select-form"  
                        v-model="selectedDev.nivel_id"
                        :disabled="Niveis.length === 0"
                        >
                            <option v-for="nivel in Niveis" :key="nivel.id" :value="nivel.id">
                                {{ nivel.nivel }}
                            </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="submit" 
                            class="btn btn-primary" 
                            @click="RegisterDevSubmit"
                        >
                            Registrar
                        </button>
                        <button type="button" class="btn btn-secondary" @click="closeModal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showModalEdit" class="modal fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Atualizar Desenvolvedor</h5>
                        <button type="button" class="close" @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="name">Nome do Desenvolvedor:</label>
                        <input type="text" class="form-control" v-model="selectedDev.nome"/>
                        <label for="name">sexo:</label>
                        <select class="Select-form" v-model="selectedDev.sexo">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>

                        <label for="name">Data de Nascimento:</label>
                        <input type="date" class="form-control" v-model="selectedDev.data_nascimento" />
                        <label for="name">seu hobby:</label>
                        <textarea class="form-control" v-model="selectedDev.hobby" rows="4" maxlength="255"></textarea>
                        <label for="name">Nivel do desenvolvedor: </label>

                        <select class="Select-form"  v-model="selectedDev.nivel_id">
                            <option v-for="nivel in Niveis" :key="nivel.id" :value="nivel.id">
                                {{ nivel.nivel }}
                            </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button"
                            class="btn btn-primary"
                            @click="updateDeveloperSubmit"
                        >
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-secondary" @click="closeModal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showDeleteConfirmation" class="modal fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmar Exclusão</h5>
                        <button type="button" class="close" @click="closeDeleteConfirmationModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Você tem certeza que deseja excluir este Desenvolvedor?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" @click="deleteDeveloperSubmit">
                            Sim, Excluir
                        </button>
                        <button type="button" class="btn btn-secondary" @click="closeDeleteConfirmationModal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { RegisterDev, GetDevs, DeleteDev, UpdateDev } from '@/services/DevServices';
import { GetNiveis } from '@/services/NiveisService';
import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";

export default {
    data() {
        return {
            desenvolvedores: [],
            selectedDev: { nivel_id: "", nome: "", sexo: "", data_nascimento: "", hobby: "" },
            showModalRegister: false,
            showDeleteConfirmation: false,
            developerToDelete: null,
            Niveis: [],
            showModalEdit: false,
        };
    },
    methods: {
        showToast(message, type = "success") {
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: type === "success" ? "green" : "red",
                onClick: () => this.closeModal(),
            }).showToast();
        },

        async RegisterDevSubmit() {
            
            try {
                const response = await RegisterDev(this.selectedDev.nivel_id, this.selectedDev.nome, this.selectedDev.sexo, this.selectedDev.data_nascimento, this.selectedDev.hobby);
                this.closeModal();
                this.showToast("Desenvolvedor Registrado com sucesso!", "success");
                this.getDesenvolvedores();
            } catch (error) {
                console.error(error);
            }
        },
        async getDesenvolvedores() {
            try {
                const response = await GetDevs();
                this.desenvolvedores = response.data.desenvolvedores;
            } catch (error) {
                console.error(error);
            }
        },

        async getNiveis() {
            try {
                const response = await GetNiveis();
                this.Niveis = response.data.Niveis;
            } catch (error) {
                console.error(error);
            }
        },

        openDeleteConfirmationModal(id) {
            this.developerToDelete = id;
            this.showDeleteConfirmation = true;
        },

        closeDeleteConfirmationModal() {
            this.showDeleteConfirmation = false;
            this.developerToDelete = null;
        },

        async deleteDeveloperSubmit() {
            try {
                const response = await DeleteDev(this.developerToDelete);
                this.showToast("Desenvolvedor removido com sucesso!", "success");
                this.getDesenvolvedores();
            } catch (error) {
                this.showToast("Erro ao remover desenvolvedor", "error");
                console.error(error);
            }

            this.closeDeleteConfirmationModal();
        },
        async updateDeveloperSubmit() {
            try {
                const response = await UpdateDev(this.selectedDev.nivel_id, this.selectedDev.id, this.selectedDev.nome, this.selectedDev.sexo, this.selectedDev.data_nascimento, this.selectedDev.hobby);
                this.closeModal();
                this.showToast("Desenvolvedor Atualizado com sucesso!", "success");
                this.getDesenvolvedores();
            } catch (error) {
                console.error(error);
            }
        },
        OpenModalEdit(desenvolvedor) {
            this.selectedDev = {...desenvolvedor};
            this.showModalEdit = true;
        },

        confirmUpdate() {
            this.showModalEdit = false;
        },

        closeConfirmationModal() {

            this.showModalEdit = true; 
        },

        OpenModal() {
            this.selectedDev = { nivel_id: "", nome: "", sexo: "", data_nascimento: "", hobby: "" };
            this.showModalRegister = true;
        },

        closeModal() {
            this.showModalRegister = false;
            this.showModalEdit = false;
            this.showConfirmation = false;
        },
    },
    mounted() {
            this.getNiveis();
            this.getDesenvolvedores();
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

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #42b983;
    border-radius: 5px;
    background: #35495e;
    color: white;
}

.Select-form {
    width: 100%;
    padding: 10px;
    border: 1px solid #42b983;
    border-radius: 5px;
    background: #35495e;
    color: white;
}
</style>
