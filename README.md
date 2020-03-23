<h1 align="center">
  <br>
  RPi-Landing-Page
  <br>
</h1>

<h4 align="center">A Landing page that displays system information for you Raspberry Pi and pin your favorite local pages/apps.</h4>

<p align="center">
  <a href="#"><img src="https://img.shields.io/github/last-commit/K-Kraken/RPi-Landing-Page.svg"></a>
  <a href="/LICENSE"><img src="https://img.shields.io/github/license/K-Kraken/RPi-Landing-Page.svg?color=blue"></a>
</p>



### Why do I do it?
This removes the necessity to just open a console/ssh to just view basic information such as Local IP, Uptime etc.


## Getting Started

### Prerequisites
What things you need to run the program:
- A web server preferably Apache2 and PHP.

- Install the following from APT package manager:
  
- ```bash
  sudo apt update
  sudo apt upgrade
  sudo apt install apache2
  sudo apt install php php-mbstring
  ```
  
  - For detailed instructed on setting up [Apache2 and PHP](https://howtoraspberrypi.com/how-to-install-web-server-raspberry-pi-lamp/)

## Features
* Displays the following System Information:
	- System Time
	- Kernel and OS Information
	- Uptime 
	- Free Memory (in MB and in Percentage) 
	- Total Memory (in MB)
	- CPU Temperature (in oC)   
	- Number of Running Processes
	- Connected Network
	- Local IP Address
* Ability to pin sites

### Screenshot
```bash
Tested on Raspberry Pi 4, running 
PHP Version 7.3.14-1~deb10u1 on Apache/2.4.38 (Raspbian)
```

<img src="http://cdn.thekrishna.in/img/common/rpilanding.gif" width="750"/>




## Acknowledgments
* Hat tip to anyone whose code was used.
* Raspberry Pi itself


<p align="center">
  Made with ❤️ by <a href="https://github.com/K-Kraken">K-Kraken</a>
</p>

![wave](http://cdn.thekrishna.in/img/common/border.png)