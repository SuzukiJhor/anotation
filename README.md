### 🧭 Projeto Notes - Laravel

Desenvolvido em Laravel 11, arquitetura que explora os principais recursos do framework. A aplicação integra rotas dinâmicas, controllers e views Blade. Persistência com Eloquent ORM, com migrations e seeders, e versionamento do banco de dados. Práticas de segurança por encriptação, e estratégias de soft e hard delete.


### 🔦 Como rodar o projeto

### Passo a passo
Clone Repositório
```sh
git clone https://github.com/SuzukiJhor/simple-notes.git
```
```sh
cd setup-docker-laravel-11
```

Suba os containers do projeto
```sh
docker-compose up -d
```


Crie o Arquivo .env
```sh
cp .env.example .env
```

Acesse o container app
```sh
docker-compose exec app bash
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Rodar as migrations
```sh
php artisan migrate
```

Acesse o projeto
[http://localhost:8000](http://localhost:8000)
