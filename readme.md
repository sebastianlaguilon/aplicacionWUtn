Sistema de Control de Gastos

El Sistema de Control de Gastos es una aplicación que permite a los usuarios llevar un registro de sus gastos personales. A continuación, se detalla la funcionalidad, la base de datos y las herramientas utilizadas en este sistema.

Funcionalidad
1. Inicio de Sesión
Los usuarios deben iniciar sesión proporcionando un nombre de usuario y contraseña.
Si las credenciales son correctas, se redirige al usuario a la página de inicio; de lo contrario, se muestra un mensaje de error.
2. Página de Inicio
En la página de inicio, los usuarios pueden ver todos sus registros de gastos.
Se ofrece la opción de filtrar los gastos por fecha y categoría.
Los usuarios pueden editar, eliminar o ver detalles de cada gasto.
3. Administrador de Categorías
Los usuarios pueden acceder al administrador de categorías para agregar, editar o eliminar categorías.
Esto permite una mejor organización de los gastos.
4. Registro de Gastos
Los usuarios pueden ingresar nuevos gastos, incluyendo el nombre, importe, número de boleta, categoría, descripcion y fecha.
El sistema verifica si un gasto es repetido en la base de datos en función del importe, número de boleta y categoría, y muestra una advertencia si es necesario.
5. Cierre de Sesión
Los usuarios pueden cerrar la sesión en cualquier momento y los regresara a la pantalla de ingreso.

Base de Datos
El Sistema de Control de Gastos utiliza una base de datos para almacenar información importante. La base de datos consta de tres tablas:
1. Tabla de Usuarios
Almacena la información de los usuarios que pueden iniciar sesión en la aplicación.
Estructura de la tabla:
id (Clave primaria): Identificador único del usuario.
nombre_usuario: El nombre de usuario utilizado para iniciar sesión.
contraseña: La contraseña del usuario.
2. Tabla de Gastos
Registra todos los gastos ingresados por los usuarios.
Estructura de la tabla:
id (Clave primaria): Identificador único del gasto.
nombre: El nombre del gasto.
numero_de_boleta: Número de boleta o factura asociado al gasto.
importe: El costo del gasto.
id_categoria (Clave externa): Enlace con la tabla de Categorías, que representa la categoría del gasto.
descripcion: Descripción adicional del gasto (opcional).
fecha: Fecha en que se registró el gasto.
3. Tabla de Categorías
Almacena las categorías de gastos disponibles para organizar los registros.
Estructura de la tabla:
id (Clave primaria): Identificador único de la categoría.
categoria: Nombre de la categoría.
Las tablas Gastos y Categorías están relacionadas mediante una clave foránea (id_categoria) que vincula cada gasto con una categoría específica.

Herramientas Utilizadas
Lenguaje de Programación: PHP
Base de Datos: MySQL
Tecnologías Web: HTML,Bootstrap 5, CSS, JavaScript, AJAX
