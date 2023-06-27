echo "
cd /var/www/html/pdlprofit.com && composer install --ignore-platform-reqs
" | docker-compose run --rm -T php bash
