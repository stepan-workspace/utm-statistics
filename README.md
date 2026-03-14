# CakePHP 2.10.24 Docker Project

## Зависимости

- Docker
- Docker Compose

## Запуск проекта
  - `git clone git@github.com:stepan-workspace/utm-statistics.git`
  - `cp .env_dist .env && cp app/app/Config/database.php.dist app/app/Config/database.php`
  - `make up`
  - `make migration-run`
  - `make cake EXEC="utm_data_seed"` # для большего объёма данных, рекомендуется ваполнить команду от 2-3 раз
  - `make permission-resolve` # если требуется
  - указать следующие параметры в `app/app/Config/core.php`:
    - Security.salt
    - Security.cipherSeed

После запуска проект доступен по http://localhost:8080/

## Время выполнения
 - docker + framework - 2h
 - test - 3h
 