<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Descripción 
Proyecto realizado para la asignatura de Ingeniería de Software, dictado en la Universidad Católica del Norte para las carreras Ingeniería en Computación e Informática (IenCI) e Ingenería Civil en Computación e Informática (ICCI).
Su propósito fue la construcción de un sistema web de gestión para grupos de investigación, los cuales poseían diversos productos, proyectos y publicaciones.



# Configuración
Si se quiere realizar la clonación del proyecto para tener acceso a él y hacer commits:
Seleccionar la opción "Clone repository". Se debe copiar en la carpeta C:\xampp\htdocs
Luego de haber seleccionado correctamente la carpeta de destino, copiar esta url: https://github.com/IgnacioNMiranda/researchNews.git
    
Si se quiere realizar la clonación o descarga únicamente para revisión:
Seleccionar la opción "Clone repository" o descargar como zip. Se debe copiar en la carpeta C:\xampp\htdocs 


Con esto realizado ya deberías tener el proyecto correctamente alojado en C:\xampp\htdocs\researchNews.

Para que el proyecto funcione adecuadamente se deben ejecutar los siguientes comandos en la consola de comandos, es decir, abriendo cmd en C:\xampp\htdocs (preferiblemente en el orden en que están escritos):
1) composer install
2) composer update
*En este punto deberías borrar el archivo .env que vino con el proyecto y crear un nuevo .env que sea igual a .env.example * 
3) php artisan key:generate (esto crea tu propia key de acceso a la BD)
4) composer require intervention/image (para la subida de imágenes)
5) composer require egulias/email-validator (para validación de email)
6) composer require rinvex/countries (para despliegue y selección de paises)

Con esto el proyecto debería estar completamente operativo y funcional.
Recordar que se trabaja sobre la rama Development y todos los cambios hechos deben ser sobre esta rama.
