DOCKER_COMPOSE = docker-compose --file=containers/docker-compose.yml
EXEC_PHP       = $(DOCKER_COMPOSE) exec rentcar_php
SPARK        = $(EXEC_PHP) php spark
ENV            = dev
COMPOSER       = $(EXEC_PHP) composer
PWD            = $(shell pwd)

RED      = \033[0;31m
GREEN    = \033[0;32m
YELLOW   = \033[0;33m
BLUE     = \033[0;34m
PURPLE   = \033[0;35m
CYAN     = \033[0;36m
WHITE    = \033[0;37m
NO_COLOR = \033[m

B_GREEN  = \033[42m
B_YELLOW = \033[43m
B_BLUE   = \033[44m
B_PURPLE = \033[45m
B_CYAN   = \033[46m
B_WHITE  = \033[47m

start: ## Start the project
	@$(DOCKER_COMPOSE) up -d --remove-orphans --no-recreate

stop: ## Start the project
	@$(DOCKER_COMPOSE) stop

restart: ## Start the project
	make stop
	make start

clean:
	@$(SPARK) cache:clear
	@$(EXEC_PHP) chmod -R 777 public/upload storage

install:
	@$(EXEC_PHP) php composer install

all:
	make install
	make clean

## Run phpcs
phpcs: vendor
	@$(EXEC_PHP) vendor/bin/php-cs-fixer fix --dry-run --diff-format=udiff -v

phpcs-fix: vendor
	@echo "$(BLUE)Running php cs fixer...$(NO_COLOR)"
	@$(EXEC_PHP) ./vendor/bin/php-cs-fixer fix --config=.php_cs.php -v
phpcs-fix_chunk: vendor
ifneq ($(CHANGED_PHP_FILES_SPACE_SEPARATED),)
	@echo "$(BLUE)Running php cs fixer...$(NO_COLOR)"
	@$(EXEC_PHP) bin/php-cs-fixer fix --config=.php_cs.php -v $(CHANGED_PHP_FILES_SPACE_SEPARATED)
endif

## Get into php container interactive mode
cli:
	@$(EXEC_PHP) bash

tu:
	@$(EXEC_PHP) vendor/bin/phpunit tests
