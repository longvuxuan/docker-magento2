# Docker Magento 2

Setup a docker for Magento 2 with Nginx, PHP-FPM, Mysql, phpmyadmin, Redis, Rabbitmq, Maihog

## Installation
1. You have to install [`mkcert`](https://github.com/FiloSottile/mkcert) on your local first.

2. Create a `src` folder in the root folder which will contain the source code.
```bash
mkdir src
```

3. Copy the `.sql` or `.sql.gz` database file into the `docker/mysql/init-db` folder.

4. Rename the database file in volumes of the `db` container in the `compose.yml` file.

For example:
```bash
- ./docker/mysql/init-db/<your-db-name>.sql.gz:/docker-entrypoint-initdb.d/<your-db-name>.sql.gz
```

## Usage

```
docker compose run -d
```
