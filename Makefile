include .env
export

init:
	git clone --branch 2.10.24 https://github.com/cakephp/cakephp.git $(APP_DIR)
	git clone https://github.com/CakeDC/migrations.git $(APP_DIR)/app/Plugin/Migrations
	rm -rf $(APP_DIR)/.git
	rm -rf $(APP_DIR)/app/Plugin/Migrations/.git

up:
	docker compose up -d --build

down:
	docker compose down

restart:
	docker compose down
	docker compose up -d --build

db-create:
	docker exec -it cakephp_postgres psql -U $(DB_USER) -d postgres -c "CREATE DATABASE $(DB_NAME);"

cake:
	docker exec -it cakephp_app app/Console/cake

migration-create:
	docker exec -it cakephp_app app/Console/cake Migrations.migration generate

migration-run:
	docker exec -it cakephp_app app/Console/cake Migrations.migration run
