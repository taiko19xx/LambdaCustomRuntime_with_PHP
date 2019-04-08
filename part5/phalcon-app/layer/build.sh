#!/bin/bash

yum reinstall -y libedit
yum install -y php71-mbstring.x86_64 zip php71-pgsql php71-mysqli php71-devel php71-gd

git clone https://github.com/phalcon/cphalcon
cd cphalcon
git checkout tags/v3.4.3
cd build
./install

mkdir /tmp/layer
cd /tmp/layer
cp /opt/layer/bootstrap .
sed "s/PHP_MINOR_VERSION/1/g" /opt/layer/php.ini >php.ini

mkdir bin
cp /usr/bin/php bin/

mkdir lib
for lib in libncurses.so.5 libtinfo.so.5 libpcre.so.0; do
  cp "/lib64/${lib}" lib/
done

cp /usr/lib64/libedit.so.0 lib/
cp /usr/lib64/libpq.so.5 lib/
cp /usr/lib64/libXpm.so.4 lib/

cp -a /usr/lib64/php lib/

zip -r /opt/layer/php71.zip .