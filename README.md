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
