# Bank BCA Console App
Console App for klikbca.com

> Cek saldo rekening
![cek-saldo](https://user-images.githubusercontent.com/5858756/47617722-adf61700-dafc-11e8-867b-92e9f6592488.gif)

> List mutasi rekening
![mutasi](https://user-images.githubusercontent.com/5858756/47617707-856e1d00-dafc-11e8-9154-e45c3d83317b.gif)


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

Command format
```bash
php bca [command] [parameter]
```

Command | Description | Parameters
--------- | ---------- | ------- 
cek-saldo | Cek saldo rekening | -
mutasi | Cek mutasi rekening | -f [from], -t [to]
list | Print available commands | -

## Usage  
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