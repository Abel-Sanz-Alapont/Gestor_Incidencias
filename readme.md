# Gestor de Incidencias (Arquitectura MVC)

Aplicación web desarrollada en PHP para la gestión y seguimiento de incidencias, implementando una arquitectura **Modelo-Vista-Controlador (MVC)** pura. Permite a los usuarios reportar problemas y a los administradores gestionarlos de forma eficiente.


## Tecnologías y Patrones de Diseño Utilizados

* **Lenguaje:** PHP 8 / HTML5 / CSS3.
* **Base de Datos:** MySQL.
* **Conexión a BD:** PDO implementando el patrón **Singleton** para optimizar y asegurar una única instancia de conexión.
* **Arquitectura:** MVC con enrutador principal (`index.php`) y carga automática de clases (`autoload.php`).

## Características Principales a Evaluar
  1. **Sistema de Roles (Herencia):** Acceso diferenciado para `Clientes` y `Administradores`.
  2. **CRUD Completo:** Creación, lectura, actualización de estados y eliminación de registros.
  3. **Buscador de Administrador:** Filtrado dinámico de incidencias por `ID de Cliente`.
  4. **Autenticación Segura:** Registro de usuarios, login con contraseñas encriptadas (`password_hash`) y protección de rutas mediante variables de Sesión.
  5. **Persistencia (Cookies):** 
      * Sistema de auto-login para mantener la sesión iniciada automáticamente.
      * Personalización del color de fondo de la interfaz, guardado de forma individual para cada usuario en su navegador.
     
## Pasos para la Instalación y Despliegue

**PASO 1: Descargar el proyecto**

Descarga los archivos proporcionados y ubícalos en la carpeta correspondiente de tu servidor local o en la carpeta montada en tu Docker.

**PASO 2: Importar la Base de Datos**

En la raíz del proyecto encontrarás el archivo `gestor_incidencias.sql`. Importa este archivo en tu gestor de bases de datos. 
*Nota: El script contiene las sentencias necesarias para crear automáticamente la base de datos y todas sus tablas relacionadas, no es necesario crearla a mano.*

**PASO 3: Credenciales De la BD**

Las credenciales de conexión a la base de datos se gestionan desde el archivo `conf.json`.

    {
        "host": "db",
        "db": "gestor_incidencias",
        "userName": "root",
        "password": "test"
    }

**PASO 4: Puesta en marcha**

    Asegúrate de tener tu contenedor de Docker.

    Abre tu navegador web e introduce la URL hacia el directorio público del proyecto. 

## Guía Rápida de Pruebas

    1.Registro: Accede a la web y registra al menos dos usuarios (un Cliente y un Administrador).
    2.Prueba de Cliente: Inicia sesión con el cliente. Crea un par de incidencias. Observa que solo puedes ver tus propios tickets y no puedes modificarlos ni borrarlos. Aprovecha para cambiar el color de fondo usando la paleta de colores
    3.Prueba de Administrador: Cierra sesión e inicia con la cuenta del administrador.

        *Podrás ver las incidencias del cliente que acaba de crear.

        *Modifica el estado de alguna de ellas (Abierta, En Proceso, Resuelta).

        *Utiliza el  buscador por ID introduciendo el ID del cliente.

        *Eliminar un registro.

    4.Prueba de Persistencia: Cierra el navegador por completo sin cerrar y logea con el usuario para verificar que el color de fondo sigue con el que escogiste.