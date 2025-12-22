# People Management  
### CodeIgniter 3 • PHP • PostgreSQL • Docker

Sistema de **gestão de pessoas e cargos**, desenvolvido como **desafio técnico**, com foco em organização de código, regras de negócio e ambiente containerizado.

O projeto permite o cadastro de pessoas e cargos, o vínculo entre eles com controle de datas e a manutenção do histórico de cargos por pessoa.

---

## 🚀 Tecnologias Utilizadas

- **PHP 7.4**
- **CodeIgniter 3**
- **PostgreSQL**
- **Docker & Docker Compose**
- **Apache**
- **Bootstrap 5**

---

## 📌 Funcionalidades

- Cadastro, edição, listagem e exclusão de **Pessoas**
- Cadastro, edição, listagem e exclusão de **Cargos**
- Vínculo de cargo à pessoa com **data de início**
- Controle de **histórico de cargos**, armazenando data de início e fim
- Possibilidade de **editar histórico de cargos**
- Visualização do **cargo atual** de cada pessoa
- Consulta do **histórico completo de cargos** por pessoa
- Vínculo de cargos tanto pela tela da pessoa quanto pela tela do cargo
- Interface responsiva utilizando **Bootstrap**
- Arquitetura **MVC** com CodeIgniter 3
- Ambiente **100% containerizado** com Docker

---

## 📋 Requisitos para Execução

É necessário ter instalado:

- **Docker**
- **Docker Compose**

Verifique com:

```bash
docker --version
docker compose version
```

---

## ▶️ Como Executar o Projeto

Clone o repositório:

```bash
git clone https://github.com/camilafernandes140494/people-management-ci3.git
cd people-management-ci3
```

Suba os containers:

```bash
docker compose up -d --build
```

A aplicação estará disponível em:

```text
http://localhost:8080
```

---

## 🗄️ Banco de Dados

O projeto utiliza **PostgreSQL**, com as seguintes configurações:

- **Host:** db  
- **Porta:** 5432  
- **Database:** people_management  
- **Usuário:** postgres  
- **Senha:** postgres  

A estrutura das tabelas pode ser criada a partir do arquivo:

```text
/database/schema.sql
```

---

## 📁 Estrutura do Projeto

```text
application/
 ├── controllers/
 ├── models/
 ├── views/
 └── config/

docker/
 ├── php/
 └── postgres/

system/
index.php
docker-compose.yml
```

---

## 📝 Observações Importantes

- O projeto **não utiliza Composer**, portanto os arquivos do framework CodeIgniter estão versionados.
- Os dados do banco são persistidos via **volumes Docker** e não são versionados.
- Todo o ambiente pode ser reproduzido facilmente em qualquer máquina com Docker instalado.
- O PHP é executado exclusivamente via **Docker**, não sendo necessária instalação local.

---

## 📄 Licença

Projeto desenvolvido para fins de estudo e avaliação técnica.
