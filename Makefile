default: help

build: ## Build containers
	docker compose build

c: composer ## Shortcut for composer

ci: composer-install ## Shortcut for composer-install

cu: composer-update ## Shortcut for composer-update

composer: ## Composer command add a="command" to run a specific command (ex: make composer arg="require laravel/ui")
	docker compose run --rm php composer $(arg)

composer-install: ## Composer install
	docker compose run --rm php composer install

composer-install-no-dev: ## Composer install --no-dev
	docker compose run --rm php composer install --optimize-autoloader --no-suggest --no-dev

composer-update: ## Composer update
	docker compose run --rm php composer update

copy-env: ## Copy .env.example to .env
	cp .env.example .env

copy-docker-compose-dev: ## Copy docker-compose.dev.yml to docker-compose.yml
	cp docker-compose.dev.yml docker-compose.yml

down: ## Stop and remove all containers
	docker compose down --remove-orphans
	@echo "🛑 Containers are stopped and removed"

help: ## Display this help
	@echo "📖 Socya help"
	@echo "✍️ Usage: make [command]"
	@echo "👉 Available commands open Makefile to see all commands"

la: laravel-artisan ## Shortcut for laravel-artisan

artisan: laravel-artisan ## Shortcut for laravel-artisan

laravel-artisan: ## Laravel Artisan command add a="command" to run a specific command (ex: make laravel-artisan arg="migrate")
	docker compose exec php php artisan $(arg)

laravel-artisan-migrate: ## Laravel Artisan migrate
	docker compose run --rm php php artisan migrate

laravel-artisan-key-generate: ## Laravel Artisan key:generate
	docker compose run --rm php php artisan key:generate

npm: ## Npm command add a="command" to run a specific command (ex: make npm arg="install")
	docker compose run --rm node npm $(arg)

npm-install: ## Npm install
	docker compose run --rm node npm install

npm-update: ## Npm update
	docker compose run --rm node npm update

up: ## Create and start all containers
	docker compose up
	@echo "✅ Socya is up and running"

upd: ## Create and start all containers (in background)
	docker compose up -d
	@echo "✅ Socya is up and running"

upgrade: pull build ## Upgrade containers (pull and build)

pull: ## Pull all containers
	docker compose pull

setup-dev: copy-docker-compose-dev copy-env upgrade composer-install npm-install laravel-artisan-key-generate laravel-artisan-migrate
	@echo "✅ Socya is installed, edit .env and you can now run 'make up' to start the containers"
