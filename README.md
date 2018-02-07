<h1 align="center">
  Homify 🏡
  <br>
</h1>

<h4 align="center">Open-source home-automation / smarthome platform running on PHP (Laravel).</h4>

<p align="center">
  <a href="https://travis-ci.org/markushaug/homify">
    <img src="https://travis-ci.org/markushaug/homify.svg?branch=master">
  </a>
  <a href="https://www.codacy.com/app/markushaug/homify?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=markushaug/homify&amp;utm_campaign=Badge_Grade">
      <img src="https://api.codacy.com/project/badge/Grade/caf921d27ed94b68b821792bd952fb62">
  </a>
  <a href="https://packagist.org/packages/markushaug/homify">
    <img src="https://img.shields.io/badge/php-7-green.svg?style=flat">
  </a>
  <a href="https://github.com/markushaug/homify">
    <img src="http://img.shields.io/badge/source-markushaug/homify-green.svg?style=flat">
  </a>
  <a href="https://packagist.org/packages/markushaug/homify">
    <img src="https://poser.pugx.org/markushaug/homify/downloads">
  </a>
  <a href="https://packagist.org/packages/markushaug/homify">
    <img src="https://poser.pugx.org/markushaug/homify/v/stable">
  </a>
</p>

[![Dashboard](https://i.imgur.com/YwK44H2.png)](https://github.com/markushaug/homify)


## Table of content

- [About Homify](#about-homify)
- [Key Features](#key-features)
- [Featured Plug-ins](#featured-plug-ins)
- [Setup](#setup)
    - [Composer](#composer)
    - [Database](#database)
    - [Webserver](#webserver)
    - [Note for PI users](#note-for-raspberry-pi-users)
- [Rules](#rules)
    - [Features](#features)
    - [Structure](#structure)
    - [Example](#example)
- [HTTP-API](#http-api)
- [Coming Soon](#coming-soon)
- [Plug-in Development](#plug-in-development)
- [FAQ / CONTACT / TROUBLESHOOT](#faq--contact--troubleshoot)
- [Contributing](#contributing)


## ABOUT HOMIFY
Homify is built using a modular approach so support for other devices or actions can be implemented easily. See also the section on creating your own plug-in below in this READ.me.

## KEY FEATURES

* Manage your IoT-devices simply over the GUI
  - Instantly see if your device is online or not
* Automate your home with rules
* Install Plug-ins
  - Homify is built using a modular approach so support for other devices or actions can be implemented easily.
* Central Room Management
* Tablet View for your rooms

## FEATURED PLUG-INS

- <a href="https://github.com/markushaug/homify-sonos">```Sonos Plug-in```</a>
- <a href="https://github.com/markushaug/homify-rfoutlet">```RFOutlet (433 Mhz) Plug-in ```</a>

## SETUP
To install and run this application, you'll need <a href="https://getcomposer.org/">Composer</a> and PHP7 installed on your computer. 

### Composer
```bash
# Download & install Homify with its dependencies
$ composer create-project markushaug/homify
$ composer update
```

### Database
Setup your database & mail settings in the ```.env``` file and then run:

```bash
# Creating tables and inserting their default values to them
$ php artisan migrate
$ php artisan db:seed
```

### Webserver
- Set the webroot of your webserver to the ```public``` folder
- Grant permissions to the homify folder. 
  - If the application runs into an issue, try this command inside of the homify directory: ```chmod -R 777 storage```.

### Note for Raspberry Pi users
I highly recommend to use nginx or lighttp. Apache2 is using too much CPU and RAM on the Raspberry PI.


## RULES
Homify supports rules to automate your home. You can create an rule via Homifys web interface.

### Features
- Define multiple rules for one thing.<br>
  Each rule expands the entire rule base of the respective item with a logical OR.<br>
  ```IF <RULE1> === TRUE || <RULE2> === TRUE || ...```<br>
- The ```ThingController``` calls the RuleParser every time an event is triggered and scans for defined rules in the rule base.
- Time-controlled events are constructed as a cron job that triggers the execution block.

### Structure
Each Rule has the following structure:
```
{
	"rule": "rule name (unique)",
	"if": {
        /*<TRIGGER CONDITION>*/
	},
	"then": {
        /*
        <EXECUTION_BLOCK1> and
        <EXECUTION_BLOCK2>
        */
	}
}
```
### Example
Below is an example of a rule with a time-controlled event wich triggers an channel of the defined thing.
```json
{
	"rule": "goodEvening",
	"if": {
		"time": "20:00:00"
	},
	"then": {
		"thing": {
			"name": "Play1",
			"channel": "off"
		}
	}
}
```

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

## PLUG-IN DEVELOPMENT
Ech Plug-in inherits from an Thing-Type (```Light```, ```Switcher```, ```Speaker```, etc.). Each Thing-Type inherits from the abstract thing class. So each thing has the required functions.

If you are creating an plug-in for homify, you have to inherit from an Thing-Type. Or you create an additional thing-type.
Each Thing needs an ```<Thing>.php```, ```Create<Thing>.php``` and an ```Update<Thing>.php``` File. You can take on of the existing Plug-ins as template.

![ThingClass](https://i.imgur.com/2E75QX0.png)

## FAQ / CONTACT / TROUBLESHOOT
If you run into issues while using Homify or during development of a component, please use one of the following options:

- Use github's issue reporter on the right, so that other people can search these issues too
- Send me an email <a href="mailto:mh@haugmarkus.de">mh@haugmarkus.de</a> (might take a few days)

## CONTRIBUTING
I would appreciate it if you would contribute to this project.
Do not hesitate to contact me if you are interested. I can give you an introduction to the core and the main concepts of the program. (Intermediate) Laravel skills are desirable.

---

> Homepage [haugmarkus.de](https://www.haugmarkus.de) &nbsp;&middot;&nbsp;
> GitHub [@markushaug](https://github.com/markushaug) &nbsp;&middot;&nbsp;
> Twitter [@_markushaug_](https://twitter.com/_markushaug_)

