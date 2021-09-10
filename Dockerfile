FROM php:7.4-cli as mhsendmail

RUN apt-get update && apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git \
 && rm -rf /var/lib/apt/lists/*
RUN curl -Lsf 'https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz' | tar -C '/usr/local' -xvzf -
ENV PATH /usr/local/go/bin:$PATH
RUN go get github.com/mailhog/mhsendmail

FROM php:7.4-apache

RUN docker-php-ext-configure pdo_mysql && docker-php-ext-install pdo_mysql

COPY --from=mhsendmail /root/go/bin/mhsendmail /usr/bin/mhsendmail

RUN apt-get update && apt-get install -y bash \
 && rm -rf /var/lib/apt/lists/*

COPY . /var/www/html

COPY docker-entrypoint.sh /app
RUN chmod +x /app

ENTRYPOINT ["/app"]
