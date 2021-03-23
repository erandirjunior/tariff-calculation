> Abaixo está a descrição do projeto, conceitos, componentes utilizados e uma explicação de como utilizar a api.

## Projeto
O projeto desenvolvido foi uma api de cálculo de tarifa para hotel,
onde podemos obter o valor a ser pago por determinado quarto,
de determinado hotel, na moeda que o usuário escolher. 

Detalhe importante é que um quarto pode ter diferentes preços
em diferentes moedas, além disso, é possível simular uma reserva de cliente.

## Conceitos
Utilizei os conceitos da Clean Architecture (Arquitetura Limpa), criada por Robert Cecil Matin.
Aqui utilizei 3 camadas, Infra, Adapters e Domain: A camada de Infra, contém tudo o que é necessário para se comunicar com o mundo externo,
seja esse mundo externo uma base dados, uma requisição ou mesmo um componente externo.
A camada de Adapaters, contém o processo de adaptação de dados, ou seja, o dado externo é convertido
para o melhor formato que minha camada de Domínio precisa, e também converte os dados da camada de domínio para o
formato mais adequado para as camadas superiores. Já a camada de Domain, é onde ficam nossa camada de regras de negócio,
na qual temos todas as dependências definidas em interfaces de modo que seja possível testar nossas regras.

## Estrutura
    .
    ├── config                  # Pasta de configuração do projeto
    ├── dump                    # Estrutura do banco de dados
    ├── public                  # Pasta onde toda a requisição de inicia
    ├── routes                  # Rotas do projeto
    ├── src                     # Código fonte do projeto
    ├── tests                   # Testes
    └── README.md               # Instruções
    └── .gitignore              # Arquivo do git
    └── composer.json           # Arquivo de definição de dependências
    └── composer.lock           # Arquivo de definição de dependências
    └── docker-compose.yml      # Arquivo de configuração do docker
    └── phpunit.xml             # Arquivo para rodar os testes do phpunit

## Componentes utilizados:
* Docker (Criação de ambientes virtuais)
* Docker-compose (Orquestrador de containers)
* PHP >= 8 (Linguagem de programação)
* Composer (Gerenciador de dependências)
* MySQL (Banco de dados)
* Slim (Rotas)
* Laravel Validation (Validação de dados)
* PDO (Driver de conexão com a base de dados)
* PHP-DI (Biblioteca de injeção de dependências)
* API https://economia.awesomeapi.com.br (Api para pegar cotação da moeda)
* https://github.com/omniti-labs/jsend (Padronização de resposta)

## Uso da Api
Para rodar este projeto é necessário ter o Docker e Docker-compose instalado,
após clonar o projeto basta entrar na pasta do projeto e rodar o comando: ***docker-compose up***.
O projeto rodará na porta 8080. Será instalado todas as dependências, incluindo o banco e suas tabelas.
Detalhe importante é que o banco MySQL utilizará sua porta padrão.

Abaixo estão registrados os endereços para a manipulação da api:

### Currency - Manipule as moedas
**Register**
```
url: /currencies
type: POST
body:
{
    "currency": "EUR",
    "profitMargin": 15 // margem de lucro da agência em cima da moeda, valor positivo maior ou igual a 0
}
result:
{
    "status": "success",
    "content": {
        "currency": "EUR",
        "profitMargin": 15,
        "id": 3
    }
}
```
**Find All**
```
url: /currencies
type: GET
result:
{
    "status": "success",
    "data": [
        {
            "currency": "BRL",
            "profitMargin": 0,
            "id": 1
        },
        {
            "currency": "USD",
            "profitMargin": 10,
            "id": 2
        },
        {
            "currency": "EUR",
            "profitMargin": 15,
            "id": 3
        }
    ]
}
```
**Find by Identifier**
```
url: /currencies/{id}
type: GET
result:
{
    "status": "success",
    "data": {
        "currency": "BRL",
        "profitMargin": 50,
        "id": 2
    }
}
```
**Update by Identifier**
```
url: /currencies/{id}
type: PUT
body:
{
	"currency": "BRL",
	"profitMargin": "50" // margem de lucro da agência em cima da moeda, valor positivo maior ou igual a 0
}
```
**Delete by Identifier**
```
url: /currencies/{id}
type: DELETE
```

