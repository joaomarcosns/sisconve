<h1 align="center">
    <img src="https://i.imgur.com/9DPPaMz.png" alt="Sisconve Logo" width="250">
    <p>Sistema de Controle de Vendas e Estoque</p>
</h1>

<div align="center">
    <p>Um projeto desenvolvido para a disciplina de WEB II do curso de Análise e Desenvolvimento de Sistemas - IFBaiano <i>campus</i> Guanambi</p>
    <img alt="License" src="https://img.shields.io/github/license/joaomarcosns/sisconve">
    <img alt="Languages" src="https://img.shields.io/github/languages/count/joaomarcosns/sisconve">
    <img alt="Languages Top" src="https://img.shields.io/github/languages/top/joaomarcosns/sisconve">
    <img alt="Commits" src="https://img.shields.io/github/commit-activity/m/joaomarcosns/sisconve">
    <img alt="Starts" src="https://img.shields.io/github/stars/WebI-2020-2/sisconve">
</div>

#

<div align="center">
    <h3><i>Tecnologias Utilizadas</i></h3>
    <img src="https://img.shields.io/badge/LARAVEL-777BB4?style=for-the-badge&logo=laravel&logoColor=white">
    <img src="https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white">
    <img src="https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E">
    <img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white">
    <img src="https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white">
    <img src="https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white">
</div>

#

<div align="center">
    <h3><i>Screen Shots</i></h3>
    <p><img src="https://user-images.githubusercontent.com/69218604/128452998-a1724cd7-b93c-4734-b37c-f26ac797b5fe.png" width="70%"/></p><br>
    <p><img src="https://user-images.githubusercontent.com/69218604/128453553-1eb1d982-056b-4316-877a-7e1c2ecce1dd.png" width="70%"/></p><br>
    <p><img src="https://user-images.githubusercontent.com/69218604/128453892-4588ec27-a30d-4103-8fe1-8fba7949f2f8.png" width="70%"/></p><br>
    <p><img src="https://user-images.githubusercontent.com/69218604/128454387-1655dacd-afe2-4238-aa4f-0aeb96c9f6f1.png" width="70%"/></p>
</div>

#

<div align="center">
    <h3><i>Licença</i></h3>
    <a href="https://github.com/joaomarcosns/sisconve/blob/main/LICENSE.md">GLP 3.0</a>
</div>

#

<br>
<h1 align="center">
  <!--<img src="">-->
  <p>🖥 Projeto II</p>
</h1>
<p align="center">
  Um simples sistema de vendas desenvolvido utilizando o framework <a href="https://laravel.com/">Laravel</a> da linguagem <a href="https://www.php.net/">PHP</a> como forma de aprendizado e também como projeto da disciplina de <b>Laboratório de Programação Web II</b> - Semestre 2021.1 do curso de <b>Análise e Desenvolvimento de Sistemas</b> ofertado pelo <a href="https://www.ifbaiano.edu.br/unidades/guanambi/"><b>IFBaiano <i>Campus</i> Guanambi</a> durante os anos de 2021 e 2022.</b> Professor: <b>Fabio dos Santos Lima</b>
</p>

#

<p align="center">
  🔗 <a href="https://sisconve-joao-marcos.herokuapp.com/">Clique aqui</a> para acessar a aplicação online.
</p>
### 📌 → Instalando localmente
- Pré requisitos: <a href="https://www.php.net/">PHP</a> `>= 7` e <a href="https://getcomposer.org/">Composer</a> `>= 2`


- Clone o projeto utilizando o comando abaixo
```bash
  git clone https://github.com/joaomarcosns/web2-2021.1.git
```
- Abra o diretório do projeto
```bash
  cd web2-2021.1
```
- Selecione a branch `Projeto2-2Unidade`
```bash
  git checkout Projeto2-2Unidade 
```
- Renomeie o arquivo `.env.example` para `.env`
```bash
  cp .env.example .env
```
- Altere os valores de conexão com o banco de dados do arquivo `.env`
```env
  # mysql, pgsql, etc
  DB_CONNECTION=mysql
  DB_HOST=localhost
  DB_PORT=3306
  DB_DATABASE=dbname
  DB_USERNAME=dbuser
  DB_PASSWORD=dbpass
```
- Instale as dependencias
```bash
  composer install
```
- Após instalar todas as dependencias, execute os seguintes comandos no terminal:
```bash
  # Adiciona todas as permissões na pasta storage
  $ chmod -R 777 storage 
  # Gera a chave da aplicação
  $ php artisan key:generate 
  # Cria um link simbólico entre as pastas /public/storage -> /storage/app/public
  $ php artisan storage:link
```
- E por ultimo, os seguintes comandos
```bash
  # Cria todas as tabelas do banco de dados SQL
  $ php artisan migrate
  # Rodar as seeder
  $ php artisan db:seed --class=CaixaSeeder
  $ php artisan db:seed --class=funcionarios
  $ php artisan db:seed --class=Fornecedores
  $ php artisan db:seed --class=Clientes
  $ php artisan db:seed --class=ContatosCliente
  $ php artisan db:seed --class=EnderecoCliente
  $ php artisan db:seed --class=Categoria
  $ php artisan db:seed --class=Produto
  $ php artisan db:seed --class=FormaPagamento
  # Cria um servidor em sua localhost na porta 8000 a partir do próprio php
  $ php -S localhost:8000 public/index.php
```

#

### 📄 →  Licença:
<ul>
  <ul>
    <li><a href="">Licença</a></li>
  </ul>
</ul>

#

<p align="center">
  <i>Developed with 🖤 by <a href="https://github.com/joaomarcosns" >João Marcos Neves da Silva</a></i>
</p>
