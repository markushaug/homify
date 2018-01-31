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


## Upcoming Modules

Within the coming weeks I will make the following modules available separately in a repository.
- <a href="https://github.com/markushaug/homify-sonos">```Sonos Binding```</a>
- ```RF Binding (433 Mhz)```
- ```Hue Binding```

## Installation

1. Clone the repository
2. Navigate to the directory
3. Run ```"composer install"``` (Yes, <a href="https://getcomposer.org/">Composer</a> is required)
4. Rename the ".env.example" file to ".env" and setup your database & mail settings
5. Run ```php artisan key:generate```
6. Run ```php artisan migrate```
7. Set the webroot of your webserver to the "public" folder
<br>
I highly recommend to use nginx or lighttp. Apache2 is using too much CPU and RAM on the Raspberry PI.

## Usage

Homify's routing is fully dynamically. You can use the following URL to access your things:

- ```https://<server_ip>/<thing_name>/<channel>```

For example:
- ```https://10.10.3.1/Sonos:Play1/on``` 

## License

<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.




