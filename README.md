# Backend

### Requisitos

- [Docker](https://docs.docker.com/install/linux/docker-ce/ubuntu/)
- [Docker Compose](https://docs.docker.com/compose/install/)

### Instalação

- Criando as docker
    
    `docker-compose build`
    
- Iniciando as docker

    `docker-compose up -d`
    
- Instalando dependencias
   
   `docker-compose run --rm php-fpm composer install`
   
- Executando as migrations do banco de dados

    `docker-compose run --rm php-fpm vendor/bin/phinx migrate -e development`
    
 
### Doc

- POST /usuario
```
{
	"login": "teste",
	"senha": "senha"
}
```
```
Retorno
{
  "status_code": 200,
  "message": "Usuario adicionando com sucesso"
}
```

- POST /login
```
{
    "login": "teste",
    "senha": "senha"
}
```
```
Retorno
{
  "status_code": 200,
  "message": "Login realizado com sucesso"
}
```

 - POST /cliente
 ```
{
    "nome": "Victor",
    "data_nascimento": "1990-07-19",
    "cpf": "12345678901",
    "rg": "12456789",
    "telefone": "22955556666",
    "enderecos": [
        {
            "cep": "12345678",
            "logradouro": "Rua Teste",
            "numero": 260,
            "bairro": "Tester",
            "complemento": "Padaria",
            "municipio": "Americana",
            "estado": "SP"
        },
        {
            "cep": "12345678",
            "logradouro": "Rua Teste",
            "numero": 260,
            "bairro": "Tester",
            "complemento": "Padaria",
            "municipio": "Americana",
            "estado": "SP"
        }
    ]
}
 ```
```
Retorno
{
  "status_code": 200,
  "message": "Cliente adicionando com sucesso"
}
```

 - PUT /cliente/{id}
 ```
{
    "nome": "Victor",
    "data_nascimento": "1990-07-19",
    "cpf": "12345678901",
    "rg": "12456789",
    "telefone": "22955556666",
    "enderecos": [
        {
            "cep": "12345678",
            "logradouro": "Rua Teste",
            "numero": 260,
            "bairro": "Tester",
            "complemento": "Padaria",
            "municipio": "Americana",
            "estado": "SP"
        },
        {
            "cep": "12345678",
            "logradouro": "Rua Teste",
            "numero": 260,
            "bairro": "Tester",
            "complemento": "Padaria",
            "municipio": "Americana",
            "estado": "SP"
        }
    ]
}
 ```
```
Retorno
{
  "status_code": 200,
  "message": "Cliente atualizado com sucesso"
}
```

- GET /cliente/{id}
```
Retorno
{
  "status_code": 200,
  "data": {
    "id": 1,
    "nome": "Victor",
    "data_nascimento": "1990-07-19",
    "cpf": "12345678901",
    "rg": "12456789",
    "telefone": "22955556666",
    "enderecos": [
      {
        "id": 1,
        "cep": "12345678",
        "logradouro": "Rua Teste",
        "numero": 260,
        "bairro": "Tester",
        "complemento": "Padaria",
        "municipio": "Americana",
        "estado": "SP"
      },
      {
        "id": 2,
        "cep": "12345678",
        "logradouro": "Rua Teste",
        "numero": 260,
        "bairro": "Tester",
        "complemento": "Padaria",
        "municipio": "Americana",
        "estado": "SP"
      }
    ]
  },
  "message": "Cliente localizado com sucesso"
}
```

- GET /clientes

```
Retorno
{
  "status_code": 200,
  "data": [
    {
      "id": 1,
      "nome": "Victor",
      "data_nascimento": "1990-07-19",
      "cpf": "12345678901",
      "rg": "12456789",
      "telefone": "22955556666",
      "enderecos": [
        {
          "id": 1,
          "cep": "12345678",
          "logradouro": "Rua Teste",
          "numero": 260,
          "bairro": "Tester",
          "complemento": "Padaria",
          "municipio": "Americana",
          "estado": "SP"
        },
        {
          "id": 2,
          "cep": "12345678",
          "logradouro": "Rua Teste",
          "numero": 260,
          "bairro": "Tester",
          "complemento": "Padaria",
          "municipio": "Americana",
          "estado": "SP"
        }
      ]
    },
    {
      "id": 2,
      "nome": "Victor",
      "data_nascimento": "1990-07-19",
      "cpf": "12345678901",
      "rg": "12456789",
      "telefone": "22955556666",
      "enderecos": [
        {
          "id": 3,
          "cep": "12345678",
          "logradouro": "Rua Teste",
          "numero": 260,
          "bairro": "Tester",
          "complemento": "Padaria",
          "municipio": "Americana",
          "estado": "SP"
        },
        {
          "id": 4,
          "cep": "12345678",
          "logradouro": "Rua Teste",
          "numero": 260,
          "bairro": "Tester",
          "complemento": "Padaria",
          "municipio": "Americana",
          "estado": "SP"
        }
      ]
    }
  ],
  "message": "Clientes localizado com sucesso"
}
```

- DELETE /cliente/{id}
```
Retorno
{
  "status_code": 200,
  "message": "Cliente removido com sucesso"
}
```
