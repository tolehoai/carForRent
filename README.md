# CarForRent
Rent Car Website



<div id="top"></div>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/tolehoai/carforrent">
    <img src="https://github.githubassets.com/images/modules/logos_page/Octocat.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Car For Rent</h3>

  <p align="center">
    Rent car website
    <br />
    <a href="https://github.com/tolehoai/carforrent><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/tolehoai/carforrent">Github Page</a>
    ·
    <a href="https://github.com/tolehoai/carforrent/issues">Report Bug</a>
    ·
    <a href="https://github.com/tolehoai/carforrent/issues">Request Feature</a>
  </p>
</div>




<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)

The main objective of the application car Rental System require a temporary vehicle, for example those who do not own their own car, or owners of damaged or destroyed vehicles who are awaiting repair or insurance compensation or travelers who are out of town.



<p align="right">(<a href="#top">back to top</a>)</p>



### Technology



* [Nginx](https://www.nginx.com/)
* [PHP](https://www.php.net/)
* [MySQL](https://www.mysql.com/)



<p align="right">(<a href="#top">back to top</a>)</p>


### Coverage
````
XDEBUG_MODE=coverage ./vendor/bin/phpunit tests --coverage-html coverage  
````
### Test
````
./vendor/bin/phpunit tests/Tolehoai/CarForRent/Service 
 ````

<!-- GETTING STARTED -->
## Getting Started

PHP is a popular server scripting language known for creating dynamic and interactive web pages. Getting up and running with your language of choice is the first step in learning to program.

This tutorial will guide you through installing PHP 8.1 on Ubuntu and setting up a local programming environment via the command line. You will also install a dependency manager, Composer, and test your installation by running a script.



### Install Environment
- Follow this article to install LEMP Stack (Linux, Nginx, MySQL, PHP) in Ubuntu
  20.04: [Click here](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04)

### PHP Unit 
````
composer require --dev phpunit/phpunit ^9
````
````
./vendor/bin/phpunit --version
PHPUnit 9.0.0 by Sebastian Bergmann and contributors.
````

### PHPCBF 
````
phpcbf --standard=PSR12 ./src
````


[contributors-shield]: https://img.shields.io/github/contributors/tolehoai/carforrent.svg?style=for-the-badge
[contributors-url]: https://github.com/tolehoai/carforrent/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/tolehoai/carforrent.svg?style=for-the-badge
[forks-url]: https://github.com/tolehoai/carforrent/network/members
[stars-shield]: https://img.shields.io/github/stars/tolehoai/carforrent.svg?style=for-the-badge
[stars-url]: https://github.com/tolehoai/carforrent/stargazers
[issues-shield]: https://img.shields.io/github/issues/tolehoai/carforrent.svg?style=for-the-badge
[issues-url]: https://github.com/tolehoai/carforrent/issues
[license-shield]: https://img.shields.io/github/license/tolehoai/carforrent.svg?style=for-the-badge
[license-url]: https://github.com/tolehoai/carforrent/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: https://cdn.dribbble.com/users/4636622/screenshots/10777227/free_corsa_mockup_1_4x.png
