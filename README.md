# vise
A quick n' dirty URL shortener used in http://menteb.in

No, there are no nice features here. Just a stupid URL shortener PHP script that needs
manual input in an pure text INI file.

Original code: [Martin Angelov](http://tutorialzine.com/2013/12/quick-tip-create-a-simple-url-shortener-with-10-lines-of-php/)

## Installation and usage

* Copy everyting to your web root directory and enable mod_rewrite (Apache httpd)
* Rename [htaccess.txt](htaccess.txt) file to .htaccess
* Create a copy of [links.ini.sample](links.ini.sample) file called links.ini.
* Modify links.ini to add your short links there!
