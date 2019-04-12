<p align="center">Projeto API - FTD</p>

## Sobre o projeto

 - O projeto é uma API que realiza o CRUD referente ao cadastro de clientes e seus repectivos endereços. O retorno das consultas é em formato JSON.
 - Framework Laravel

## Etapas do projeto

1 - Desenvolvimento da API RESTFULL referente aos livros

- get 	 - /api/livros - consultar todos os livros
- get 	 - /api/livros/{isbn} - consultar um livro por isbn
- post 	 - /api/livros - cadastrar um livro. Informar (isbn, title, cover, author, level, discipline e price)
- delete - /api/livros/{id} - deletar um livro.
- put 	 - /api/livros/{id} - atualizar os dados do livro

2 - Criação das migrations e seeds

3- Cache de dados utilizando o Redis (Necessário descomentar o código nos controllers quando o Redis tiver instalado.)

4 - Testes unitários

6 - Publicação do projeto no Heroku

## Plus 
- Desenvolvimento da API RESTFULL referente aos clientes
 
- get 	 - /api/clientes/{id} - consultar por id
- post 	 - /api/clientes - cadastrar um novo cliente. Parâmetros (nome e email)
- get 	 - /api/clientes/{id} - consultar cliente por id
- post 	 - /api/clientes - cadastrar um novo cliente
- delete - /api/clientes/{id} - deletar um cliente. Somente se o mesmo não tiver um endereço cadastrado
- put 	 - /api/clientes/{id} - atualizar os dados do cliente

- Desenvolvimento da API RESTFULL referente aos endereços dos clientes
- get	 - /api/enderecos - retorar todos os endereços cadastrados
- get 	 - /api/enderecos/{id} - consultar endereço por id
- post 	 - /api/enderecos - cadastrar um novo endereço. Parâmetros (id_cliente, cep, logradouro, numero, complemento e uf). Cadastrar somente se o id_cliente informado for válido.
- post 	 - /api/enderecos - cadastrar um novo endereço
- delete - /api/enderecos/{id} - deletar um endereço
- put 	 - /api/enderecos/{id} - atualizar os dados do endereço

## Contato

- Rodrigo Ruy Oliveira
- E-mail: rro.oliveira@gmail.com

