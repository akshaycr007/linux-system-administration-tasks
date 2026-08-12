step1 
nano docker-compose.yml

step2
sudo docker compose up -d 

VERIFICATION

step3 
docker ps -a 

step4 
check container 

sudo docker exec -it base-test bash

whoami
id
pwd

step5
container running 

sudo docker ps | grep requirement2

step6 
open php page 

curl http://localhost:9090/phpinfo.php

step7 
verify modesecurity

sudo docker logs requirement2-test | grep ModSecurity

step8
verify pagespeed
sudo docker exec -it requirement2-test nginx -T 2>/dev/null | grep pagespeed

step10
check mode security is enabled 
sudo docker exec -it requirement2-test grep SecRuleEngine /etc/nginx/modsecurity.confsudo docker exec -it requirement2-test grep SecRuleEngine /etc/nginx/modsecurity.confsudo docker exec -it requirement2-test grep SecRuleEngine /etc/nginx/modsecurity.conf


step11
test attack pattern (modesecurity)
curl "http://localhost:9090/?test=<script>alert(1)</script>"

step12 
check modesecurity logs 
sudo docker logs requirement2-test

step13 
check nginx configuration 
sudo docker exec -it requirement2-test nginx -T | grep modsecurity

step14 
check page speed cache 
curl http://localhost:9090/phpinfo.php > /dev/null

step15 
check the cache directory 
sudo docker exec -it requirement2-test ls -lah /var/cache/ngx_pagespeed

step16
container running 
sudo docker ps | grep requirement3

step17 
verify port maping 
sudo docker port requirement3-test 

step18 
verify application status
curl http://localhost:7071

step19 
container running 
sudo docker ps | grep requirement4

step20 
verify postgresql container
sudo docker exec -it requirement4-test php -m | grep pgsql

step21 
verify postgresql container 
sudo docker ps | grep postgres

step22
verify database connection 
sudo docker ps | grep postgres
\dt
SELECT * FROM users;

step23
sudo docker compose ps -a 



