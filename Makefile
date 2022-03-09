.DEFAULT_GOAL := list
args = `echo "$(filter-out $@,$(MAKECMDGOALS))"`

install:
	@docker-compose exec php composer install
	@docker-compose exec php yarn install

watch:
	@docker-compose exec php yarn watch

start:
	@docker-compose up -d
	@echo "Server running at http://localhost:8080/"
	@sleep 1 && open "http://localhost:8080/"

build:
	@docker-compose build --no-cache

stop:
	@docker-compose stop

restart:
	@docker-compose stop
	@docker-compose up -d

down:
	@docker-compose down

run:
	@echo "Running : php bin/console $(args)"
	@docker-compose exec php bin/console $(args)

entity:
	@docker-compose exec php bin/console make:entity

controller:
	@docker-compose exec php bin/console make:controller

crud:
	@docker-compose exec php bin/console make:crud

ddd:
	@docker-compose exec php bin/console doctrine:d:d --force

ddc:
	@docker-compose exec php bin/console doctrine:d:c

dsu:
	@docker-compose exec php bin/console doctrine:schema:update --force

cache-clear:
	@docker-compose exec php bin/console cache:clear