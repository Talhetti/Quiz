# Laravel + Blade Starter Kit

---

## Introduction

Our Laravel 12 + Blade starter kit provides the typical functionality found in the Laravel Starter kits, but with a few key differences:

- A CoreUI/AdminLTE inspired design layout
- Blade + AlpineJS code

This kit aims to fill the gap where there is no simple **Blade only** starter kit available.

Our internal goal at Laravel Daily is to start using this starter kit for our Demo applications, to avoid overwhelming our audience with Vue/Livewire/React if we had used one of the official Laravel 12 starter kits.

**Note:** This is Work in Progress kit, so it will get updates and fixes/features as we go.

---

## Screenshots

![](https://laraveldaily.com/uploads/2025/05/LoginPage.png)

![](https://laraveldaily.com/uploads/2025/05/RegisterPage.png)

![](https://laraveldaily.com/uploads/2025/05/DashboardPage.png)

![](https://laraveldaily.com/uploads/2025/05/ProfilePage.png)

---

## What is Inside?

Inside you will find all the functions that you would expect:

- Authentication
    - Login
    - Registration
    - Password Reset Flow
    - Email Confirmation Flow
- Dashboard Page
- Profile Settings
    - Profile Information Page
    - Password Update Page
    - Appearance Preferences

---

## How to use it?

To use this kit, you can install it using:

```bash
laravel new --using=laraveldaily/starter-kit
```

From there, you can modify the kit to your needs.

---

## Design Elements

If you want to see examples of what design elements we have, you can [visit the Wiki](<https://github.com/LaravelDaily/starter-kit/wiki/Design-Examples-(Raw-Files)>) and see the raw HTML files.

---

## Como instalar e utilizar

## Instalação

1. **Clone o repositório**
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. **Instale as dependências PHP**
   ```bash
   composer install
   ```

3. **Instale as dependências JavaScript (se aplicável)**
   ```bash
   npm install
   ```

4. **Copie o arquivo de ambiente**
   ```bash
   cp .env.example .env
   ```
   No Windows PowerShell:
   ```powershell
   Copy-Item .env.example .env
   ```

5. **Configure as variáveis do `.env` conforme necessário**

6. **Gere a chave da aplicação**
   ```bash
   php artisan key:generate
   ```

7. **Execute as migrações do banco de dados**
   ```bash
   php artisan migrate
   ```

8. **Inicie o
