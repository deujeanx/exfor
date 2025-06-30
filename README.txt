
EXFOR S.A.S – Sistema de gestión de proyectos y usuarios
========================================================

Este software permite crear proyectos, asignar usuarios, buscarlos, eliminarlos y organizarlos. 
Está hecho en PHP con Bootstrap, HTML, JavaScript y MySQL.

Requisitos
----------
- Hosting gratuito (se usó: https://infinityfree.net)
- PHP 7.4 o superior
- MySQL
- Navegador moderno (Chrome, Edge, Firefox)
- Herramienta de administración de archivos (File Manager o FileZilla)
- phpMyAdmin para importar base de datos

Estructura de carpetas
----------------------
Subir todos los archivos directamente dentro de la carpeta `htdocs/`, sin subcarpetas.

/htdocs
│── index.php
│── proyectos.php
│── agregarIntegrante.php
│── verIntegrantes.php
│── eliminarIntegrante.php
│── usuario_a_proyecto.php
│── guardarProyecto.php
│── conexion.php
│── api_usuario.php
│── usuarios.php
│── css/
│    └── estilos.css

Configuración de la base de datos
---------------------------------
1. Crear base de datos en InfinityFree
   - Nombre: if0_39355820_exfor_db
   - Host: sql201.infinityfree.com
   - Usuario: if0_39355820
   - Contraseña: (la que definiste al crearla)

2. Importar el archivo `.sql`
   - Accede a phpMyAdmin desde InfinityFree.
   - Elige if0_39355820_exfor_db.
   - Ve a la pestaña "Importar".
   - Selecciona tu archivo `.sql` exportado desde XAMPP.
   - Haz clic en "Continuar".

Configurar conexión a la base de datos
--------------------------------------
En el archivo conexion.php:

$conexion = new mysqli("sql201.infinityfree.com", "if0_39355820", "TU_CONTRASEÑA", "if0_39355820_exfor_db");

(Reemplazar "TU_CONTRASEÑA" por la contraseña real de tu base de datos.)

Cómo ejecutar el proyecto
-------------------------
1. Sube todos los archivos al administrador de archivos dentro de /htdocs/.
2. Accede desde tu navegador a: https://exfor.kesug.com
3. Comienza a:
   - Crear nuevos proyectos.
   - Agregar usuarios desde el API.
   - Asignar o eliminar usuarios de proyectos.
   - Buscar integrantes por nombre.

Funciones principales
---------------------
- Crear proyectos
- Agregar usuarios a proyectos
- Buscar usuarios por nombre
- Eliminar usuarios
- Visualizar participantes por proyecto
- Validación de usuario duplicado en proyecto
