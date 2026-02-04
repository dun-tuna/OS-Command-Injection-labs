FROM php:7.4-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    iputils-ping \
    curl \
    bash \
    && rm -rf /var/lib/apt/lists/*

RUN ln -sf /bin/bash /bin/sh

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]