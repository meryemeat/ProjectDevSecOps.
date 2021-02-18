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
$ docker-compose up --build
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
