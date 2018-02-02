[![Build Status](https://travis-ci.org/markushaug/homify.svg?branch=master)](https://travis-ci.org/markushaug/homify)
[![PHP7 Compatible](https://img.shields.io/badge/php-7-green.svg?style=flat-square)](https://packagist.org/packages/markushaug/homify)


## Homify - Modular home automation

Homify is an module based home automation system with HomeKit &amp; Alexa support.
The basic edition only supports the ```Exec-Binding```. 

## Features

- Create or Use Modules to add Things & Bindings to your system
- Create Devices and define channels (On, Off, Pause, Next, ....)

## Coming soon

- WebGUI for central room management
- Autogeneration of HomeBridge config files
- Lightweighter backend

## Development
I would appreciate it if you would contribute to this project.
Do not hesitate to contact me if you are interested. I can give you an introduction to the core and the main concepts of the program. (Intermediate) Laravel skills are desirable.

## Upcoming Modules

Within the coming weeks I will make the following modules available separately in a repository.
- <a href="https://github.com/markushaug/homify-sonos">```Sonos Binding```</a>
- ```RF Binding (433 Mhz)```
- ```Hue Binding```

The modules can be installed with composer.

## Installation

1. Run ```composer create-project markushaug/homify``` (Yes, <a href="https://getcomposer.org/">Composer</a> is required)
2. Rename the ".env.example" file to ".env" and setup your database & mail settings
3. Run ```php artisan key:generate```
4. Run ```php artisan migrate```
5. Set the webroot of your webserver to the "public" folder
<br>
I highly recommend to use nginx or lighttp. Apache2 is using too much CPU and RAM on the Raspberry PI.

## Usage

Homify's routing is fully dynamically. You can use the following URL to access your things:

- ```https://<server_ip>/<thing_name>/<channel>```

For example:
- ```https://10.10.3.1/Sonos:Play1/on``` 

## License

<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.




