<p align="center">Projeto FTD</p>

## Sobre o projeto

 - O projeto é uma API que realiza o CRUD referente ao cadastro de clientes e seus repectivos endereços. O retorno das consultas é em formato JSON.
 - Framework Laravel

## Etapas do projeto

- Desenvolvimento do método get /clientes, para retornar todos os clientes cadastrados
 
1 - Desenvolvimento dos metódos:
- get 	 - /api/clientes/{id} - consultar por id
- post 	 - /api/clientes - cadastrar um novo cliente
- delete - /api/clientes/{id} - deletar um cliente. Somente se o mesmo não tiver um endereço cadastrado
- put 	 - /api/clientes/{id} - atualizar os dados do cliente

2 - Desenvolvimento dos métodos referente aos endereços dos clientes
- get	 - /api/enderecos - retorar todos os endereços cadastrados
- get 	 - /api/enderecos/{id} - consultar por id
- post 	 - /api/enderecos - cadastrar um novo cliente
- delete - /api/enderecos/{id} - deletar um cliente. Somente se o mesmo não tiver um endereço cadastrado
- put 	 - /api/enderecos/{id} - atualizar os dados do cliente

3 - Criação das migrations e seeds

4 - Cache de dados utilizando o Redis

5 - Testes unitários

6 - Publicação do projeto no Heroku

## Contato

- Rodrigo Ruy Oliveira
- E-mail: rro.oliveira@gmail.com

