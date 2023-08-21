.PHONY: build composer composer-install-dev composer-install-prod composer-update down git-pull help laravel-artisan up upd upgrade

default: up ## Shortcut for up

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

down: ## Stop and remove all containers
	docker compose down --remove-orphans
	@echo "🛑 Socya is stopped and removed"

la: laravel-artisan ## Shortcut for laravel-artisan

artisan: laravel-artisan ## Shortcut for laravel-artisan

laravel-artisan: ## Laravel Artisan command add a="command" to run a specific command (ex: make laravel-artisan arg="migrate")
	docker compose exec php php artisan $(arg)

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
