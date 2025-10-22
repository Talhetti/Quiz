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

--- How to install dependencies locally ---

1) PHP / Composer (recommended):

Install Composer, then run in project root:

```bash
composer install
```

To install production-only dependencies:

```bash
composer install --no-dev
```

2) Node / npm (recommended):

Install Node.js (18+ recommended) and npm or pnpm. Then in project root:

```bash
npm install
# or
pnpm install
```

To build assets:

```bash
npm run build
# or for dev
npm run dev
