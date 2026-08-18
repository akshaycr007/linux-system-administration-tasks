FROM akshayimage:app1-fixed

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y \
    php-pgsql \
    postgresql-client

COPY app/ /var/www/html/

EXPOSE 80

CMD ["/start.sh"]
