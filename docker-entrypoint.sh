#!/bin/bash

echo "Configuring PHP..."
source /usr/local/bin/docker-php-entrypoint
echo " "

echo "Configuring Mailing..."
echo 'sendmail_path = /usr/bin/mhsendmail --smtp-addr mailhog:1025' > /usr/local/etc/php/conf.d/sendmail.ini
cat /usr/local/etc/php/conf.d/sendmail.ini
echo " "

echo "Configuring Apache..."
cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
echo " "

echo "Starting Webserver..."
apache2-foreground