## Application PHP OO MVC

![Docker Version Support](https://img.shields.io/badge/docker-23.0%2B-brightgreen.svg?style=flat-square)

It is an example of using a pattern mvc in php7.4 but with installation completely via docker, this application has user registration, login and post registration

## Instalation

```bash
cd ./backend/public/
npm install
```

## Execution

```bash
docker-compose up -d
```
or

```bash
docker compose up -d
```

## How To Use

- First configure the files with the variables for docker, copying a new file without the .dist

> .env.dist

- Then configure with the same information for database access

> backend/app/config/config.php.dist

_________________

*All examples of Models, Views and Controllers are in the project*
