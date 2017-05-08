# Installation

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