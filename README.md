# Autoria_PHP

Este repositório contém um site desenvolvido em PHP que implementa um sistema completo de CRUD (Create, Read, Update, Delete) para gerenciar três tabelas relacionadas em um banco de dados MySQL:

- **Livro**: Informações sobre os livros cadastrados.
- **Autor**: Dados sobre os autores.
- **Autoria**: Tabela de relacionamento que permite vincular autores aos livros.

Com esta aplicação, é possível:

- Criar novos registros.
- Visualizar dados existentes.
- Atualizar informações.
- Remover registros de forma organizada e eficiente.

Usuários para login:
- Nome: UsuarioA / Senha: 123
- Nome: UsuarioB / Senha: 456
- Nome: Gabriel / Senha: 000

A aplicação foi projetada para funcionar localmente, utilizando o XAMPP como servidor local e ambiente para o banco de dados.

## Tutorial para Configuração com XAMPP

Siga os passos abaixo para rodar o projeto na sua máquina:

### 1. Faça o download do XAMPP

- Acesse o site oficial do XAMPP: [https://www.apachefriends.org/](https://www.apachefriends.org/)
- Baixe e instale o XAMPP adequado para o seu sistema operacional.

### 2. Baixe este repositorio

### 3. Mova os arquivos para a pasta do XAMPP
- Copie a pasta do projeto clonado.
Cole em: C:\xampp\htdocs\

### 4. Inicie o XAMPP
- Abra o painel de controle do XAMPP.
- Ative os serviços Apache e MySQL clicando em "Start".

### 5. Crie o banco de dados
- Acesse o phpMyAdmin pelo navegador: http://localhost/phpmyadmin
- Clique em "Novo" e crie um banco de dados chamado nome_do_banco (substitua pelo nome utilizado no projeto).
- Importe o arquivo banco.sql fornecido na pasta do repositório:
- Clique no banco criado.
- Vá até a aba "Importar".
- Selecione o arquivo bd_autoria.sql e clique em "Executar".

### 6. Acesse pelo navegador: 
 localhost/autoria/login.php 
- ou sem login:
  localhost/autoria/menu.html 





