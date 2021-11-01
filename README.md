Antes de nada, se ha utilizado un servidor de apache2 para este proyecto, por lo que lo primero sería adecuado configurar un hosting virtual.
En esta página se explica bastante bien:

https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-18-04-es

El archivo .conf necesario para esto lo tengo configurado de la siguiente manera:



    <VirtualHost *:80>
    
    ServerName irontec.test
    ServerAlias it.test
    Header set Access-Control-Allow-Origin "*"
    DocumentRoot /var/www/html/irontec-prueba/public
    
    <Directory /var/www/html/irontec-prueba/public>
        	AllowOverride None
        	Order Allow,Deny
        	Allow from All

	<IfModule mod_rewrite.c>


           Options -MultiViews

           RewriteEngine On

	   RewriteCond %{HTTP:Authorization} .
           RewriteRule ^ - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

           RewriteCond %{REQUEST_FILENAME} !-f

           RewriteRule ^(.*)$ index.php [QSA,L]

       </IfModule>

    </Directory>

    # uncomment the following lines if you install assets as symlinks
    # or run into problems when compiling LESS/Sass/CoffeeScript assets
    # <Directory /var/www/project>
    #     Options FollowSymlinks
    # </Directory>

        

    ErrorLog /var/log/apache2/adp.api.log
    CustomLog /var/log/apache2/adp.api_access.log combined
</VirtualHost>

En el archivo hosts dentro de la carpeta /etc, he introducido la siguiente línea para definir el nombre del proyecto en el navegador:

127.0.0.1	irontec.test

Tras clonar el repositorio, ejecutar los siguientes comandos:

composer install

php bin/console doctrine:migrations:migrate

En el archivo .env se define el servidor local de mysql que vamos a usar en la siguiente línea:

DATABASE_URL=mysql://root:password@127.0.0.1:3306/database?serverVersion=5.7

Es necesario sustituiar root, password y database por los valores correspondientes del servidor que se vaya a usar.

La ruta de la página principal es la siguiente:

irontec.test/api
