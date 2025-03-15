### Como Rodar esse projeto em sua máquina
```bash
$ git clone https://github.com/devnillo/encurtall-api
$ cd encurtall-api
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan serve
```
## Ends-points
### Referente ao Usuário
Para **login, logOut, registro, usuario atual, e refresh token jwt**
  
| Ação | Rota | Body | Header |
|--|--|--|--|
| Login | **POST** /user/login | email e password | nada |
| Register | **POST** /ruser/egister | name, email e password | token jwt |
| Logout | **POST** /user/logout | nada | token jwt |
| Refresh | **POST** /user/refresh | nada | token jwt |
| Refresh | **GET** /user/get | nada | token jwt |
 
### Referente a Rotas
Para **criação, recebimento, atualização, e recebimento do link para redirect**
| Ação | Rota | Body | Header |
|--|--|--|--|
| Criar Rota | **POST** /user/create/route | URI, link original | token jwt |
| Receber Rota | **GET** /user/get/route/**${uri}** |  nada | token jwt |
| Atualizar Rota | **POST** /user/update/route/**${uri}** | nada | token jwt |
| Link da Rota | **GET** /user/get/route-link/**${uri}** | nada | token jwt |