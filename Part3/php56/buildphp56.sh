#!/bin/bash

yum reinstall -y libedit
yum install -y php56-cli

mkdir /tmp/layer
cd /tmp/layer
cp /opt/layer/bootstrap-php5 ./bootstrap
sed "s/PHP_MINOR_VERSION/6/g" /opt/layer/php.5.ini >php.ini

mkdir bin
cp /usr/bin/php bin/

mkdir lib
for lib in libncurses.so.5 libtinfo.so.5 libpcre.so.0; do
  cp "/lib64/${lib}" lib/
done

cp /usr/lib64/libedit.so.0 lib/
cp /usr/lib64/libjson-c.so.2 lib/

cp -a /usr/lib64/php lib/

zip -r /opt/layer/php56.zip .