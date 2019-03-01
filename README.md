# RaspberryPi Kiosk Slideshow
Use a RaspberryPi to show a full-screen Slideshow (Kiosk-mode)


## Installation TL;DR
Use Raspbian and chromium, don't use midori
```bash
sudo apt-get update
sudo apt-get upgrade
sudo apt-get dist-upgrade
sudo apt-get install git vim ntpdate chromium-browser apache2 php libapache2-mod-php -y

git clone git@github.com:timluedtke/raspberryPiKioskSlideshow.git
cd raspberryPiKioskSlideshow
mv -r ./system/lxde-pi_autostart /home/pi/.config/lxsession/LXDE-pi/autostart
```

## Installation - step by step
### Basic Setup
For basic RaspberryPi setup you can use most of the available guides, for example this one:
https://gist.github.com/blackjid/dfde6bedef148253f987

### HDMI Mode
You may need to set the HDMI Mode on the raspi to ensure the hdmi resolution matches your screen exactly. Here is the official documentation:
https://www.raspberrypi.org/documentation/configuration/config-txt/video.md

However I used this one:

(2,82) = 1920x1080	60Hz	1080p

### Installation of base software
- Install **chromium** for showing the slideshow in browser
- Install **apache** Server with PHP module for rendering the slideshow (based on this guide: https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md) 
- Install **nptupdate** to keep your Raspi-clock set correctly

```bash
sudo apt-get update
sudo apt-get upgrade
sudo apt-get dist-upgrade
sudo apt-get install git vim ntpdate chromium-browser apache2 php libapache2-mod-php -y

git clone git@github.com:timluedtke/raspberryPiKioskSlideshow.git
cd raspberryPiKioskSlideshow
mv -r ./system/lxde-pi_autostart /home/pi/.config/lxsession/LXDE-pi/autostart
```

### Autostart Slideshow on bootup
To autostart this slideshow directly after bootup there is a ready-to-go file in this repo: ./system/**lxde-pi_autostart**


With the following command you can move that file to a special directory where raspberryPi automatically executes it on bootup:
```bash
mv -r ./system/lxde-pi_autostart /home/pi/.config/lxsession/LXDE-pi/autostart
```

Based on this Guides: 
- http://www.raspberrypi-spy.co.uk/2014/05/how-to-autostart-apps-in-rasbian-lxde-desktop/
- https://gist.github.com/blackjid/dfde6bedef148253f987

## Prepare your Slideshow
Everything slideshow-related happens in the ./files folder.
- Put some images into the /files folder. Ideally with the same resultion of the screen (eg. 1920x1080px). 
- Edit the slideshow.txt
    - Every line starting with # is a comment line
    - Every other line shall be either the filename (without path) OR a URL (eg: image.jpg OR https://timluedtke.de)
    - if you want you can set the transition delay in the comment-line to a different value (seconds): # setting-transition-delay=
    
## You are done now :)
If everything is set up correctly, the RaspberryPi shall start chromium in fullscreen directly after bootup and after some seconds of showing the date&time (datetimenow.html) your slideshow shall start and loop endlessly. You're welcome.

## Feedback
If you liked what we've done together feel free to give feedback (Gitlab Issues) or send me an photo of your RaspberryPiKiosk Setup. I would love that :) eMail: mail %aht% timluedtke %dot% de
