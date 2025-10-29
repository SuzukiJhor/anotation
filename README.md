### 🧭 Projeto Simples Notes - Laravel

Desenvolvido em Laravel, apresenta uma arquitetura que explora os principais recursos do framework. A aplicação integra rotas dinâmicas, controllers estruturados e views Blade para uma experiência fluida entre back-end e front-end. A camada de persistência utiliza Eloquent ORM, com migrations e seeders, e versionamento do banco de dados. Foram implementadas práticas de segurança por encriptação, e estratégias de soft delete e hard delete.


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
