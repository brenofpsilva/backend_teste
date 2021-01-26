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
   Inputs: `name`,`email`,`username`,`password`,`password_confirmation`
- `Login POST url_app/api/login`

### Prestadores
- `Adicionar POST url_app/api/providers`
- `Editar PUT url_app/api/providers/{id}`
- `Listar GET url_app/api/providers`
- `Exibir GET url_app/api/providers/{id}`

### Serviços
- `Adicionar POST url_app/api/services`
- `Editar PUT url_app/api/services/{id}`
- `Listar GET url_app/api/services`
- `Exibir GET url_app/api/services/{id}`
- `Importar POST url_app/api/service-import`
