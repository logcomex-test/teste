# Documentação da API
Esta é a documentação da API que fornece acesso aos dados dos usuários.

## Contexto
A API permite consultar e listar usuários com base em vários filtros, como tipo de usuário, estado, idade, etc. Os dados são paginados para facilitar a visualização e a manipulação de grandes conjuntos de dados.

## Instalação
Dentro da pasta raiz do projeto:

```bash
docker-compose exec php sh
chmod -R 777 /var/www/html/app/storage/
php artisan migrate && php artisan db:seed

## Rotas

### Consultar Usuários
GET /users/consult

Endpoint para realizar consultas filtradas de usuários.

**Parâmetros de Consulta:**

- `name` [varchar] (opcional): Filtrar por nome de usuário.
- `state` [char(2)] (opcional): Filtrar por estado do usuário.
- `address` [text] (opcional): Filtrar por endereço do usuário.
- `age` [int] (opcional): Filtrar por idade exata do usuário.
- `age_min` [int] (opcional): Filtrar por idade mínima do usuário.
- `age_max` [int] (opcional): Filtrar por idade máxima do usuário.

### Listar Usuários
GET /users/list

Endpoint para listar usuários com base nos filtros especificados.

**Parâmetros de Consulta:**

- `name` [varchar] (opcional): Filtrar por nome de usuário.
- `state` [char(2)] (opcional): Filtrar por estado do usuário.
- `address` [text] (opcional): Filtrar por endereço do usuário.
- `age` [int] (opcional): Filtrar por idade exata do usuário.
- `age_min` [int] (opcional): Filtrar por idade mínima do usuário.
- `age_max` [int] (opcional): Filtrar por idade máxima do usuário.

## Exemplos

### Consultar Usuários
GET /users/consult?state=SP&age_min=25&age_max=40
Resposta:

```json
[
    {
        "id": 1,
        "name": "João",
        "state": "SP",
        "age": 30,
        "address": "Rua A, 123"
    },
    {
        "id": 2,
        "name": "Maria",
        "state": "SP",
        "age": 35,
        "address": "Rua B, 456"
    }
]

### Listar Usuários
GET /users/list?age=32&state=RJ&page=1

```json
{
    "data": [
        {
            "id": 3,
            "name": "Pedro",
            "state": "RJ",
            "age": 32,
            "address": "Av. X, 789"
        },
        {
            "id": 4,
            "name": "Ana",
            "state": "RJ",
            "age": 32,
            "address": "Av. Y, 012"
        }
    ],
    "meta": {
        "total": 20,
        "per_page": 10,
        "current_page": 1,
        "last_page": 2
    }
}
