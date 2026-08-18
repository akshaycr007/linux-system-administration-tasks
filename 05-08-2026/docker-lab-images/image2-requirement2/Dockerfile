FROM ubuntu:24.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y \
    nginx \
    php-fpm \
    curl \
    wget \
    unzip \
    libnginx-mod-http-modsecurity \
    modsecurity-crs

# Configure ModSecurity
RUN sed -i 's/SecRuleEngine DetectionOnly/SecRuleEngine On/' /etc/nginx/modsecurity.conf && \
    printf '\nInclude /etc/modsecurity/crs/crs-setup.conf\n' >> /etc/nginx/modsecurity.conf && \
    printf 'Include /usr/share/modsecurity-crs/rules/*.conf\n' >> /etc/nginx/modsecurity.conf

COPY app/ /var/www/html/
COPY default.conf /etc/nginx/sites-available/default
COPY start.sh /start.sh

RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
