.DEFAULT_GOAL := start
.PHONY: start up stop connect cache test

PROJECT_NAME=rpg-app-php

start:
	@docker compose down && docker compose up --build -d

up:
	@docker compose up

stop:
	@docker compose down

connect:
	@if [ -z "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		docker compose down && \
		docker compose up --build -d; \
	fi
	docker exec -it $(PROJECT_NAME) bash

watch:
	# Check if docker is up? Else throw an error
	@if [ -z "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		echo "The project is not up!"; \
	fi

	@if [ -n "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		docker exec -it $(PROJECT_NAME) bin/console tailwind:build -w; \
	fi

cache:
	# Check if docker is up? Else throw an error
	@if [ -z "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		echo "The project is not up!"; \
	fi

	@if [ -n "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		docker exec -it $(PROJECT_NAME) bin/console c:c; \
	fi

test:
	@if [ -z "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		docker compose up --build -d; \
	fi
	docker exec -it $(PROJECT_NAME) vendor/bin/phpunit;

behat:
	@if [ -z "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		docker compose up --build -d; \
	fi
	docker exec -it $(PROJECT_NAME) bin/acceptance.sh;

phpstan:
	@if [ -z "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		docker compose up --build -d; \
	fi
	docker exec -it $(PROJECT_NAME) vendor/bin/phpstan;

cs-check:
	@if [ -z "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		docker compose up --build -d; \
	fi
	docker exec -it $(PROJECT_NAME) vendor/bin/php-cs-fixer check;

cs-fix:
	@if [ -z "$$(docker compose ps -q $(PROJECT_NAME))" ]; then \
		docker compose up --build -d; \
	fi
	docker exec -it $(PROJECT_NAME) vendor/bin/php-cs-fixer fix;
