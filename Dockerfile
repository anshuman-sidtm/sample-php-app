FROM ubuntu:16.04
# Install dependencies
RUN apt-get update -y
RUN apt-get install -y apache2
RUN apt-get install -y php

# Pull code from CodeCommitt
copy index.php /var/www/html
copy css/. /var/www/html
copy images/. /var/www/html


# Configure apache
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

EXPOSE 80

CMD ["/usr/sbin/apache2", "-D",  "FOREGROUND"]
