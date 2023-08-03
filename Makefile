.PHONY: build composer composer-install-dev composer-install-prod composer-update down git-pull help laravel-artisan up upd upgrade

default: help

build: ## Build containers
	docker compose build

composer: ## Composer command
	docker compose run --rm php composer $(CLI_ARGS)

composer-install-dev: ## Composer install
	docker compose run --rm php composer install

composer-install-prod: ## Composer install --no-dev
	docker compose run --rm php composer install --optimize-autoloader --no-suggest --no-dev

composer-update: ## Composer update
	docker compose run --rm php composer update

down: ## Stop and remove all containers
	docker compose down --remove-orphans
	@echo "🛑 Socya is stopped and removed"

git-pull: ## Git pull and reset hard
	git reset --hard
	git pull origin

help: ## Display this help
	@echo "📝 Available commands:"
	@sed -n -e '/^##/ { s/^## //; p; }' $(MAKEFILE_LIST)

laravel-artisan: ## Laravel Artisan command (If '--' is given, all following parameters are added)
	docker compose exec php php artisan $(CLI_ARGS)

up: ## Create and start all containers
	docker compose up
	@echo "✅ Socya is up and running"

upd: ## Create and start all containers (in background)
	docker compose up -d
	@echo "✅ Socya is up and running"

upgrade: ## Upgrade containers (pull and build)
	make pull
	make build
