# vise

A quick n' dirty URL shortener based on [Martin Angelov's code](http://tutorialzine.com/2013/12/quick-tip-create-a-simple-url-shortener-with-10-lines-of-php/).

## Installation

### Apache httpd 2.4 on Debian/Ubuntu

Install Apache httpd and PHP:

    apt install libapache2-mod-php

Clone this repository as your web root directory:

    git clone https://github.com/mentebinaria/vise.git /var/www/vise

Enable `mod_rewrite`:

    a2enmod rewrite

Create a virtual host configuration file for your new website. For example,
consider a `/etc/apache2/sites-available/vise.conf` file with the following
content:

```apache
<VirtualHost *:80>
        ServerName domain.com:80
        ServerAlias www.menteb.in
        DocumentRoot /var/www/vise

        <Directory /var/www/vise>
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

Rename [htaccess.txt](htaccess.txt) file to `.htaccess`:

    cd /var/www/vise
    mv htaccess.txt .htaccess

Rename [links.ini.sample](links.ini.sample) to `links.ini`:

    cd /var/www/vise
    mv links.ini.sample links.ini

Restart httpd:

    systemctl restart apache2

## Configuration

Edit the `admin/login.php` file and set an access code in the following line:

```php
define("ACCESS_CODE", "CHANGEME");
```

## Usage

When the app is running, navigate to `/admin` to start creating shortened links.
To modify an existing link, just recreate it. To delete a shortened link
permanently, manually remove it from `links.ini` (sorry).
