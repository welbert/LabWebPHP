#!/bin/bash
Versao="$(lsb_release -a | grep Release | awk -F: '{print $2}' | awk -F' ' '{print $1}' | awk -F. '{print $1}')"
echo "Versão=" $Versao
So=$(lsb_release -a | grep Distributor| awk -F: '{print $2}' | awk -F' ' '{print $1}')
echo "Sistema=" $So


php7 () {
	sudo apt-get update
	sudo apt-get install -y apache2 php7.0 libapache2-mod-php7.0 mysql-server
	sudo apt-get install -y php7.0-mysql php7.0-mbstring php-imagick
	sudo chmod 777 -R /var/www
	sudo service apache2 restart
	echo "<?php phpinfo(); ?>" > /var/www/html/info.php
	echo “Fim da Instalação. 
	nohup firefox localhost/info.php & clear
}

php5 () {
	sudo apt-get update
	sudo apt-get install apache2 php5 libapache2-mod-php5 mysql-server
	sudo chmod 777 -R /var/www
	sudo apt-get install libapache2-mod-auth-mysql php5-mysql phpmyadmin php5-imagick
	sudo ln -s /usr/share/phpmyadmin /var/www/html/phpmyadmin
	sudo service apache2 restart
	echo "<?php phpinfo(); ?>" > /var/www/html/info.php
	echo “Fim da Instalação. 
	nohup firefox localhost/info.php & clear
}

if [ "$So" != "Debian" ]; then
	if [ $Versao -eq 16 ]; then 
		php7
	else
		php5
	fi
else
	php5
fi

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/bin --filename=composer
php -r "unlink('composer-setup.php');"

