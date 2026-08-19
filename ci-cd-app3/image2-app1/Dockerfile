FROM akshaybase:app1-ci

USER root

ENV DEBIAN_FRONTEND=noninteractive

RUN sudo apt-get update && \
    sudo apt-get install -y \
    nginx \
    php-fpm \
    curl \
    wget \
    unzip \
    libnginx-mod-http-modsecurity \
    modsecurity-crs

# Install PageSpeed repository and module
RUN curl -fsSL https://packages.modpagespeed.com/install.sh | sh && \
    apt-get update && \
    apt-get install -y nginx-module-pagespeed

# Configure ModSecurity
RUN sudo sed -i 's/SecRuleEngine DetectionOnly/SecRuleEngine On/' /etc/nginx/modsecurity.conf && \
    echo "Include /etc/modsecurity/crs/crs-setup.conf" | sudo tee -a /etc/nginx/modsecurity.conf && \
    echo "Include /usr/share/modsecurity-crs/rules/*.conf" | sudo tee -a /etc/nginx/modsecurity.conf

# Configure PageSpeed
RUN mkdir -p /var/cache/ngx_pagespeed

RUN printf "pagespeed on;\npagespeed FileCachePath /var/cache/ngx_pagespeed;\n" \
    > /etc/nginx/conf.d/pagespeed.conf

COPY app/ /var/www/html/
COPY default.conf /etc/nginx/sites-available/default
COPY start.sh /start.sh

RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
