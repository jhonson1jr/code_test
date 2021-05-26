
## APIs Laravel com CRUD completo e JwtToken

## Necessários: Composer, MySQL, PostMan ou Insomnia, php 7

Tentativa de aproximação do padrão de projeto Adapter e OAuth 2.0 baseado na RFC 6749

## Instruções

Baixar o projeto;

Executar dentro do prompt de comando dentro do diretório raiz do projeto:
```
composer update
```
----- ----- ----- 

Criar uma base de dados no MySQL e criar um arquivo .env seguindo o .env.example, alterando os dados de conexao à base e de e-mail

```php
DB_CONNECTION=mysql
DB_HOST=<seu host>
DB_PORT=3306
DB_DATABASE=<sua database>
DB_USERNAME=<seu usuário>
DB_PASSWORD=<sua senha>


MAIL_DRIVER=smtp
MAIL_HOST={smtp do seu provedor>
MAIL_PORT=<porta smtp do seu provedor>
MAIL_USERNAME=<seu e-mail>
MAIL_PASSWORD=<sua senha>
MAIL_ENCRYPTION=<criptografia usada por seu provedor: padrão ssl>
```
-> lembrando que a aplicação funciona caso não queira vincular algum provedor de e-mail

----- ----- ----- 

No prompt, caso seja preciso gerar chave para o projeto, executar:

```
php artisan key:generate

```
----- ----- ----- 

No prompt, executar para montar a base:

```
php artisan migrate:refresh --seed

```
----- ----- ----- 

Criar chave do token jwt para controle de acesso (digite "yes" caso apareça alguma validação):

```
php artisan jwt:secret

```
Usado jwt-auth para controle de tokens nas rotas ao invés do Passport (por maior facilidade de implementação):
https://github.com/tymondesigns/jwt-auth


----- ----- ----- 

Execute o projeto:

```
php artisan serve

```
----- ----- ----- 
## Rotas e exemplos de consumo

-> Funcionarios

Para obtenção de um token de acesso faça login com os dados abaixo:

POST: http://localhost:8000/api/funcionarios/login

Enviar json:
```
{
  "email" : "funcionario1@teste.com",
  "password" : "teste123"
}
```
=> O login retorna o token de acesso para as demais rotas de escrita (POST, PUT, DELETE), 
exceto funcionarios/salvar, para operar as rotas restritas, vincule o token obtido na opção Bearer -> Token 

GET: http://localhost:8000/api/funcionarios/listar

GET: http://localhost:8000/api/funcionarios/detalhes/1

DELETE: http://localhost:8000/api/funcionarios/remover/1

POST: http://localhost:8000/api/funcionarios/salvar

Enviar json:
```
{
  "id_loja": "2",
  "nome_funcionario": "Func teste 1",
  "email": "functeste1@teste.com"
}
```

PUT: http://localhost:8000/api/funcionarios/atualizar/1

Enviar json:
```
{
  "id": 3,
  "nome_funcionario": "Func teste 2",
  "email": "functeste2@teste.com",
  "id_loja": "2"
}
```


-> Lojas


GET: http://localhost:8000/api/lojas/listar

GET: http://localhost:8000/api/lojas/detalhes/1


-> Produtos


GET: http://localhost:8000/api/produtos/listar

GET: http://localhost:8000/api/produtos/detalhes/1

DELETE: http://localhost:8000/api/produtos/remover/1

POST: http://localhost:8000/api/produtos/salvar

Enviar json:
```
{
  "codigo": "1000005",
  "nome_produto": "Produto 5",
  "descricao": "Detalhe prod 5",
  "qtde_estoque": "30",
  "preco": "100",
  "peso": "10",
  "dimensao": "1x2x3",
  "tipo": "refrigerado",
  "id_loja": "2"
}
```

PUT: http://localhost:8000/api/produtos/atualizar/1

Enviar json:
```
{
  "id": 1,
  "codigo": "123",
  "nome_produto": "Produto 5",
  "descricao": "Detalhe prod 5",
  "qtde_estoque": "30",
  "preco": "100",
  "peso": "10",
  "dimensao": "1x2x3",
  "tipo": "refrigerado",
  "id_loja": "1"
}
```


-> Pedidos

GET: http://localhost:8000/api/pedidos/maisvendidos/1

GET: http://localhost:8000/api/pedidos/estoquebaixo/1

GET: http://localhost:8000/api/pedidos/ticketmedio/1

POST: http://localhost:8000/api/pedidos/salvar

Enviar json:
```
{
  "nome_cliente": "Cliente Post",
  "valor_frete": 50,
  "id_loja": 2,
  "produtos": [
    {
      "quantidade": 1,
      "id_produto": 4
    },
    {
      "quantidade": 1,
      "id_produto": 3
    }
  ]
}
```

## Relação disponíveis de produtos e lojas:
Produtos 1 e 2 -> loja 1

Produtos 3 e 4 -> loja 2
