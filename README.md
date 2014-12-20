
## Local Development Config

### Setup Vagrant Box
```
$ vagrant up
```

### Setup Laravel Environment
Create file local config `.env.local.php` 
```php
<?php
return array(

    'APP_DEBUG'               => true,

    'DATABASE_PGSQL_DATABASE' => 'satuteladan_api',
    'DATABASE_PGSQL_USERNAME' => 'root',
    'DATABASE_PGSQL_PASSWORD' => 'root',
    'DATABASE_PGSQL_SCHEMA'   => 'api1',
);
```

### Setup PostgreSQL
```
# SSH into vagrant box
$ vagrant ssh

# Create new database via user user "postgres"
# and assign it to user "root"
$ sudo -u postgres /usr/bin/createdb --echo --owner=root satuteladan_api

$ sudo -u root psql -d satuteladan_api
PSQL satuteladan_api => CREATE SCHEMA "api1";
PSQL satuteladan_api => \q
```
