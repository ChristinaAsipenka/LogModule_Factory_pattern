# Log module (Factory pattern)

## Requirements:
- [Docker](https://docs.docker.com/engine/install/ubuntu/)
- [Docker-compose](https://docs.docker.com/compose/install/)

## Installation:
- Run `docker-compose up -d` to build a container
- Run `docker exec -it app_container bash` to pass into container
- Run `composer install`

## Settings variables in .env
- LOG_DEFAULT: Default log module
- LOG_MAIL: mail for sending log via Mail module
- LOGGERS: array of available loggers. If logger does not exist exception will be thrown

## Check functional
- http://localhost:8000/log : Sends a log message to the default logger
- http://localhost:8000/logto/{type}: Sends a log message to a special logger. type - logger type. If logger does not exist message will be sent to the default logger
- http://localhost:8000/logtoall : Sends a log message to all loggers

## To extend logger functional
1. Create new logger in app\Classes\Loggers extends AbstractLogger
2. Create new factory in app\Classes\Factory implements LoggerTypeInterface
3. Add logger type in .env parameter LOGGERS
