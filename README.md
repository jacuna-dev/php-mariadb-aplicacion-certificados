# Acerca del proyecto
Aplicación web con PHP y MariaDB (base de datos).

## Descripción
Sistema generador de certificados, maneja la gestión de alumnos, la gestión de
cursos así como la creación de un archivo PDF con FPDF.

## Requerimientos

Requerimientos:

* [XAMPP](https://www.apachefriends.org/es/index.html) 8.1.6-0
* PHP 8.1.6
* MariaDB 10.4.24 ó MySQL 8.0.29
* Un navegador web ([Mozilla Firefox](https://www.mozilla.org/es-AR/), Google Chrome, etc.).

## Obtener el código

Para instalar la aplicación web:

    $ cd /opt/lampp/htdocs/
    $ git clone https://github.com/jacuna-dev/php-mariadb-aplicacion-certificados

## Base de datos

La base de datos es MariaDB y esa es la admitida oficialmente. Dicho esto,
esta aplicación web también puede funcionar en MySQL, aunque no lo he probado
y no es oficialmente compatible. Si experimenta errores al usar MySQL, no se
pueden solucionar.

Recuerde configurar las credenciales en su archivo `configuraciones/bd.php` si
es necesario para el desarrollo.

Las definiciones de la base de datos, tablas y relaciones se encuentran en el
archivo `src/bd.sql`.

# Licencia

    Copyright (C) 2000-2022 José Acuña.

    Este programa es software libre: puedes redistribuirlo y/o modificar
    bajo los términos de la Licencia Pública General GNU publicada por
    la Free Software Foundation, ya sea la versión 3 de la Licencia, o
    (a su elección) cualquier versión posterior.

    Este programa se distribuye con la esperanza de que sea útil,
    pero SIN NINGUNA GARANTIA; sin siquiera la garantía implícita de
    COMERCIABILIDAD o IDONEIDAD PARA UN FIN DETERMINADO. Ver el
    Licencia Pública General GNU para más detalles.

    Debería haber recibido una copia de la Licencia Pública General GNU
    junto con este programa. Si no, consulte <http://www.gnu.org/licenses/>.

# Preguntas frecuentes

* **¿Cuál es el punto de compartir el código fuente?**
  No tengo ningún interés particular en este código fuente en este momento.
  Solo quiero una aplicación que funcione, que me permita administrar y
  mantener la información al día.
