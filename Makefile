.PHONY: help setup hosts build up down logs bash migration migrate run-pipeline alerts fix-perms

COMPOSE = docker compose -f docker-compose.yml

DOMAINS = bookingapp.local mail.bookingapp.local db.bookingapp.local

RED=\033[0;31m
GREEN=\033[0;32m
YELLOW=\033[0;33m
BLUE=\033[0;34m
NO_COLOR=\033[0m

setup: ## Configure repository (git hooks, etc.)
	git config core.hooksPath .githooks
	@echo "$(GREEN)Git hooks configured -> .githooks$(NO_COLOR)"

hosts: ## Add local domains to /etc/hosts (requires sudo)
	@echo "$(YELLOW)Updating /etc/hosts...$(NO_COLOR)"
	@for domain in $(DOMAINS); do \
		if grep -qE "^127\.0\.0\.1[[:space:]]+$$domain$$" /etc/hosts; then \
			echo "$(GREEN)$$domain already present$(NO_COLOR)"; \
		else \
			echo "127.0.0.1 $$domain" | sudo tee -a /etc/hosts > /dev/null; \
			echo "$(GREEN)Added $$domain$(NO_COLOR)"; \
		fi; \
	done

help: ## Show available commands
	@echo ""
	@echo "Usage: make [target]"
	@echo "--------------------------------------------"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) \
		| awk 'BEGIN {FS = ":.*?## "}; {printf " %-28s %s\n", $$1, $$2}'
	@echo ""

build: ## Build containers
	@echo "$(YELLOW)Building containers...$(NO_COLOR)"
	$(COMPOSE) build
	@echo "$(GREEN)Containers built$(NO_COLOR)"

up: build ## Start containers
	@echo "$(YELLOW)Starting containers...$(NO_COLOR)"
	$(COMPOSE) up -d
	@echo "$(GREEN)Containers started$(NO_COLOR)"
	@echo "$(BLUE)Dashboard Traefik: http://localhost:8080${NO_COLOR}"
	@echo "$(BLUE)Application URL: https://bookingapp.local${NO_COLOR}"
	@echo "$(BLUE)Mailpit URL: https://mail.bookingapp.local${NO_COLOR}"
	@echo "$(BLUE)PhpMyAdmin URL: https://db.bookingapp.local${NO_COLOR}"

down: ## Stop containers
	@echo "$(YELLOW)Stopping containers...$(NO_COLOR)"
	$(COMPOSE) down
	@echo "$(GREEN)Containers stopped$(NO_COLOR)"

restart: down up ## Restart containers

logs: ## Show container logs
	@echo "$(YELLOW)Showing logs...$(NO_COLOR)"
	$(COMPOSE) logs -f

ps: ## List containers
	@echo "$(YELLOW)Listing containers...$(NO_COLOR)"
	$(COMPOSE) ps

bash: ## Access app container
	@echo "$(YELLOW)Accessing app container...$(NO_COLOR)"
	docker exec -it $(APP_CONTAINER) bash

migration: ## Generate a Doctrine migration from entity changes
	@echo "$(YELLOW)Generating migration...$(NO_COLOR)"
	$(COMPOSE) exec php php symfony/bin/console make:migration
	@echo "$(GREEN)Migration generated$(NO_COLOR)"

migrate: ## Run pending Doctrine migrations
	@echo "$(YELLOW)Running migrations...$(NO_COLOR)"
	$(COMPOSE) exec php php symfony/bin/console doctrine:migrations:migrate --no-interaction
	@echo "$(GREEN)Migrations completed$(NO_COLOR)"

pint: ## Run Pint in test mode
	@echo "$(YELLOW)Running Pint...$(NO_COLOR)"
	cd symfony && composer run lint
	@echo "$(GREEN)Pint completed$(NO_COLOR)"

pintf: ## Run Pint with auto-fix
	@echo "$(YELLOW)Running Pint with fixes...$(NO_COLOR)"
	cd symfony && composer run lint:fix
	@echo "$(GREEN)Pint completed$(NO_COLOR)"

stan: ## Run PHPStan
	@echo "$(YELLOW)Running PHPStan...$(NO_COLOR)"
	./symfony/vendor/bin/phpstan analyse -c symfony/phpstan.neon
	@echo "$(GREEN)PHPStan completed$(NO_COLOR)"

# ========================
# Assets
# ========================
w: ## Run TypeScript watcher
	@echo "$(YELLOW)Starting TypeScript watcher...$(NO_COLOR)"
	php symfony/bin/console typescript:build --watch

b: ## Build TypeScript assets
	@echo "$(YELLOW)Building TypeScript assets...$(NO_COLOR)"
	php symfony/bin/console typescript:build
	php symfony/bin/console asset-map:compile
	@echo "$(GREEN)Build completed$(NO_COLOR)"
