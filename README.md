## Application PHP OO MVC

![Docker Version Support](https://img.shields.io/badge/Docker-23.0%2B-brightgreen.svg?style=flat-square)
![NPM Version Support](https://img.shields.io/badge/NPM-9.6%2B-brightgreen.svg?style=flat-square)

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

## Database

```bash
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_users` (`user_id`),
  CONSTRAINT `posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
```

## How To Use

- First configure the files with the variables for docker, copying a new file without the .dist

> .env.dist

- Then configure with the same information for database access

> backend/app/config/config.php.dist

_________________

*All examples of Models, Views and Controllers are in the project*
