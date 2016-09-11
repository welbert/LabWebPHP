#!/bin/bash
Versao="$(lsb_release -a | grep Release | awk -F: '{print $2}' | awk -F' ' '{print $1}' | awk -F. '{print $1}')"
echo "Versão=" $Versao
So=$(lsb_release -a | grep Distributor| awk -F: '{print $2}' | awk -F' ' '{print $1}')
echo "Sistema=" $So


php7 () {
	sudo apt-get update
	sudo apt-get install -y apache2 php7.0 libapache2-mod-php7.0 mysql-server
	sudo apt-get install -y php7.0-mysql php7.0-mbstring
	sudo chmod 777 -R /var/www
	sudo service apache2 restart
	echo "<?php phpinfo(); ?>" > /var/www/html/info.php
	echo “Fim da Instalação. 
	nohup firefox localhost/info.php & clear
}

php5 () {
	sudo apt-get install apache2 php5 libapache2-mod-php5 mysql-server
	sudo chmod 777 -R /var/www
	sudo apt-get install libapache2-mod-auth-mysql php5-mysql phpmyadmin
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
		echo php5
	fi
else
	if [ "$So" != "Ubuntu" ]; then
		echo php5
	fi
fi

