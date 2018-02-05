[![Build Status](https://travis-ci.org/markushaug/homify.svg?branch=master)](https://travis-ci.org/markushaug/homify)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/caf921d27ed94b68b821792bd952fb62)](https://www.codacy.com/app/markushaug/homify?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=markushaug/homify&amp;utm_campaign=Badge_Grade)
[![PHP7 Compatible](https://img.shields.io/badge/php-7-green.svg?style=flat-square)](https://packagist.org/packages/markushaug/homify)
[![Source](http://img.shields.io/badge/source-markushaug/homify-green.svg?style=flat-square)](https://github.com/markushaug/homify)


# Homify 🏡
Homify is an module based home-automation platform written in PHP (Laravel).

## DASHBOARD
<img src="https://github.com/markushaug/homify/blob/master/Dashboard.png">

## ABOUT HOMIFY
Homify is built using a modular approach so support for other devices or actions can be implemented easily. See also the section on architecture and the section on creating your own components ( Coming soon on my website ).

## FEATURED PLUG-INS

- <a href="https://github.com/markushaug/homify-sonos">```Sonos Plug-in```</a>
- <a href="https://github.com/markushaug/homify-rfoutlet">```RFOutlet (433 Mhz) Plug-in ```</a>

## SETUP

1. Run ```composer create-project markushaug/homify``` (Yes, <a href="https://getcomposer.org/">Composer</a> is required)
2. Setup your database & mail settings in the ```.env``` file
4. Run ```php artisan migrate```
5. Run ```php artisan db:seed```
6. Set the webroot of your webserver to the ```public``` folder
<br>

### Note for Raspberry Pi users
I highly recommend to use nginx or lighttp. Apache2 is using too much CPU and RAM on the Raspberry PI.

## HTTP-API
Homify provides an http-api to acces your things.
You can use the following HTTP-GET Request to access your things:

- ```https://<server_ip>/thing/<thing_name>/<channel>```

For example:
- ```https://10.10.3.1/thing/Sonos:Play1/on``` 

## COMING SOON
- WebGUI for central room management & device management
- Tablet View for single rooms
- HAP-Protocol (HomeKit) integration

## FAQ / CONTACT / TROUBLESHOOT
If you run into issues while using Homify or during development of a component, please use one of the following options:

- Use github's issue reporter on the right, so that other people can search these issues too
- Send me an email <a href="mailto:mh@haugmarkus.de">mh@haugmarkus.de</a> (might take a few days)

## CONTRIBUTING
I would appreciate it if you would contribute to this project.
Do not hesitate to contact me if you are interested. I can give you an introduction to the core and the main concepts of the program. (Intermediate) Laravel skills are desirable.

## LICENSE
<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.




