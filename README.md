# TP - Sécurité des API 

## TP1 

Créer un container docker permettant d'embarquer un frontal HTTPS

https://www.grottedubarbu.fr/docker-nginx-reverse-proxy/

### Cerbot 

brew install cerbot 

### Renouvellement de certificat 

On peut mettre la tâche suivante dans un cron pour une automatisation. 

certbot renew --pre-hook "docker-compose -f path/to/docker-compose.yaml down" --post-hook "docker-compose -f path/to/docker-compose.yaml up -d"




