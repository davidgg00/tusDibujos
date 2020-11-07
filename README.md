
## ¿Qué es TusDibujos?
TusDibujos es una mini red social donde los usuarios podrán registrarse e iniciar sesión, subir sus dibujos, ver los dibujos de los demás usuarios, ver y dar likes, ver, comentar y responder las publicaciones etc...

## Instalación
1-Crear una carpeta donde se almacenará el repositorio y ejecutar los siguientes comandos
- ``git init``
- ``git remote add origin https://github.com/davidgg00/tusDibujos``
- ``git fetch origin``
- ``git checkout -b master --track origin/master -f``

2-Ejecuta ``composer install``

3-Cambia el ``.env.example`` a ``.env``

4-Abre el ``.env`` y cambia las credenciales del gestor de la base de datos

5-Crea una base de datos vacía llamada tusdibujos

6-Ejecuta los siguientes comandos para crear las tablas
``php artisan key:generate``
``php artisan migrate``

7-Enseñar imagenes almacenadas ``php artisan storage:link``

8-Arrancar la aplicación web ``php artisan serve``

9- Ir a localhost:8000
