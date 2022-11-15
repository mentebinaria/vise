# vise

A quick n' dirty URL shortener used by https://menteb.in.

No, there are no nice features here. It's just a URL shortener that requires you to manually edit a `links.ini` file.

Heavily based on by [Martin Angelov's code](http://tutorialzine.com/2013/12/quick-tip-create-a-simple-url-shortener-with-10-lines-of-php/).

## Installation

### Apache httpd 2.4 on Debian/Ubuntu

Install Apache httpd and PHP

    apt install libapache2-mod-php

Clone this repository as your web root directory:

    git clone https://github.com/mentebinaria/vise.git /var/www/vise

Enable `mod_rewrite`:

    a2enmod rewrite

Create a virtual host configuration file for your new website. For example, consider a `/etc/apache2/sites-available/vise.conf` file with the following content:

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

Restart httpd

    systemctl restart apache2

### Other OSes

Other operating systems and Linux flavors combination should work. If you have instructions for them, please submit a PR.

## Usage

Just add entries to `links.ini` file, one per line. You don't need to restart the webserver for new entries to take effect.
