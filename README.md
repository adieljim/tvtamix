## Proyecto: Acervo AudioVisual TvTamix.

Catálogo digital que facilita la documentacion del acervo audiovisual recopilado a través de los años en la comunidad de Tamazulapam del Espíritu Santo Mixe, Oaxaca., con el equipo que conforma TvTamix.

## Detalles del sistema:

El sistema se desarrolló con el marco de trabajo <a href="https://laravel.com/"><strong>Laravel </strong></a>

- Las funcinalidades principales son: ver, crear, editar y eliminar el archivo para el catalogo audiovisual.
- Cuenta con perfiles de usuario, para un acceso controlado.
- Permite subir archivos de tipo imagen para complementar el catálogo.

## Requerimientos.

- Apache Server.
- Php >7.3.
- MariaDB.
- <a href="https://getcomposer.org/">Composer</a>.

## Instalacion del proyecto.

Duplicar el archivo ".env.example" que se encuentra en el repositorio, y renombrar el archivo duplicado a ".env"

Configurar la base de datos en el archivo ".env"

- En DB_DATABASE el nombre de la base de datos.
- En DB_USERNAME el usuario de la base de datos.
- En DB_PASSWORD la contraseña de la base de datos.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tvtamix
DB_USERNAME=root
DB_PASSWORD=
