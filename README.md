# CRUD con Laravel
CRUD para la gestión de notas de una escuela.

### Pre-requisitos 📋
Asegúrate de tener instalados los siguientes programas antes de poner en marcha el proyecto:
* GIT [Link](https://git-scm.com/downloads)
* Entorno de servidor local, Ej: [Laragon](https://laragon.org/download/), [XAMPP](https://www.apachefriends.org/es/index.html) o [LAMPP](https://bitnami.com/stack/lamp/installer).
* PHP Version 7.4 - 8.0 [Link](https://www.php.net/downloads.php).
* Manejador de dependencias de PHP [Composer](https://getcomposer.org/download/).

### Instalación 🔧
Paso a paso de lo que debes ejecutar para tener el proyecto ejecutandose
 1. Clona el repositorio en tu máquina local:
    ```
    git clone https://github.com/ingestebancorrea/school-project.git
    ```
 2. Ingresa a la carpeta del repositorio
    ```
    cd repositorio
    ```
 3. Instala las dependencias del proyecto
    ```
    composer install
    ```
 4. Crea el archivo ".env" y cambiar valores de la base de datos.
 5. Ejecute las migraciones
    ```
    php artisan migrate --seed
    ```
 6. Inicialice el servidor local
    ```
    php artisan serve
    ```
 7. Listo, ya podrá visualizr e interactuar con el proyecto en local

## Construido con 🛠️

Las herramientas que utilice para crear este proyecto
* Framework de PHP [Laravel](https://laravel.com/docs/8.x).
* Toolkit de diseño [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/).

# Enlace explicación de aplicación web:
https://drive.google.com/file/d/1XeeIGQJ1-wYXVIQDfBaQUqsCduudHCZ9/view?usp=sharing

## Autores ✒️

* **Esteban Correa Pereira** - *Desarrollador Full Stack* -  GitHub: [ingestebancorrea](https://github.com/ingestebancorrea)

## Licencia 📄

Este proyecto está bajo la Licencia (GNU General Public License v3.0) - mira el archivo [LICENSE.md](https://github.com/susananzth/3-laravel-crud/blob/main/LICENSE) para obtener más detalles.