Pasos para poder utilizar este Repositorio de GIT 

PASO 1: Descargar el reporsitorio GIT o desde Aules

    Descarga este repositorio de GIT o los archivos proporcionados a través de Aules y ubícalos en la carpeta correspondiente de tu servidor local.

PASO 2: Importar la Base de Datos.

    Con el codigo SQL que se proporciona llamado gestor_incidencias.sql , este codigo creara automaticamente la base de datos si no la tienes creada previamente creando tablas y relaciones entre ellas


Paso 3: Uso de la BD en PHPmyadmin

    La contraseña y el usuario es el proporciando en el archivo conf.json 
    accedes a http://localhost:8000/

Paso 4:Como utilizar el Web

    Tenemos que tener nuestro Contenedor de Docker en marcha y que contenca XAMP, PHPmyadmin
    una vez dentro entramos a nuestro explorador y escribimos en la zona de la URL http://localhost:8000/raizdelPoyecto  donde se guarda nuestro codigo del proyecto dentro del contenedor

    Dentro de la web Podremos crear usuarios Clientes o Administrador en nuestro formulario de registro para dar de alta.
    Una vez creados nos deveremos logear con ellos, pero los Administradores pueden hacer funciones que los clientes no pueden de normal.

    Los administradores veran todo el listado de Incidentes, ademas de poder borrar el incidente de cualquier usuario cliente y modificar el estado de la incidencia dependido de si esta Abierta, En Proceso o Resuelta
