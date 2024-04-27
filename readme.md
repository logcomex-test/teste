To run:



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
GET /api/users/consultar


Endpoint para realizar consultas filtradas de usuários.

**Parâmetros de Consulta:**

- `type` (opcional): Filtrar por tipo de usuário.
- `state` (opcional): Filtrar por estado do usuário.
- `age_min` (opcional): Filtrar por idade mínima do usuário.
- `age_max` (opcional): Filtrar por idade máxima do usuário.

### Listar Usuários
GET /api/users/listar


Endpoint para listar usuários com base nos filtros especificados.

**Parâmetros de Consulta:**

- `type` (opcional): Filtrar por tipo de usuário.
- `state` (opcional): Filtrar por estado do usuário.
- `age_min` (opcional): Filtrar por idade mínima do usuário.
- `age_max` (opcional): Filtrar por idade máxima do usuário.
- `page` (opcional): Número da página a ser visualizada.

## Exemplos

### Consultar Usuários
GET /api/users/consultar?type=admin&state=SP&age_min=25&age_max=40


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
GET /api/users/listar?type=normal&state=RJ&page=1

```json
{
    "data": [
        {
            "id": 3,
            "name": "Pedro",
            "state": "RJ",
            "age": 28,
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
