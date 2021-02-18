# DevOps Project : Link Extractor

A web application to extract links and anchor texts from a given web page and analyze link statistics.

## Changes from the previous step

* The link extractor JSON API service (written in Python) is moved in a separate folder
* A web front-end application is written in PHP that talks to the JSON API
* The PHP application is mounted inside the official php:7-apache Docker image for easier modification during the development
* The web application is accessible at http://hostname:port/?url=<url-encoded-url>
* An environment variable API_ENDPOINT is used inside the PHP application to configure it to talk to the JSON API server
* There is a `Dockerfile` for the PHP web application to avoid live file mounting
* A Redis container is added for caching using the official Redis Docker image
* The API service talks to the Redis service to avoid downloading and parsing pages that were already scraped before
* A docker-compose.yml file is written to build various components and glue them together

## Try it out

```
*Pour commencer il faut tout d'abord installer docker, et kubernetes

*Ensuite lancer un conteneur Jenkins puis faire toutes les configurations nécessaires

*Il faudra toutefois installer les plugins suivant dans l'environement jenkins: Docker-compose build step, kubernetes, Kubernetes continuos-Deploy

* A l'intérieur du conteneur jenkins il faudra prendre soins d'installer au préalable, le python3, le pip3, et le docker-compose

* Pour le login dockerhub, il se peut qu'avec la nouvel version de jenkins l'on trouve des difficultés et donc il faudra installer ces deux librairies "gnupg2 et pass" dans le conteneur jenkins afin de résoudre le problème

* concernant la configuration de kubernetes sur jenkins ce lien sera utile pour le faire: https://www.youtube.com/watch?v=V4kYbHlQYHg&list=WL&index=27&ab_channel=JustmeandOpensource 

* Toujours concernant les problèmes qu'on peut rencontrer, il faudra faire le downgrade des pluglins kubernetes-credentials,kubernetes-client-api,snakeyaml-api,jackson2-api, puis installé les versions suivantes:

-snakeyaml-api v-1.26.3
-kubernetes-client-api v-4.9.2-1
-jackson2-api v-2.10.3
-kubernetes-credentials v-0.6.2

pour savoir comment faire le downgrade des plugins sur jenkins, suivre cette vidéo: https://www.youtube.com/watch?v=d6BU8LBc9Ow&ab_channel=DeekshithSN 


```
TEAM ICCN2

By:
  -Mohamed Amine AJINOU
  -Meryem AIT-AHMED BRAHIM
  -Ferdinand LANGUIE
  -Lalla BARIKALLAH
  -Siham SABRI
  -Mounia ELQADIRY

Supervised by: Mr. Driss ALLAKI
