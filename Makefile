default: help

build: ## Build containers
	docker compose build

composer: ## Composer command add arg="command" to run a specific command (ex: make composer arg="require laravel/ui")
	docker compose run --rm php composer $(arg)

composer-install-dev: ## Composer install dev
	docker compose run --rm php composer install

composer-install-prod: ## Composer install prod
	docker compose run --rm php composer install --optimize-autoloader --no-suggest --no-dev

composer-update: ## Composer update
	docker compose run --rm php composer update

copy-env: ## Copy .env.example to .env
	cp .env.example .env

copy-docker-compose-dev: ## Copy docker-compose.dev.yml to docker-compose.yml
	cp docker-compose.dev.yml docker-compose.yml

down: ## Stop and remove all containers
	docker compose down --remove-orphans
	@echo "🛑 Oasso are stopped and removed"

eslint: ## Run eslint
	docker compose run --rm node npm run eslint

help: ## Display this help
	@echo "📖 Oasso help"
	@echo "✍️ Usage: make [command]"
	@echo "👉 Available commands open Makefile to see all commands"

artisan: laravel-artisan ## Shortcut for laravel-artisan

laravel-artisan: ## Laravel Artisan command add arg="command" to run a specific command (ex: make laravel-artisan arg="migrate")
	docker compose exec php php artisan $(arg)

laravel-artisan-migrate: ## Laravel Artisan migrate
	docker compose run --rm php php artisan migrate

laravel-artisan-migrate-fresh: ## Laravel Artisan migrate:fresh
	docker compose run --rm php php artisan migrate:fresh

laravel-artisan-migrate-seed: ## Laravel Artisan migrate:fresh --seed
	docker compose run --rm php php artisan migrate:fresh --seed

laravel-artisan-key-generate: ## Laravel Artisan key:generate
	docker compose run --rm php php artisan key:generate

npm: ## Npm command add arg="command" to run a specific command (ex: make npm arg="install")
	docker compose run --rm node npm $(arg)

npm-install: ## Npm install
	docker compose run --rm node npm install

npm-update: ## Npm update
	docker compose run --rm node npm update

rector: ## Run Rector
	docker compose run --rm php ./vendor/bin/rector process

up: ## Create and start all containers
	docker compose up -d
	@echo "✅ Oasso is up and running"

upgrade: pull build ## Upgrade containers (pull and build)

upgrade-dev: down copy-docker-compose-dev upgrade up composer-install-dev npm-install ## Upgrade Oasso with docker-compose.dev.yml

pint: ## Run Laravel Pint
	docker compose run --rm php ./vendor/bin/pint

pull: ## Pull all containers
	docker compose pull

setup-dev: copy-docker-compose-dev copy-env upgrade composer-install-dev npm-install laravel-artisan-key-generate laravel-artisan-migrate
	@echo "✅ Oasso is installed, edit .env and you can now run 'make up' to start containers"
