## About Quotation Generatore

This is a web application for generating your quotations, invoices and receipts on the fly. Copies are downloaded as PDF and a back up email is sent to your email address. 
No information is stored in the database, it is removed 24 hours after the original file has been downloaded

## Requirements to start application
Docker
docker-compose

## How to install application
-  Git clone https://github.com/josephkipkemoi/quotationGenerator.git
-  cd quotationGenerator
-  docker-compose up  
-  Open port localhost:8000

## Database
MYSQL is used as Database

MYSQL ENVIRONMENT
-   DB_CONNECTION=mysql
-   DB_HOST=db // from db service in docker-compose.yml
-   DB_PORT=3306
-   DB_DATABASE=
-   DB_USERNAME=
-   DB_PASSWORD=
