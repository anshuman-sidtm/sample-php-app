FROM ubuntu:16.04
# Install dependencies
RUN apt-get update -y
RUN apt-get install -y apache2
RUN apt-get install -y php

# Pull code from CodeCommitt
RUN cp /. /var/www/html


# Configure apache
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

EXPOSE 80

CMD ["/usr/sbin/apache2", "-D",  "FOREGROUND"]
