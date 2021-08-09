




#!/bin/bash
for d in `cat domain.txt |grep -Ev '^$|#'`
do 
mkdir  -p /home/wwwroot/www.$d
#cp -r /home/www/vvutf8/*  /home/wwwroot/www.$d/
cp -r /home/www/vv/*  /home/wwwroot/www.$d/
chattr -ia /home
chmod 777 /home/wwwroot/
chmod 777 /home
chmod 777 /usr/local/nginx/conf/vhost/
chmod -R 777 /home/wwwroot/www.$d/*
cp -rf /home/www/conf/www.default.com.conf  /usr/local/nginx/conf/vhost/www.$d.conf
sed -i s/replaceDomain/$d/g  /usr/local/nginx/conf/vhost/www.$d.conf
done
#sudo service nginx restart

#php调用本shell无法重启。。奇怪
#/usr/sbin/service nginx restart


#chown命令：更改文件拥有者 为www用户
chown www /usr/local/nginx/sbin/nginx
#使用chmod u+s使文件拥有者+文件的变更权限
chmod u+s /usr/local/nginx/sbin/nginx
service nginx restart
