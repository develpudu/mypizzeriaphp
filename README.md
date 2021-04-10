# MyPizzeriaPHP 🍕
 
**MyPizzeriaPHP** es un administrador de pedidos para restaurantes "más tecnológicos".
MyPizzeriaPHP se basa en *PHP* como lenguaje de programación y *SQL (MySQL)* para la gestión de todo el restaurante.

## Requisitos
> Los requisitos se basan en pruebas anteriores en [XAMPP](https://www.apachefriends.org/index.html) versión **PHP > 7.1.3**.
> No se garantiza el funcionamiento con versiones **PHP <5.3**

Para *MyPizzeriaPHP* es necesario tener un servidor web con:
- Apache 2.2
- PHP 7.3.0
- MySQL 5.6.33
- Conexión a Internet

En el servidor web, se recomienda utilizar la raíz (es decir, el directorio /) para que todo el paquete funcione correctamente.

<br>

## Instalación
1. Para instalar MyPizzeriaPHP, simplemente descargue desde **[releases](https://github.com/develpudu/mypizzeriaphp/releases)** la última versión. Después de descargar el archivo .zip, deberá abrir el archivo .zip y arrastre la carpeta a la raíz del servidor web.
> O clonar el repositorio git clone https://github.com/develpudu/mypizzeriaphp.git

2. A continuación, tendrá que mover todos los elementos dentro de la carpeta al exterior (y eliminar la carpeta ahora inútil).

3. Abra el servidor web si aún no se ha iniciado y conéctese a través de cualquier navegador. Se requerirán dos formularios para completar donde se solicitarán las credenciales de la base de datos.

4. Al finalizar, se le pedirá que inicie sesión.
> Los usuarios de prueba son:
> |        Tipo        | Usuario | Contraseña |
> |:------------------:|---------|------------|
> |    Administrador   | admin   | admin      |
> |   Gerente de Sala  | user1   | password   |
> | Camarero / Cociner | user2   | password   |


Después de ingresar su cuenta correctamente, podrá acceder a MyPizzeriaPHP. :)

[DEMO Online](https://mypizzeriaphp.dedyn.oi)

<br>

## PREGUNTAS MÁS FRECUENTES
### ¿Cómo creo o realizo un pedido?
Simplemente haga clic en `Pedidos` e ingrese los datos requeridos.
Una vez insertado, vaya a `Cocina` para comprobar su correcto funcionamiento.

Si la ventana emergente no aparece, intente deshabilitar el bloqueador de ventanas emergentes en su dispositivo.

<br>

### ¿Cómo pago la factura?
Vaya a `Cuentas` y presione el botón junto a la tabla correspondiente. Se abrirá una ventana emergente dentro de la página (modal) donde será posible verificar la factura de una mesa, se aplican cargos de cobertura e impuestos adicionales que se pueden cambiar en la configuración. Una vez que se confirma el pago, se eliminan los registros de la tabla completados.

En futuras versiones será posible guardar registros para estadísticas.

<br>

### ¿Dónde cambio la configuración?
Al abrir `Configuración` podrá cambiar la configuración. En la barra de la izquierda encontrarás las posibles configuraciones modificables y presionando una de las posibles te dirigirá a la barra de la derecha. **Es importante cambiar la configuración solo si es necesario, en caso de errores, reconfigure** `config.ini`.

Si accede al sitio por primera vez, el archivo de configuración no estará disponible, ya que se crea al final de la configuración inicial.

<br>

### ¿Cómo agrego o elimino una cuenta?
Al ir a `Usuarios` podrá administrar usuarios en el sitio, presionando **+** en la barra lateral se le pedirá un formulario para ingresar un usuario, dependiendo de la categoría de su cuenta que pueda usar más o menos páginas en el sitio.

| Nivel | Tipo              | Páginas                               |
|-------|-------------------|---------------------------------------|
| 0     | Administrador     | /                                     |
| 1     | Gerente de sala   | /, Configuración (solo lectura)       |
| 2     | Camarero/Cocinero | Cocina, Recepción de pedidos, Factura |
| -     | Visitante         | Menú                                  |

<br>

### ¿Cómo cambio el menú? *(avanzado)*
Para editar el menú, debe iniciar sesión en PhpMyAdmin, para hacerlo, vaya a la página de inicio y agregue `/phpmyadmin/`. Inicie sesión y vaya a su base de datos utilizada para MyPizzeriaPHP y seleccione la tabla `menú`.
Una vez que haya ingresado a la mesa, podrá administrar su menú.

Si desea eliminar los datos dentro de la tabla, presione **Operaciones** y luego **Vacíe la tabla (TRUNCATE)**.

> Es importante no eliminar permanentemente la tabla con el `DROP`, ya que muchas características del sitio pueden no funcionar. Para volver a agregar una tabla, se le pedirá que utilice las consultas correspondientes dentro del archivo `/resoureces/sampleDB.sql`.

En ausencia de PhpMyAdmin, debe ingresar manualmente las consultas a través de la CLI de MySQL o usar otro DBMS.

> En futuras versiones será posible guardar administrar el menú desde el sistema.

<br>

### ¿Cómo comparto un error que encontré?
En la sección **[problemas](https://github.com/develpudu/mypizzeriaphp/issues)** es posible insertar cualquier error para mejorar la experiencia futura del paquete MyPizzeriaPHP.

<br>

## Copyright / Licencias
[DevelPudu](https://github.com/develpudu). [MIT](https://github.com/develpudu/mypizzeriaphp/blob/master/LICENSE.md)

<br>
<br>

Basado en el fork de *[PhpMyPizza](https://github.com/Phoenixx19/PhpMyPizza)*