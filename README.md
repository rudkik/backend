## Установка проекта

Клонируем репозиторий

Запускаем установщик (данные для простого запуска, для более кастомного решения под проект, нужно будет перенастроить тот же .env)

```bash
make install
```


## Технический стек

* PHP 7.4
* Postgres 12
* Laravel ^8.54
* Voyager ^1.5
* laravel-debugbar ^3.5


## Полезные ссылки

* [JIRA](https://jira.rocketfirm.com/browse/LAR)


## Работа с докером (Makefile)

|Команда|Описание|
|:-:|:-:|
|run|Запустить __docker-compose__|
|stop|Остановить __docker-compose__|
|php|Зайти в контейнер __php-fpm__|
|nginx|Зайти в контейнер __nginx__|
|adminer|Зайти в контейнер __adminer__|
|postgres|Зайти в контейнер __postgres__|


## Пользовател для Voyager

Зайти в админку можно через http://localhost/admin

|Поле|Значение|
|:-:|:-:|
|Почта|admin@rocketfirm.net|
|Пароль|Задается программистом|


## Adminer (Database)

Заходим в http://localhost:8080. Все необходимые данные можно посмотреть в .env или .env.example.

|Поле|Значение|
|:-:|:-:|
|System|PostgreSQL|
|Server|postgres|
|Username|postgres|
|Password|postgres|
