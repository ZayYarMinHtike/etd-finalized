Installation



1. Import database which is located in database/database-for-etd as .sql file and import it to your database.

```
cd database/database-for-etd

mysql -u <USERNAME> -p etd-finalize < etd-finalize.sql

```


2. Change the .env-example file to .env and change database credentials.

```
cp .env.example .env

# In .env file change db-username and db-pass
DB_DATABASE=etd-finalize
DB_USERNAME=user
DB_PASSWORD=pass
```
3. Install the extended package dependencies.

Install the laravel extented repositories:

```
composer install

```
Install npm for dependencies:

```
npm install

npm run dev

```

5. Generate key for laravel:

```
php artisan key:generate

```
6. Run the app:

```
php artisan serve

```
