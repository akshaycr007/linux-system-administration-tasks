FROM debian:12-slim

RUN apt-get update && \
    apt-get install -y nginx && \
    useradd -m appuser && \
    mkdir -p /app/data && \
    echo "<h1>Welcome to My Project</h1>" > /app/data/index.html && \
    cp /app/data/index.html /var/www/html/index.html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
