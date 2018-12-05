#!/bin/bash

# Deps
 sudo yum install -y \
  autoconf \
  libxml2-devel \
  make \
  automake \
  gcc \
  gcc-c++ \
  kernel-devel;

# PHP local
PHP_INI_SCAN_DIR=/home/ec2-user/php.d \
EXTENSION_DIR=/home/ec2-user/php_phalcon/lib/php/extensions/no-debug-non-zts-20170718 \
./configure --with-config-file-scan-dir=/home/ec2-user/php_phalcon/php.d --prefix=/home/ec2-user/php_phalcon;

make;
make install;

# CPhalcon Ext
sudo ./install --phpize /home/ec2-user/php_phalcon/bin/phpize --php-config /home/ec2-user/php_phalcon/bin/php-config                               


cd php_phalcon;
mkdir php.d;
cp ./php.d/* php.d/

zip -r php_info.zip php_phalcon bootstrap
