Instruction:
1. Check if something (maybe local postgresql) running on 5432 port: ```sudo lsof -i :5432```. Kill by pid if needed.
2. ```mkdir var/logs```
3. ```mkdir var/logs/nginx``` 
4. ```docker-compose up -d --build```
5. ```docker-compose exec php-fpm bash```
6. inside php-fpm container: ```composer install```
7. inside php-fpm container: ```php bin/console doctrine:migrations:migrate```
8. open and proceed with the test application: http://localhost:8005/questionnaire