# CinemApp
## PASOS PARA PONER A FUNCIONAR LA APLICACION ##
Lo primero que se debe hacer es clonar el repositorio. Para ello se debe ejecutar el siguiente comando con el enlace del repositorio.

**git clone https://github.com/davraz/CinemApp.**

Luego se procede a instalar las dependencias gfaltantes que necesita nuestro proyecto para funcionar para ellos usamos el comando

**composer install**

Luego se configura el archivo de entorno. Para ello cambiamos el nombre del archivo **.env.example** por **.env** y configuramos la base de datos, con los respectivos permisos. Para nuestra app hemos usado mysql una base de datos llamada cinemapp con usuario root y password "". 

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cinemapp
DB_USERNAME=root
DB_PASSWORD=

Luego generamos una clave de encriptacion usando el siguiente comando 
**php artisan key:generate**
Ahora corremos las migraciones de nuestra base de datos y sembramos algunos valores usando los seeders con el siguiente comando 
**php artisan migrate --seed**

Por ultimo solo falta poner a funcionar nuestra aplicacion en un servidor, para ello usamos el comando 
**php artisan serve**
El cual nos habilita un servidor con una direccion en la cual correrá la aplicacion.
