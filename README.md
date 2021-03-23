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

## Componentes utilizados:
* Docker
* Docker-compose
* PHP >= 8
* Composer
* MySQL
* Slim
* Laravel Validation
* PDO
* PHP-DI
* API https://economia.awesomeapi.com.br

## Uso da Api
Para rodar este projeto é necessário ter o Docker e Docker-compose instalado,
após clonar o projeto basta entrar na pasta do projeto e rodar o comando: ***docker-compose up***.
O projeto rodará na porta 8080. Será instalado todas as dependências, incluindo o banco e suas tabelas.
Detalhe importante é que o banco MySQL utilizará sua porta padrão.

Abaixo estão registrados os endereços para a manipulação da api:

### Coin - Manipule as moedas
**Register**
```
url: /coins
type: POST
body:
{
    "money": "EUR",
    "profitMargin": 15 // margem de lucro da agência em cima da moeda, valor positivo maior ou igual a 0
}
result:
{
    "content": {
        "money": "EUR",
        "profitMargin": 15,
        "id": 3
    }
}
```
**Find All**
```
url: /coins
type: GET
result:
{
    "content": [
        {
            "money": "BRL",
            "profitMargin": 0,
            "id": 1
        },
        {
            "money": "USD",
            "profitMargin": 10,
            "id": 2
        },
        {
            "money": "EUR",
            "profitMargin": 15,
            "id": 3
        }
    ]
}
```
**Find by Identifier**
```
url: /coins/{id}
type: GET
result:
{
    "content": {
        "money": "BRL",
        "profitMargin": 50,
        "id": 2
    }
}
```
**Update by Identifier**
```
url: /coins/{id}
type: PUT
body:
{
	"money": "BRL",
	"profitMargin": "50" // margem de lucro da agência em cima da moeda, valor positivo maior ou igual a 0
}
```
**Delete by Identifier**
```
url: /coins/{id}
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
    "content": {
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
    "content": [
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
    "content": {
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
url: /coins/{id}
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
    "content": {
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
    "content": [
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
    "content": {
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

### Room Coin - Manipule os valores e moedas
**Register**
```
url: /hotel/{hotelId}/rooms/{roomId}/coins
type: POST
body:
{
    "coinId": 2, // id da moeda
	"price": 130 // valor do quarto
}
result:
{
    "content": {
        "roomId": 1,
        "coinId": 2,
        "price": 130,
        "id": 2
    }
}
```
**Find All**
```
url: /hotel/{hotelId}/rooms/{roomId}/coins
type: GET
result:
{
    "content": [
        {
            "roomId": 2,
            "coinId": 2,
            "price": 120,
            "id": 3
        },
        {
            "roomId": 2,
            "coinId": 3,
            "price": 115,
            "id": 4
        }
    ]
}
```
**Find by Identifier**
```
url: /hotel/{hotelId}/rooms/{roomId}/coins
type: GET
result:
{
    "content": {
        "roomId": 1,
        "coinId": 2,
        "price": 201,
        "id": 1
    }
}
```
**Update by Identifier**
```
url: /hotel/{hotelId}/rooms/{roomId}/coins/{id}
type: PUT
body:
{
	"coinId": 2, // id da moeda
	"price": 130 // valor do quarto
}
```
**Delete by Identifier**
```
url: /hotel/{hotelId}/rooms/{roomId}/coins/{id}
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
    "content": {
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
    "content": [
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
    "content": {
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

### TariffCalculation - Calcule o valor de um quarto
O valor do quarto será calculado utilizando o valor da moeda base,
somando com a margin de lucro do agência em cima da moeda selecionada pelo usuário,
somando a margem de lucro do vendedor e aplicado o valor da cotação entre as moedas.

**Calculate price**
```
url: /hotels/{hotelId}/rooms/{roomId}/prices
type: POST
body:
{
	"coinTo": 1, // id da moeda que será mostrada para o usuário
	"coinFrom": 2, // id da moeda em que foi definido um valor de quarto
	"sellerId": 2 // id do vendedor para que seja utilizado a margem de lucro dele
}
result:
{
    "content": {
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
    "content": {
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
    "content": [
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
    "content": {
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
    "userCoinNeed": 2, // id da moeda requisitada pelo usuário
	"coinBase": 3, // id da moeda de venda do quarto
	"sellerId": 2, // id do vendedor
	"hotelId": 1, // id do hotel
	"roomId": 1 // id do quarto
}
result:
{
    "content": {
        "userCoinNeed": 2,
        "coinBase": 2,
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
    "content": [
        {
            "coinBase": 2,
            "userCoinNeed": 2,
            "roomId": 1,
            "userId": 1,
            "sellerId": 2,
            "hotelId": 1,
            "date": "2021-03-23",
            "id": 2,
            "price": 150.99
        },
        {
            "coinBase": 2,
            "userCoinNeed": 2,
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
    "content": {
        "coinBase": 2,
        "userCoinNeed": 2,
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
php vendor/bin/phpunit --configuration phpunit.xml 
```
**Foi criado apenas o teste de Cálculo de Tarifa, o motivo é que é a principal regra nesse projeto,
os demais módulos são constituídos básicamente por cruds, na qual um teste funcional foi o suficiente.**