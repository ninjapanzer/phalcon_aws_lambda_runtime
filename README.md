# phalcon_aws_lambda_runtime

# An incomplete implementation of AWS Runtime based off PHP with Phalcon extensions compiled

## Download
https://app.box.com/s/izm52f7ihtnpm3yh2hsyurcgqdaccj1k

Compiled according AWS Runtime Tutorial so for 👆this means we have the following deets:
- Operating system – Amazon Linux
- AMI – amzn-ami-hvm-2017.03.1.20170812-x86_64-gp2
- Linux kernel – 4.14.72-68.55.amzn1.x86_64

What is included is:
- Run of the mill PHP binary
  - PDO support through sqlite
- Opcache zend_extension
- Phalcon extension

Binary `{zip}/php_phalcon/bin/php`

Libs are in their pre-ordained locations within `{zip}/php_phalcon/...`

Bootstrap is in the and assumes your function is within `{zip}/public/index.php`

### Included
- `build/install.sh` an incomplete but sequential dump of commands use to build PHP and Phalcon
- `public/*` php function
- `bootstrap` A spiritual copy of the tutorial runtime bootstrap that loads a php dev server and sends it requests from the lambda api (Much Hackery)


#### Bootstrap
As this is a PoC I got lazy and I just boot up a `php -S` dev server to accept request using the `.htrouter` from [phalcon/phalcon-devtools](https://github.com/phalcon/phalcon-devtools/blob/master/templates/.htrouter.php) to manage the interface here via local curl. I background this as its normally blocking, since that can lead to a race condition consuming from the lambda api resulting in the first call trying to resolve before the server has finished its boot.

Next we walk the event api for lambda and just curl to our local server

The server is a very simple hello world utilzing [Phalcon\Mvc\Micro](https://docs.phalconphp.com/hu/3.4/application-micro)

When the instance shuts down we go ahead and release that php resource because I am always trying to be a nice person.

#### build/install.sh
This is a work in progress but as I continue to refine this process I will complete this so you can build any variations of php and phalcon you may need in one stop in the near future.
