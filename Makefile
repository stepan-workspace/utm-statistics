init:
	git clone --branch 2.10.24 https://github.com/cakephp/cakephp.git app
	rm -rf app/.git

up:
	docker compose up -d --build

down:
	docker compose down

restart:
	docker compose down
	docker compose up -d --build

logs:
	docker compose logs -f

ps:
	docker compose ps
