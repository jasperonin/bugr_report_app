#!/bin/bash 

DATABASE="bug_report"
USER="root"
PASSWORD="root"
HOST="localhost"

docker exec -i $(docker-compose ps -q db) mysql -u $USER -p $PASSWORD -h $HOST $DATABASE < migration1.sql