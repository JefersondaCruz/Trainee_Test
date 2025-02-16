<h1> Teste 3C Lab - Trainee</h1> 

> Status do Projeto: :warning: em desenvolvimento

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Pré-requisitos](#pré-requisitos)

:small_blue_diamond: [Como rodar a aplicação](#como-rodar-a-aplicação-arrow_forward)



## Descrição do projeto 

<p align="justify">
  Este projeto é um sistema de recrutamento desenvolvido como parte do processo seletivo para a vaga de Trainee na 3C. Ele permite que recrutadores cadastrem vagas de emprego e que candidatos visualizem, filtrem e se candidatem a essas vagas.
</p>

## Funcionalidades

:heavy_check_mark: Criar, Editar e Excluir Desenvolvedores  

:heavy_check_mark: Listagem de Desenvolvedores 

:heavy_check_mark: Criar, Editar e excluir Niveis

:heavy_check_mark: Listagem de Niveis 

... 

## Pré-requisitos
- Sem Docker
  
:warning: [Node.js e npm]

:warning: [Composer]

:warning: [PHP 8.x]

- com Docker

:warning: [Docker]

:warning: [Docker Compose]

...


## Como rodar a aplicação :arrow_forward:

- rodando sem docker (necessário rodar back e front em terminais separados)

```bash
  cd backend
  copiar o arq .env.example, e colar na pasta src com o nome .env
  composer update (instalar dependências)
  php artisan key:generate (Gerar chave da aplicação)
  
```
```bash
Configurar o banco de dados no arquivo .env
  DB_CONNECTION=sqlite
  # DB_HOST=mysql
  # DB_PORT=3306
  # DB_DATABASE=Trainee_laravel_vue
  # DB_USERNAME=root
  # DB_PASSWORD=root

  Recomendo usar sqlite (apenas visualização), abaixe a extensão 
  SQlite Viwer : https://marketplace.visualstudio.com/items?itemName=qwtel.sqlite-viewer
  php artisan migrate (executar as migrations do banco)
  php artisan serve (rodar servidor)
```
- front end
```bash
  cd frontend
  npm install ( instalar as dependências)
  npm run dev (iniciar servidor)
```
Agora, acesse o projeto no navegador:
🔗 Front-end: http://localhost:5173
🔗 Back-end API: http://127.0.0.1:8000/api
- Rodando com Docker
```bash
  copiar o arq .env.example, e colar na pasta src com o nome .env
  na raiz do projeto executar os comandos : 
  docker compose up -d --build
```
Agora, acesse o projeto no navegador:
🔗 Front-end: http://localhost:8085
🔗 Back-end API: http://127.0.0.1:80001/api
    

## Como rodar os testes

<p> Para testar as funcionalidades do backend, você pode utilizar uma ferramenta como Insomnia ou Postman, que permite fazer requisições HTTP de forma simples e eficiente. Com elas, você pode testar os endpoints da API para garantir que tudo esteja funcionando conforme esperado. </p>

```
End Poinst back-end:

Route::post('/niveis', [NivelController::class, 'store']);
Route::Get('/niveis', [NivelController::class, 'index']);
Route::delete('/niveis/{id}', [NivelController::class, 'destroy']);
Route::Patch('/niveis/{id}', [NivelController::class, 'update']);

Route::post('/desenvolvedores',[DesenvolvedorController::class, 'store']);
Route::Get('/desenvolvedores',[DesenvolvedorController::class, 'index']);
Route::delete('/desenvolvedores/{id}', [DesenvolvedorController::class, 'destroy']);
Route::Put('/desenvolvedores/{id}', [DesenvolvedorController::class, 'update']); 
```


... 

## Linguagens, dependencias e libs utilizadas :books:

- ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
- ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
- ![Vue.js](https://img.shields.io/badge/vuejs-%2335495e.svg?style=for-the-badge&logo=vuedotjs&logoColor=%234FC08D)
- ![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
- ![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
- ![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)


