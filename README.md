# Laravel Quiz Starter Kit

---

## 🎯 Introdução

Este é um projeto de **quiz para praticar conhecimentos em linguagens de programação**, desenvolvido com Laravel 12 + Blade + AlpineJS.

O objetivo principal é oferecer uma plataforma simples, intuitiva e sem dependência de frameworks frontend complexos (como Vue ou React), onde os usuários podem:

- Escolher uma linguagem de programação
- Responder a quizzes interativos
- Acompanhar seu histórico de respostas
- Personalizar a aparência da aplicação
- Gerenciar suas informações de perfil e senha

Essa aplicação serve tanto como ferramenta de estudo quanto como exemplo prático de como usar Laravel + Blade para construir aplicações funcionais e modernas.

---

## ✅ O que está incluso?

A aplicação vem com funcionalidades prontas para uso:

- **Autenticação Completa**
  - Login
  - Registro
  - Redefinição de Senha
  - Confirmação de E-mail

- **Funcionalidades do Quiz**
  - Seleção de Linguagem (Ex: PHP, JavaScript, Python)
  - Perguntas por linguagem
  - Feedback de acertos/erros
  - Histórico de quizzes respondidos

- **Perfil do Usuário**
  - Atualização de informações pessoais
  - Alteração de senha
  - Alteração de preferências de aparência (tema escuro/claro, etc.)

- **Painel/Dashboard**
  - Visualização rápida de progresso
  - Acesso rápido às últimas atividades

---

## 🚀 Como rodar o projeto (passo-a-passo)

Siga estes passos no terminal (diretório do projeto: ` /home/samsung-linux/Desktop/Quiz `).

1) Pré-requisitos

- PHP 8.2+ (ver `composer.json`)
- Composer (https://getcomposer.org)
- Node.js (recomendado 18+) e npm ou pnpm
- sqlite3 CLI (opcional, para inspeção/dump)

2) Instalar dependências PHP

```bash
composer install
```

3) Instalar dependências JavaScript

```bash
npm install
# ou
pnpm install
```

4) Copiar `.env` e gerar chave

```bash
cp .env.example .env
php artisan key:generate
```

5) Criar arquivo SQLite (se ainda não existir)

```bash
touch database/database.sqlite
```

6) Rodar migrações e seeders

Se quiser migrar e semear (atenção: seeders do projeto podem inserir dados que causam conflitos se já existentes). Se houver erro de UNIQUE constraint, considere limpar a tabela em questão ou tornar os seeders idempotentes.

```bash
php artisan migrate --force
php artisan db:seed --force
```

7) Rodar a aplicação localmente (desenvolvimento)

```bash
php artisan serve
# em outro terminal
npm run dev
```

8) Build de produção (assets)

```bash
npm run build
```

9) Dump do banco (opcional) — criar um arquivo SQL com schema + dados

```bash
sqlite3 database/database.sqlite ".dump" > database/dump.sql
```

10) Backup rápido do arquivo SQLite

```bash
cp database/database.sqlite database/database.sqlite.bak
```

11) Notas de troubleshooting

- Se aparecer "database is locked": pare servidores/consumers que possam estar usando o DB e tente novamente.
- Se o seeder falhar por conflito UNIQUE (ex.: `users.email`), remova entradas duplicadas manualmente ou modifique o seeder para checar existência antes de inserir.
- Para testes automatizados use `php artisan test`.

Se quiser, eu posso abrir um PR com esse README atualizado ou ajustar o texto em português/inglês conforme preferir.
