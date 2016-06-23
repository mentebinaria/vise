# vise
A quick n' dirty URL shortener used in http://menteb.in

No, there are no nice features here. Just a stupid URL shortener PHP script that needs
manual input in an pure text INI file.

Original idea: [Martin Angelov](http://tutorialzine.com/2013/12/quick-tip-create-a-simple-url-shortener-with-10-lines-of-php/)

## Installation and usage

* Copy everyting to your web root directory and enalbe mod_rewrite (Apache httpd)
* Rename [htaccess.txt](htaccess.txt) file to .htaccess
* Modify [links.ini.sample](links.ini.sample) file and add your short links there!
* Rename [links.ini.sample](links.ini.sample) file to links.ini and enjoy!
