ps:
	docker-compose ps
cache:
	docker-compose exec app composer dump-autoload -o
	docker-compose exec app php artisan config:cache