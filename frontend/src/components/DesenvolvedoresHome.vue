<template>
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
</template>

<script>
export default {
    data() {
        return {
            developers: [
                { id: 1, name: 'João Silva' },
                { id: 2, name: 'Maria Oliveira' },
                { id: 3, name: 'Carlos Souza' }
            ]
        };
    },
    methods: {
        editDeveloper(id) {
            alert(`Editar desenvolvedor ID: ${id}`);
        },
        removeDeveloper(id) {
            this.developers = this.developers.filter(dev => dev.id !== id);
        }
    }
};
</script>

<style scoped>
.container {
    max-width: 600px;
    margin: 20px auto;
    background: #35495e;
    color: white;
    padding: 20px;
    border-radius: 8px;
}

h2 {
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
</style>
