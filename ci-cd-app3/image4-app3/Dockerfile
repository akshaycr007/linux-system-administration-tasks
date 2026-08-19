FROM akshayimage:app2-ci

USER root

ENV DEBIAN_FRONTEND=noninteractive

RUN sudo apt-get update && \
    sudo apt-get install -y \
    php-pgsql \
    postgresql-client

COPY app/ /var/www/html/

EXPOSE 80

CMD ["/start.sh"]
