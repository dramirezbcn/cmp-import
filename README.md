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
2. Copy the patch file into the directory

3. Appplying the patch
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
4. Copy /etc/development/docker-compose.yml.dist to project root removing .dist extension.
```
cp etc/development/docker-compose.yml.dist docker-compose.yml
```
5. Start containers using: 
```
docker-compose up -d --build
```
6. Check containers
```
docker ps
```
7. Access to php-fpm:
```
docker exec -it app_dev_fpm bash
```
8. Install dependencies (inside fpm):
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
Observations
-----
- I implemented the strategy pattern to solve which parser apply to each different source.
- The DummyVideoRepository doesn't persist anything, just echo the information.
- About tests: 
    * Unit test: VideoTest
    * Functional test using Mocks: VideoCommandTest
    * Functional test using DI: ParserCommandTest, ImportCommandTest
    * Kind of Integration test as it's testing the console command: ImportConsoleCommandTest
- If I would have more time I would like to add:
    * Fixtures for testing
    * Persistence
