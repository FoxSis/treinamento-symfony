#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

if [ "$SYMFONY_ENV" = 'prod' ]; then
    composer install --prefer-dist --no-dev --no-progress --no-suggest --optimize-autoloader --classmap-authoritative --no-interaction
    php bin/console cache:clear --env=prod --no-interaction --quiet --no-debug
# else
    # composer install --prefer-dist --optimize-autoloader --classmap-authoritative --no-interaction
    # php bin/console cache:clear --no-interaction
fi

# Permissions hack because setfacl does not work on Mac and Windows
# chown -R www-data app
# chown -R www-data public
# chown -R www-data var

exec "$@"
