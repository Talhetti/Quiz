Laravel Quiz Starter Kit
🎯 Introdução

Este é um projeto de quiz para praticar conhecimentos em linguagens de programação, desenvolvido com Laravel 12 + Blade + AlpineJS.

O objetivo principal é oferecer uma plataforma simples, intuitiva e sem dependência de frameworks frontend complexos (como Vue ou React), onde os usuários podem:

Escolher uma linguagem de programação

Responder a quizzes interativos

Acompanhar seu histórico de respostas

Personalizar a aparência da aplicação

Gerenciar suas informações de perfil e senha

Essa aplicação serve tanto como ferramenta de estudo quanto como exemplo prático de como usar Laravel + Blade para construir aplicações funcionais e modernas.

🖼️ Capturas de Tela

Adicione aqui suas capturas de tela reais ou use exemplos genéricos abaixo se quiser ilustrar visualmente:






✅ O que está incluso?

A aplicação vem com funcionalidades prontas para uso:

Autenticação Completa

Login

Registro

Redefinição de Senha

Confirmação de E-mail

Funcionalidades do Quiz

Seleção de Linguagem (Ex: PHP, JavaScript, Python)

Perguntas por linguagem

Feedback de acertos/erros

Histórico de quizzes respondidos

Perfil do Usuário

Atualização de informações pessoais

Alteração de senha

Alteração de preferências de aparência (tema escuro/claro, etc.)

Painel/Dashboard

Visualização rápida de progresso

Acesso rápido às últimas atividades

🚀 Como utilizar?

Você pode iniciar o projeto usando:

laravel new --using=seu-usuario/quiz-starter-kit


Ou siga os passos abaixo para clonar e rodar localmente.

⚙️ Instalação

Clone o repositório

git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio


Instale as dependências PHP

composer install


Instale as dependências JavaScript

npm install


Copie o arquivo de ambiente

cp .env.example .env


No Windows PowerShell:

Copy-Item .env.example .env


Configure as variáveis do .env conforme necessário

Inclua informações como DB_DATABASE, DB_USERNAME, etc.

Gere a chave da aplicação

php artisan key:generate


Execute as migrações do banco de dados

php artisan migrate


Inicie o servidor de desenvolvimento

php artisan serve


(Opcional) Compile os assets:

npm run dev

🎨 Elementos de Design

Todos os componentes visuais foram criados usando Blade + AlpineJS, com inspiração no estilo AdminLTE/CoreUI.
Para ver exemplos de HTML cru dos componentes, visite o Wiki de Design.

📌 Funcionalidades Futuras

Ranking de usuários

Criação de quizzes customizados

Modo competitivo entre amigos

Mais temas de personalização
