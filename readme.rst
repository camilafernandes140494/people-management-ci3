# People Management – CodeIgniter 3 + Docker

Sistema simples de gestão de pessoas e cargos, desenvolvido como desafio técnico utilizando PHP com CodeIgniter 3, PostgreSQL, Docker e Bootstrap.

## Tecnologias utilizadas

PHP 7.4  
CodeIgniter 3  
PostgreSQL  
Docker e Docker Compose  
Apache  
Bootstrap 5  

## Funcionalidades

- CRUD de Pessoas
- CRUD de Cargos (Roles)
- Estrutura preparada para vínculo de cargo por pessoa
- Interface com Bootstrap
- Arquitetura MVC utilizando CodeIgniter 3
- Ambiente totalmente containerizado com Docker

## Pré-requisitos

É necessário ter instalado na máquina:

- Docker
- Docker Compose

Para verificar:
docker --version
docker compose version


## Como rodar o projeto

Clone o repositório:


git clone <url-do-repositorio>
cd people-management-ci3


Suba os containers:


docker compose up -d --build


A aplicação ficará disponível em:


http://localhost:8080


## Banco de dados

O projeto utiliza PostgreSQL com as seguintes configurações:

Host: db  
Porta: 5432  
Database: people_management  
Usuário: postgres  
Senha: postgres  

A estrutura de tabelas pode ser criada a partir do arquivo:


/database/schema.sql


## Estrutura do projeto



application/
controllers/
models/
views/
config/

docker/
php/
postgres/

system/
index.php
docker-compose.yml


## Observações

- O projeto não utiliza Composer, portanto os arquivos do framework CodeIgniter estão versionados.
- Os dados do banco são persistidos via volume Docker e não são versionados.
- O ambiente pode ser reproduzido facilmente em qualquer máquina com Docker instalado.

## Licença

Projeto criado para fins de estudo e avaliação técnica.