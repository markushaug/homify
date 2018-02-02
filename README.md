[![Build Status](https://travis-ci.org/markushaug/homify.svg?branch=master)](https://travis-ci.org/markushaug/homify)
[![PHP7 Compatible](https://img.shields.io/badge/php-7-green.svg?style=flat-square)](https://packagist.org/packages/markushaug/homify)


## 🏡 Homify - Modular home automation platform 
Homify is an module based home automation platform with HomeKit support.

## Features
The system is built using a modular approach so support for other devices or actions can be implemented easily. See also the section on architecture and the section on creating your own components ( Coming soon on).

If you run into issues while using Homify or during development of a component, please contact me for further help and information.

## Coming soon
- WebGUI for central room management & device management
- HAP-Protocol (HomeKit) integration

## Development
I would appreciate it if you would contribute to this project.
Do not hesitate to contact me if you are interested. I can give you an introduction to the core and the main concepts of the program. (Intermediate) Laravel skills are desirable.

## Featured Plug-ins
Within the coming weeks I will make the following modules available separately in a repository.

- <a href="https://github.com/markushaug/homify-sonos">```Sonos Binding```</a>
- <a href="https://github.com/markushaug/homify-rf-outlet">```RF Binding (433 Mhz)```</a>
- ```Hue Binding```

The plug-ins can simply be installed with composer.

## Installation

1. Run ```composer create-project markushaug/homify``` (Yes, <a href="https://getcomposer.org/">Composer</a> is required)
2. Setup your database & mail settings in the ```.env``` file
4. Run ```php artisan migrate```
5. Set the webroot of your webserver to the "public" folder
<br>

### Note for Raspberry Pi users
I highly recommend to use nginx or lighttp. Apache2 is using too much CPU and RAM on the Raspberry PI.

## Usage
Homify's routing is fully dynamically. You can use the following URL to access your things:

- ```https://<server_ip>/<thing_name>/<channel>```

For example:
- ```https://10.10.3.1/Sonos:Play1/on``` 

## License

<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.




