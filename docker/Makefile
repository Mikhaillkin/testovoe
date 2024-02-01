#-----------------------------------------------------------
# Variables
#-----------------------------------------------------------
-include .env
export USER_ID=$(shell id -u)
export GROUP_ID=$(shell id -g)
export DEFAULT_USER="1000";
export DEFAULT_GROUP="1000";
export PROJECT_NAMESPACE=test
export DEPLOY_TAG=test

export
#-----------------------------------------------------------
# Basic Commands
#-----------------------------------------------------------

up:
	docker-compose -p $(PROJECT_PREFIX) up -d;

down:
	docker-compose -p $(PROJECT_PREFIX) down;

fulldown:
	docker-compose -p $(PROJECT_PREFIX) down --rmi local

build:
	docker-compose build;

#-----------------------------------------------------------
# CI build and up commands
#-----------------------------------------------------------

production-build-nginx:
	docker build -t $(PROJECT_NAMESPACE)/nginx:$(DEPLOY_TAG) -f ./production/containers/nginx/Dockerfile ./../;

production-build-php:
	docker build -t $(PROJECT_NAMESPACE)/php:$(DEPLOY_TAG) -f ./production/containers/php/Dockerfile ./../;
production-php:
	docker exec -u www-data -it php bash
production-up:
	docker-compose -f production/docker-compose.yml up -d
production-down:
	docker-compose -f production/docker-compose.yml down

#-----------------------------------------------------------
# Initial installation
#-----------------------------------------------------------

init: build up laravel-env laravel-composer-install laravel-key laravel-migrate

init_env:
	test -e "./.env" || { cp ./.env.example ./.env; };

#-----------------------------------------------------------
# Laravel Commands
#-----------------------------------------------------------

php:
	docker exec -u www-data -it $(PROJECT_PREFIX)_php bash

laravel-env:
	cp ./../.env.example ./../.env

laravel-composer-install:
	docker exec -u www-data -it $(PROJECT_PREFIX)_php composer install

laravel-key:
	docker exec -u www-data -it $(PROJECT_PREFIX)_php php artisan key:generate

laravel-migrate:
	docker exec -u www-data -it $(PROJECT_PREFIX)_php php artisan migrate --seed

#-----------------------------------------------------------
# Vuejs Commands
#-----------------------------------------------------------

node:
	docker-compose exec client su node -c "cd /var/www/client/; /bin/sh -l"

vue-env:
	test -e "./../src/client/.env" || { cp ./../src/client/.env.example ./../src/client/.env; };

vue-build:
	docker-compose exec client su node -c "cd /var/www/client/; yarn; yarn build"

vue-dev:
	docker-compose exec client su node -c "cd /var/www/client/; yarn; yarn dev --port 3000 --host"
