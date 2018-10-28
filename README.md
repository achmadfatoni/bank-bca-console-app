# Bank BCA Console App
Console App for klikbca.com

## Installation
Composer install to install the dependency
```bash
composer install
```
## Set .env
Create **.env** by copying **.env.example** and rename to **.env**
```bash
cp .env.example .env
```

 edit **.env** and set username and password with your klikbca account
```php
USERNAME=yourklikbcausername
PASSWORD=yourklikbcapassword
```

## Available commands:

Command | Description | Parameters
--------- | ---------- | ------- 
cek-saldo | Cek saldo rekening | -
mutasi | Cek mutasi rekening | -f [from], -t [to]
mutasi | Cek mutasi rekening | -
list | Print available commands | -

## Usage  
```bash
php bca [command] [parameter]
```

cek saldo example:
```bash
php bca cek-saldo
```
mutasi rekening (default : today) example:
```bash
php bca mutasi
```

mutasi rekening (with param from and to date) example:
```bash
php bca mutasi -f 2018-10-01 -t 2018-10-28
```