### Hotel - Manipule os hotéis
**Register**
```
url: /hotels
type: POST
body:
{
	"name": "Hotel c"
}
result:
{
    "status": "success",
    "data": {
        "name": "Hotel c",
        "id": 3
    }
}
```
**Find All**
```
url: /hotels
type: GET
result:
{
    "status": "success",
    "data": [
        {
            "name": "Hotel b",
            "id": 2
        },
        {
            "name": "Hotel c",
            "id": 3
        }
    ]
}
```
**Find by Identifier**
```
url: /hotels/{id}
type: GET
result:
{
    "status": "success",
    "data": {
        "name": "Hotel b",
        "id": 2
    }
}
```
**Update by Identifier**
```
url: /hotels/{id}
type: PUT
body:
{
	"name": "Hotel b"
}
```
**Delete by Identifier**
```
url: /currencies/{id}
type: DELETE
```

### Room - Manipule os quartos
**Register**
```
url: /hotel/{id}/rooms
type: POST
body:
{
    "room": "QDPL"
}
result:
{
    "status": "success",
    "data": {
        "room": "QDPL",
        "id": 4,
        "hotelId": 1
    }
}
```
**Find All**
```
url: /hotel/{hotelId}/rooms
type: GET
result:
{
    "status": "success",
    "data": [
        {
            "name": "TPL",
            "id": 1,
            "hotel": 2
        },
        {
            "name": "DBL",
            "id": 2,
            "hotel": 2
        }
    ]
}
```
**Find by Identifier**
```
url: /hotel/{hotelId}/rooms/{roomId}
type: GET
result:
{
    "status": "success",
    "data": {
        "name": "TPL",
        "id": 1,
        "hotel": 2
    }
}
```
**Update by Identifier**
```
url: /hotel/{hotelId}/rooms/{roomId}
type: PUT
body:
{
	"room": "TLP"
}
```
**Delete by Identifier**
```
url: /hotel/{hotelId}/rooms/{roomId}
type: DELETE
```

### Room Currency - Manipule os valores e moedas
**Register**
```
url: /hotel/{hotelId}/rooms/{roomId}/currencies
type: POST
body:
{
    "currencyId": 2, // id da moeda
	"price": 130 // valor do quarto
}
result:
{
    "status": "success",
    "data": {
        "roomId": 1,
        "currencyId": 2,
        "price": 130,
        "id": 2
    }
}
```
**Find All**
```
url: /hotel/{hotelId}/rooms/{roomId}/currencies
type: GET
result:
{
    "status": "success",
    "data": [
        {
            "roomId": 2,
            "currencyId": 2,
            "price": 120,
            "id": 3
        },
        {
            "roomId": 2,
            "currencyId": 3,
            "price": 115,
            "id": 4
        }
    ]
}
```
**Find by Identifier**
```
url: /hotel/{hotelId}/rooms/{roomId}/currencies
type: GET
result:
{
    "status": "success",
    "data": {
        "roomId": 1,
        "currencyId": 2,
        "price": 201,
        "id": 1
    }
}
```
**Update by Identifier**
```
url: /hotel/{hotelId}/rooms/{roomId}/currencies/{id}
type: PUT
body:
{
	"currencyId": 2, // id da moeda
	"price": 130 // valor do quarto
}
```
**Delete by Identifier**
```
url: /hotel/{hotelId}/rooms/{roomId}/currencies/{id}
type: DELETE
``` 

### Seller - Manipule os vendendores
**Register**
```
url: /sellers
type: POST
body:
{
    "name": "Agência",
	"profitMargin": 2 // porcentagem de lucro do vendedor, aceita numero positivo a partir de zero
}
result:
{
    "status": "success",
    "data": {
        "name": "Agência",
        "profitMargin": 2,
        "id": 1
    }
}
```
**Find All**
```
url: /sellers
type: GET
result:
{
    "status": "success",
    "data": [
        {
            "name": "Revenda",
            "profitMargin": 1,
            "id": 2
        },
        {
            "name": "Direta",
            "profitMargin": 0,
            "id": 3
        },
        {
            "name": "Agência",
            "profitMargin": 2,
            "id": 4
        }
    ]
}
```
**Find by Identifier**
```
url: /sellers/{id}
type: GET
result:
{
    "status": "success",
    "data": {
        "name": "Revenda",
        "profitMargin": 1,
        "id": 2
    }
}
```
**Update by Identifier**
```
url: /sellers/{id}
type: PUT
body:
{
	"name": "Revenda",
    "profitMargin": 1,
}
```
**Delete by Identifier**
```
url: /sellers/{id}
type: DELETE
```

