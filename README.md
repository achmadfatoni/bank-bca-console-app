# Bank BCA Console App
Console App for klikbca.com

> Cek saldo rekening

![cek-saldo](https://user-images.githubusercontent.com/5858756/47617911-468d9680-daff-11e8-8420-6407f7cec682.gif)

> List mutasi rekening

![mutasi](https://user-images.githubusercontent.com/5858756/47617918-5b6a2a00-daff-11e8-968b-3b210222e259.gif)

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