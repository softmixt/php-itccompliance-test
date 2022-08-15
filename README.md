# Getting Started with The Project

# NOTE:
* Running app can be found by checking [http://testapp-env.eba-jx2k3eg9.eu-central-1.elasticbeanstalk.com/products](http://testapp-env.eba-jx2k3eg9.eu-central-1.elasticbeanstalk.com/products) link to view it in the browser.
* For templating I'm using a third party library called  [Twig](https://twig.symfony.com/).
* Didn't had time to add full Test coverage.

### Since usage of any known framework was not allowed I've taken the chance to build a minimalistic one my self.

## Installation: 
* run `composer install`
* point server to `Public` folder
* if `NGINX` server used:

```bach
location / {
    try_files $uri $uri/ /index.php$is_args$args;
}
```
* if `APACHE` server used create a `.htaccess` file inside Public with the following content:
```bach
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.+)$ index.php [QSA,L]
```