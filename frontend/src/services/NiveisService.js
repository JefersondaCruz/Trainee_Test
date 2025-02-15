import laravelApi from "./HttpService";

export const RegisterNivel = async (nivel) => {
    try {
        const response = await laravelApi.post("/niveis", {
            nivel,
        })
        return response;
        } catch (error) {
            console.error("Erro ao registrar nivel")
            throw error;
        }
    }

export const GetNiveis = async () => {
    try {
        const response = await laravelApi.get("/niveis");
        return response;
    } catch (error) {
        console.error("Erro ao recuperar niveis")
        throw error;
    }
}

export const UpdateNivel = async (id, nivel) => {
    try {
        const response = await laravelApi.put(`/niveis/${id}`, {
            nivel,
        })
        return response;
    } catch (error) {
        console.error("Erro ao atualizar nivel")
        throw error;
    }
}

export const DeleteNivel = async (id) => {
    try {
        const response = await laravelApi.delete(`/niveis/${id}`);
        return response;
    } catch (error) {
        console.error("Erro ao excluir nivel")
        throw error;
    }
}

