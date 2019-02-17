
## Estate App Api (incomplete)

## Libraries in the Project
- jwt-auth https://github.com/tymondesigns/jwt-auth
- laravel-cors https://github.com/barryvdh/laravel-cors

## All Endpoints
```
Auth
POST /api/login
POST /api/register

User
- GET     /api/users
- GET     /api/users/:id
- GET     /api/users/:id/companies
- POST    /api/users
- PUT     /api/users/:id
- DELETE  /api/users/:id

Company
- GET     /api/companies
- GET     /api/companies/:id
- POST    /api/companies
- PUT     /api/companies/:id
- DELETE  /api/companies/:id

Appointment
- GET     /api/appointments
- GET     /api/appointments/:id
- POST    /api/appointments
- PUT     /api/appointments/:id
- DELETE  /api/appointments/:id

```

### Getting Started

### Installation (Manual)
```console
$ git clone https://github.com/melihs/estate-app-api.git    
$ cd estate-app-api && composer install
$ php artisan migrate:fresh --seed

```

