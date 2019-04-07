<p align="center">Projeto API - FTD</p>

## Sobre o projeto

 - O projeto é uma API para o cadastro de clientes e seus repectivos endereços.
 - Framework Laravel

## Etapas do projeto

- Desenvolvimento do método get /clientes, para retornar todos os clientes cadastrados
 
1 - Desenvolvimento dos metódos:
- get 	 - /api/clientes/{id} - consultar por id
- post 	 - /api/clientes - cadastrar um novo cliente. Parâmetros (nome e email)
- delete - /api/clientes/{id} - deletar um cliente. Somente se o mesmo não tiver um endereço cadastrado
- put 	 - /api/clientes/{id} - atualizar os dados do cliente

2 - Desenvolvimento dos métodos referente aos endereços dos clientes
- get	 - /api/enderecos - retorar todos os endereços cadastrados
- get 	 - /api/enderecos/{id} - consultar endereço por id
- post 	 - /api/enderecos - cadastrar um novo endereço. Parâmetros (id_cliente, cep, logradouro, numero, complemento e uf). Cadastrar somente se o id_cliente informado for válido.
- delete - /api/enderecos/{id} - deletar um endereço
- put 	 - /api/enderecos/{id} - atualizar os dados do endereço

## Contato

- Rodrigo Ruy Oliveira
- E-mail: rro.oliveira@gmail.com

