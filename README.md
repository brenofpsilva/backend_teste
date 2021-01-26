## Instalação

- `git clone https://github.com/brenofpsilva/backend.git`
- `cd backend/`
- `composer install`
- `cp .env.example .env`
- Atualize `.env` e defina suas credenciais de banco de dados 
- `php artisan key:generate`
- `php artisan migrate`
- `npm install`
- `npm run dev`
- `php artisan serve`

## EndPoint

### Usuários
- `Adicionar POST url_app/api/register`
   Inputs: `name, email, username, password , password_confirmation`
- `Login POST url_app/api/login`
    Inputs: `username, password`

### Serviços
- `Adicionar POST url_app/api/services`
   Inputs: `name, description, price`
- `Editar PUT url_app/api/services/{id}`
   Inputs: `name, description, price`
- `Listar GET url_app/api/services`
- `Exibir GET url_app/api/services/{id}`
- `Importar POST url_app/api/service-import`
   Inputs: `file`  

### Prestadores
- `Adicionar POST url_app/api/providers`
   Inputs: `name, phone, email, services[]`
- `Editar PUT url_app/api/providers/{id}`
   Inputs: `name, phone, email, services[]`
- `Listar GET url_app/api/providers`
- `Exibir GET url_app/api/providers/{id}`


