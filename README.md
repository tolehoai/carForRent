# CarForRent
Rent Car Website

### Coverage
XDEBUG_MODE=coverage ./vendor/bin/phpunit tests --coverage-html coverage  
### Test
./vendor/bin/phpunit tests/Tolehoai/CarForRent/Service  


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



<!-- GETTING STARTED -->
## Getting Started

PHP is a popular server scripting language known for creating dynamic and interactive web pages. Getting up and running with your language of choice is the first step in learning to program.

This tutorial will guide you through installing PHP 8.1 on Ubuntu and setting up a local programming environment via the command line. You will also install a dependency manager, Composer, and test your installation by running a script.



### Install Composer

Composer is a popular dependency management tool for PHP, created mainly to facilitate installation and updates for project dependencies. It will check which other packages a specific project depends on and install them for you, using the appropriate versions according to the project requirements. Composer is also commonly used to bootstrap new projects based on popular PHP frameworks, such as Symfony and Laravel.

To install: 
  ```sh
  cd ~
  ```

  ```sh
  curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
  ```
  Next, we’ll verify that the downloaded installer matches the SHA-384 hash for the latest installer found on the Composer Public Keys / Signatures page. To facilitate the verification step, you can use the following command to programmatically obtain the latest hash from the Composer page and store it in a shell variable:
  ```sh
  HASH=`curl -sS https://composer.github.io/installer.sig`
  ```
  If you want to verify the obtained value, you can run:
  ```sh
  echo $HASH
  ```
  ```sh
  e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a
  ```
Now execute the following PHP code, as provided in the Composer download page, to verify that the installation script is safe to run:
```sh
php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
```
You’ll see the following output:
```sh
Installer verified
```


If the output says `Installer corrupt`, you’ll need to download the installation script again and double check that you’re using the correct hash. Then, repeat the verification process. When you have a verified installer, you can continue.
To install `composer` globally, use the following command which will download and install Composer as a system-wide command named composer, under `/usr/local/bin`:
```sh
sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

You’ll see output similar to this:
```sh
Output
All settings correct for using Composer
Downloading...

Composer (version 2.2.9) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer
```
To test your installation, run:
```sh
composer
```
```sh
Output
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version Composer version 2.2.9 2022-03-15 22:13:37
Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```
This verifies that Composer was successfully installed on your system and is available system-wide.
### Installation

_Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services._

1. Get a free API Key at [https://example.com](https://example.com)
2. Clone the repo
   ```sh
   git clone https://github.com/your_username_/Project-Name.git
   ```
3. Install NPM packages
   ```sh
   npm install
   ```
4. Enter your API in `config.js`
   ```js
   const API_KEY = 'ENTER YOUR API';
   ```

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap

- [x] Add Changelog
- [x] Add back to top links
- [ ] Add Additional Templates w/ Examples
- [ ] Add "components" document to easily copy & paste sections of the readme
- [ ] Multi-language Support
    - [ ] Chinese
    - [ ] Spanish

See the [open issues](https://github.com/tolehoai/carforrent/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Your Name - [@your_twitter](https://twitter.com/your_username) - email@example.com

Project Link: [https://github.com/your_username/repo_name](https://github.com/your_username/repo_name)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

Use this space to list resources you find helpful and would like to give credit to. I've included a few of my favorites to kick things off!

* [Choose an Open Source License](https://choosealicense.com)
* [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
* [Malven's Flexbox Cheatsheet](https://flexbox.malven.co/)
* [Malven's Grid Cheatsheet](https://grid.malven.co/)
* [Img Shields](https://shields.io)
* [GitHub Pages](https://pages.github.com)
* [Font Awesome](https://fontawesome.com)
* [React Icons](https://react-icons.github.io/react-icons/search)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
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