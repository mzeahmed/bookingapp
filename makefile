.PHONY: help setup build up down logs bash migrate run-pipeline alerts fix-perms

COMPOSE = docker compose -f docker-compose.yml

RED=\033[0;31m
GREEN=\033[0;32m
YELLOW=\033[0;33m
BLUE=\033[0;34m
NO_COLOR=\033[0m

setup: ## Configure le dépôt (git hooks, etc.)
	git config core.hooksPath .githooks
	@echo "$(GREEN)Git hooks configurés → .githooks$(NO_COLOR)"

help: ## Affiche la liste des commandes disponibles
	@echo ""
	@echo "Usage: make [target]"
	@echo "--------------------------------------------"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) \
		| awk 'BEGIN {FS = ":.*?## "}; {printf " %-28s %s\n", $$1, $$2}'
	@echo ""

build: ## Build les conteneurs
	@echo "$(YELLOW)Construction des conteneurs...$(NO_COLOR)"
	$(COMPOSE) build
	@echo "$(GREEN)Conteneurs construits$(NO_COLOR)"

up: build ## Démarre les conteneurs
	@echo "$(YELLOW)Démarrage des conteneurs...$(NO_COLOR)"
	$(COMPOSE) up -d
	@echo "$(GREEN)Conteneurs démarrés$(NO_COLOR)"
	@echo "$(BLUE)Dashboard Traefik: http://localhost:8080${NO_COLOR}"
	@echo "$(BLUE)URL de l'application: https://bookingapp.local${NO_COLOR}"

down: ## Stop les conteneurs
	@echo "$(YELLOW)Arrêt des conteneurs...$(NO_COLOR)"
	$(COMPOSE) down
	@echo "$(GREEN)Conteneurs arrêtés$(NO_COLOR)"

restart: down up ## Redémarre les conteneurs

logs: ## Logs des conteneurs
	@echo "$(YELLOW)Affichage des logs...$(NO_COLOR)"
	$(COMPOSE) logs -f

ps: ## Liste les conteneurs
	@echo "$(YELLOW)Listing des conteneurs...$(NO_COLOR)"
	$(COMPOSE) ps

bash: ## Accède au container app
	@echo "$(YELLOW)Accès au container app...$(NO_COLOR)"
	docker exec -it $(APP_CONTAINER) bash

pint: ## Lance Pint en mode test
	@echo "$(YELLOW)Lancement de Pint...$(NO_COLOR)"
	cd symfony && composer run lint
	@echo "$(GREEN)Pint terminé$(NO_COLOR)"

pintf: ## Lance Pint avec correction
	@echo "$(YELLOW)Lancement de Pint avec correction...$(NO_COLOR)"
	cd symfony && composer run lint:fix
	@echo "$(GREEN)Pint terminé$(NO_COLOR)"

stan: ## Lance PHPStan
	@echo "$(YELLOW)Lancement de PHPStan...$(NO_COLOR)"
	./symfony/vendor/bin/phpstan analyse -c symfony/phpstan.neon
	@echo "$(GREEN)PHPStan terminé$(NO_COLOR)"
