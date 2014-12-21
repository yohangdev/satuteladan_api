# SatuTeladan API

[![Build Status](https://travis-ci.org/yohang88/satuteladan_api.svg?branch=master)](https://travis-ci.org/yohang88/satuteladan_api)

Adalah Backend System untuk aplikasi pengelola database alumni SMA Negeri 1 Teladan Yogyakarta. Sistem sebelumnya pernah digunakan pada tahun 2007-2012 dan beralamat di http://alumni.sman1yogya.sch.id

Prinsip Pengelolaan:
- Crowd Sourcing
- Transparansi
- Privacy Control

## Contribution: Frontend Development
Akan segera dibuat dokumentasi cara menggunakan API ini.

## Contribution: API Development

### Setup Vagrant Box
```bash
$ vagrant up
```

### Setup Local DNS
Edit `/etc/hosts` or Windows Hosts file, add line:
```bash
192.168.22.10 api.satuteladan.dev
```

### Setup PostgreSQL
Create Database
```bash
# SSH into vagrant box
$ vagrant ssh

# Create new database via user user "postgres"
# and assign it to user "root"
$ sudo -u postgres /usr/bin/createdb --echo --owner=root satuteladan_api
```

Create Schema
```bash
$ vagrant ssh
$ sudo -u root psql -d satuteladan_api
```
```sql
satuteladan_api => CREATE SCHEMA "api1"; # Create Schema
satuteladan_api => \q # Quit
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

Run Migration &amp; Seeder
```bash
$ vagrant ssh
$ cd /vagrant
$ php artisan migrate
$ php artisan db:seed
```

### Test Connection
Command
```bash
$ curl -X POST -H "Accept: application/vnd.satuteladan.v1+json" -F "grant_type=client_credentials" -F "client_id=myapp" -F "client_secret=myapp" http://api.satuteladan.dev/oauth/access_token
```

Response
```json

{"access_token":"ofdojZ7Y7sKbuckVhTr9eNiiq066iPrA1ukFl3Yi","token_type":"Bearer","expires_in":3600}
```
