FROM mysql:8.0

COPY ./docker/images/mysql/db/db.sql /docker-entrypoint-initdb.d/init.sql
COPY ./docker/images/mysql/conf/my.cnf /etc/mysql/
