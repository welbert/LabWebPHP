# Trabalho de Laboratório Web
## Tema: Php
### Equipe:
  * Bruno Novaes
  * Diego Novaes
  * Iran Cezar
  * Welbert Serra


##Link para Máquina Virtual
https://goo.gl/9KCCn8


## Configuração do Yii pós-instalação (Primeira Aplicação)

* Configurar informações de conexão com o  database no arquivo de configuracao do yii

basic/config/db.php

database name: bikebase
username: root
password: root

* Criar banco de dados no mysql

No terminal execute:

cd /var/www/html
mysql -u root -p

e digite o password (root). Ao entrar no mysql, digite:

SOURCE bikebase.sql

* Acessando o módulo gii
 
Agora já é possível utilizar o módulo gii do Yii para geração de CRUD, models e controllers. Porém antes disso um ultimo passo, gerar permissões de leitura e escrita para o projeto. Execute o código abaixo na pasta www do apache

sudo chmod 777 -R basic

Basta acessar o navegador agora e acessar o modulo gii pelo link:

[http://localhost/basic/?r=gii](http://localhost/basic/?r=gii)

