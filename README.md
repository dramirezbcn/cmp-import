CMP Import
====================

Command line script to import the videos from the actual sources:
1. Flub
2. Glorf

Prerequisites
-----

- [Docker](https://docs.docker.com/engine/installation/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

Usage
-----

1. Clone the Project.
```
git clone git@github.com:dramirezbcn/cmp-import.git
```
2. Appplying the patch
    * To take a look at what changes are in the patch 
    ```
    git apply --stat first_version.patch
    ```
    * To test the patch before you actually apply it
    ```
    git apply --check first_version.patch
    ```
    * To apply the patch
    ```
    git am --signoff < first_version.patch
    ```
3. Copy /etc/development/docker-compose.yml.dist to project root removing .dist extension.
```
cp etc/development/docker-compose.yml.dist docker-compose.yml
```
4. Start containers using: 
```
docker-compose up -d --build
```
5. Check containers
```
docker ps
```
6. Access to php-fpm:
```
docker exec -it app_dev_fpm bash
```
7. Install dependencies (inside fpm):
```
composer install
```

Troubleshooting
-----
- /var/cache denied permission
```
sudo chown -R xxxx:xxxx  ~/Proyectos/cmp-import/var/cache/
```

Symfony Commands
-----
- Import Flub
```
php7.0 bin/console import flub
```
- Import Glorf
```
php7.0 bin/console import glorf
```

Running Tests
-----
```
php7.0 /app/vendor/phpunit/phpunit/phpunit --configuration /app/phpunit.xml.dist /app/tests
```
