# WiP RaspberryPi Kiosk Slideshow
Use a RaspberryPi to show a full-screen Slideshow (Kiosk-mode)


## Installation TL;DR
Use Raspbian, don't use midori
```bash
sudo apt-get update
sudo apt-get upgrade
sudo apt-get dist-upgrade
sudo apt-get install git vim ntpdate chromium-browser apache2 php libapache2-mod-php -y

git clone git@github.com:timluedtke/raspberryPiKioskSlideshow.git
cd raspberryPiKioskSlideshow
mv -r ./system/lxde-pi_autostart /home/pi/.config/lxsession/LXDE-pi/autostart

```

## Prepare your RaspberryPi
### Basic Setup
For basic RaspberryPi setup you can use most of the available guides or this on:
https://gist.github.com/blackjid/dfde6bedef148253f987

### APK packages needed
RaspberryPi Kiosk Slideshow needs:
- apache Server with PHP module (guide: https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md)
- chromium-browser
- ntpdate (sudo apt-get install ntpdate)

### HDMI Mode
You may need to set the HDMI Mode on the raspi to ensure the hdmi resolution matches your screen exactly. Here is the official documentation:
https://www.raspberrypi.org/documentation/configuration/config-txt/video.md

However I used this one:

(2,82) = 1920x1080	60Hz	1080p

### Autostart Slideshow on bootup
To autostart this slideshow directly after bootup there is a precomiled file in this repo: 
/system/lxde-pi_autostart

```bash
mv -r ./system/lxde-pi_autostart /home/pi/.config/lxsession/LXDE-pi/autostart
```

Guide: http://www.raspberrypi-spy.co.uk/2014/05/how-to-autostart-apps-in-rasbian-lxde-desktop/


https://gist.github.com/blackjid/dfde6bedef148253f987

## Prepare your Slideshow

