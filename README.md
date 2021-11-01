Antes de nada, se ha utilizado un servidor de apache2 para este proyecto, por lo que lo primero sería adecuado configurar un hosting virtual.
En esta página se explica bastante bien:

https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-18-04-es

Tras clonar el repositorio, ejecutar los siguientes comandos:

composer install
php bin/console doctrine:migrations:migrate

