<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

### Description
This Mail Realy API functions to send email from 3rd parties using the Rest API. if you are faced with a server environment that only allows communication via the Rest API, then this project was created to be able to serve email delivery by receiving data sent by 3rd parties via the Rest API.

### SMTP Server
1. You Can Use Ex: mailjet.com

### Install
1. To use it just clone the repo and `composer install`.
2. Set the database connection '.env' file 
3. set the mail SMTP connection '.env' file
4. run `php artisan migrate`
5. run `php artisan db:seed`

### Add a new Resource
Install Bower Component. Goto `Public` Document
```bash
## install with bower
bower install admin-lte
```

### Configiration
1. Login admin Panel
<br><img src="https://i.ibb.co/kD3B3sw/login.png" alt="License">

```bash
user : root@x.local
pass : password
```
2. first, you have to add api token on admin page
<br><img src="https://i.ibb.co/Y2sFmm6/token.png" alt="License">

```bash
http://localhost/mail_relay/public/tokens

```
### API Documentation
<b>POST Send</b>
```bash
{{base_url}}/api/service/mail/send
```
<b>Authorization</b> Bearer Token

<b>Token</b> `<token>`

<b>Body</b> form-data

<b>APP_NAME</b> Aplication Name

<b>MAIL_TO</b> example@sampel.com

<b>SUBJECT</b> Information

<b>BODY</b> `<b> Data Body Mail </b>`

### Docker Envinronment
Comming Soon

