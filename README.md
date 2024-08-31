## Proyecto Market Gass App


Ejecucion:
1. Crea un contenedor Docker con la imagen inicial del proyecto de laravel.
2. Verifique que el front inicial de laravel carga con normalidad.
3. Luego desde la carpeta del proyecto abra una ventada del bash para git, y realice un mergue con el proyecto
   https://github.com/OmarDChunza/markergasapp.git el cual cargara los cambios realizados dentro del proyecto para la venta de Gas.
2. Ejecuta en linea de comandos del WSL en windows, las migraciones.
	- Ingresar primero a la carpeta del proyecto MarketGas.
	- Luego ejecutar ./vendor/bin/sail artisan migrate
	- Verificar en la DB que quedaron creadas las tablas para este proyecto.
3. Recargue la pagina en el navegador y proceda a crear un usuario para ingresar a la apliacion.