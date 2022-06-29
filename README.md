# get_links
A simple scrapper to get all links in a site

## Installation
Dillinger requires [PHP](https://www.php.net/) v7.1^ to run.

Install the dependencies and devDependencies and start the server.

```sh

git clone https://github.com/munenepeter/get_links.git

cd get_links

composer install

```
## Development

Want to contribute? Great!

#### Usage

```sh

php index.php <your-desired-site-url>

```

Your links will be in the links.txt file at the root directory.

By default, the Docker will expose port 8080, so change this within the
Dockerfile if necessary. When ready, simply use the Dockerfile to
build the image.
## License
MIT
**Free Software, Hell Yeah!**