### TariffCalculation - Cálculo do valor de um quarto
Valor do quarto na moeda base = Valor do quarto na moeda base + Valor do quarto na moeda base * % do lucro do vendedor.
Se não houver margem de lucro na moeda escolhida pelo usuário, será retornado o
Valor do quarto na moeda base * Cotação da moeda
Se houver margem de lucro na moeda escolhida pelo usuário, então será feito
Valor do quarto na moeda base = Valor do quarto na moeda base + Valor do quarto na moeda base * Percentual de margem de lucro da moeda
E será retornado o
Valor do quarto na moeda base * Cotação da moeda.

**Calculate price**
```
url: /hotels/{hotelId}/rooms/{roomId}/prices
type: POST
body:
{
	"currencyTo": 1, // id da moeda que será mostrada para o usuário
	"currencyFrom": 2, // id da moeda em que foi definido um valor de quarto
	"sellerId": 2 // id do vendedor para que seja utilizado a margem de lucro dele
}
result:
{
    "status": "success",
    "data": {
        "price": 549
    }
}
```

### User - Manipule os clientes (usuário compradores)
**Register**
```
url: /users
type: POST
body:
{
    "name": "Erandir",
	"email": "erandir@email.com"
}
result:
{
    "status": "success",
    "data": {
        "name": "Erandir",
        "email": "erandir@email.com",
        "id": 1
    }
}
```
**Find All**
```
url: /users
type: GET
result:
{
    "status": "success",
    "data": [
        {
            "name": "Erandir",
            "email": "erandir2@email.com",
            "id": 1
        },
        {
            "name": "Junior",
            "email": "junior@email.com",
            "id": 2
        }
    ]
}
```
**Find by Identifier**
```
url: /users/{id}
type: GET
result:
{
    "status": "success",
    "data": {
        "name": "Junior",
        "email": "junior@email.com",
        "id": 2
    }
}
```
**Update by Identifier**
```
url: /users/{id}
type: PUT
body:
{
    "name": "Erandir",
	"email": "erandir2@email.com"
}
```
**Delete by Identifier**
```
url: /users/{id}
type: DELETE
```

### Booking - Manipule as reservas feitas pelo cliente
**Register**
```
url: /users/{userId}/bookings
type: POST
body:
{
    "userCurrencyNeed": 2, // id da moeda requisitada pelo usuário
	"currencyBase": 3, // id da moeda de venda do quarto
	"sellerId": 2, // id do vendedor
	"hotelId": 1, // id do hotel
	"roomId": 1 // id do quarto
}
result:
{
    "status": "success",
    "data": {
        "userCurrencyNeed": 2,
        "currencyBase": 2,
        "roomId": 1,
        "userId": 1,
        "sellerId": 2,
        "hotelId": 1,
        "created": "2021-03-23",
        "price": 150.99,
        "id": 1
    }
}
```
**Find All**
```
url: /users/{userId}/bookings
type: GET
result:
{
    "status": "success",
    "data": [
        {
            "currencyBase": 2,
            "userCurrencyNeed": 2,
            "roomId": 1,
            "userId": 1,
            "sellerId": 2,
            "hotelId": 1,
            "date": "2021-03-23",
            "id": 2,
            "price": 150.99
        },
        {
            "currencyBase": 2,
            "userCurrencyNeed": 2,
            "roomId": 1,
            "userId": 1,
            "sellerId": 2,
            "hotelId": 1,
            "date": "2021-03-23",
            "id": 5,
            "price": 150.99
        }
    ]
}
```
**Find by Identifier**
```
url: /users/{id}/bookings/{id}
type: GET
result:
{
    "status": "success",
    "data": {
        "currencyBase": 2,
        "userCurrencyNeed": 2,
        "roomId": 1,
        "userId": 1,
        "sellerId": 2,
        "hotelId": 1,
        "date": "2021-03-23",
        "id": 5,
        "price": 150.99
    }
}
```
**Delete by Identifier**
```
url: /users/1/bookings/1
type: DELETE
```

## Testes
Entre dentro do container, para isso, rode o comando:
```bash
docker ps
```
será listado todos os containers docker que estão rodando no momento,
o nome do container docker do projeto é provavelmente: **tariff-calculation_tariff_1**.
Após encontrar o container do projeto, acesse com o comando abaixo:
```bash
docker exec -it tariff-calculation_tariff_1 bash
```
Já dentro do container, rode o comando abaixo para rodar os testes.
```bash
php vendor/bin/phpunit 
```
**Foi criado apenas o teste de Cálculo de Tarifa, o motivo é que é a principal regra nesse projeto,
os demais módulos são constituídos básicamente por cruds, na qual um teste funcional foi o suficiente.**