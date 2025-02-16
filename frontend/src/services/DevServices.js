import laravelApi from "./HttpService";


export const RegisterDev = async (nivel_id,nome, sexo, data_nascimento, hobby) => {
    try {
        const response = await laravelApi.post("/desenvolvedores", {
            nivel_id,
            nome,
            sexo,
            data_nascimento,
            hobby,
        })
        return response;
    } catch (error) {
        console.error("Erro ao registrar desenvolvedor")
        throw error;
    }
}
export const GetDevs = async () => {
    try {
        const response = await laravelApi.get("/desenvolvedores");
        return response;
    } catch (error) {
        console.error("Erro ao recuperar desenvolvedores")
        throw error;
    }
}

export const UpdateDev = async (nivel_id, id, nome, sexo, data_nascimento, hobby) => {
    try {
        const response = await laravelApi.put(`/desenvolvedores/${id}`, {
            nivel_id,
            id,
            nome,
            sexo,
            data_nascimento,
            hobby,
        })
        return response;
    } catch (error) {
        console.error("Erro ao atualizar desenvolvedor")
        throw error;
    }
}

export const DeleteDev = async (id) => {
    try {
        const response = await laravelApi.delete(`/desenvolvedores/${id}`);
        return response;
    } catch (error) {
        console.error("Erro ao excluir desenvolvedor")
        throw error;
    }
}