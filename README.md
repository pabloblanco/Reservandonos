# Reservandonos
### Repo para el proyecto Reservándonos
------------------------------------------------------------------------------------------------------------------------------------------ 
# Detalles tecnológicos de la solución y estándares aplicados

La estrategia que se utilizó para diseñar la aplicación se basó en el uso de contenedores con Sail de Laravel, para facilitar el despliegue. También se utilizó Inertia con el fin de integrar aún más las aplicaciones Vue, aprovechando las ventajas que este trae para mejorar la productividad, y minimizar los tiempos de desarrollo, facilitando la mantenibilidad a largo plazo.

También se recomienda la instalación de Octane y un servidor Swoole. Se recomienda Octane para administrar peticiones paralelas en función de los núcleos del procesador, ya que este genera un worker por cada núcleo del procesador, capaz de procesar las peticiones de forma paralela. Por otro lado, su complemento Swoole para servir la solución, ya que con esta tecnología, disponible a partir de la versión 8 de PHP, se obtiene mayor rendimiento que utilizando Nginx o Apache, esto se debe a que el framework se inicia una sola vez y queda disponible para las siguientes solicitudes. Lo mismo pasa con Vite pero en el frontend de Vue, ya que proporciona un entorno de desarrollo más rápido y agrupando el código para la producción.

Para el desarrollo a nivel de código se evitó usar recursos de sobre ingeniería, que por un lado hacen economía de código, pero por otro dificultan la lectura y posterior mantenimiento de la solución. Por lo anterior se buscó mantener el estándar PSR-2 y 4 con el fin de darle un orden estandarizado a la lectura del código.

Se evitaron abreviaciones en nombres de variables, propiedades, métodos o clases, ya que dificultan la lectura y entendimiento de su función dentro de la aplicación. Para no sobre documentar el código, se usaron nombres de variables, métodos y clases que van acompañando la narrativa de las funciones que cada componente desempeña.

La aplicación sigue las recomendaciones de Laravel en cuanto a distribución de archivos, nomenclaturas de variables, métodos, clases, rutas, modelos y sus campos, así como el mantenimiento de sus principios S.O.L.I.D.

Se desarrollaron pruebas funcionales, para permitir revisar su cobertura, por medio de Xdebug, incluso permitirían probar los beneficios de Octane, en cuanto a velocidad de respuesta de la app, por medio de la gestión de pruebas paralelas.

La configuración del entorno de la BD está lista para ser configurada con el patrón CQRS que permite realizar la escritura y la lectura de manera independiente, con el fin de poder escalar la infraestructura de servidores de forma separada, ya sea del servidor de lectura o del de escritura.

Los aspectos de seguridad se desarrollaron mediante la implementación de una estructura básica de autenticación por medio del middleware proporcionado por el paquete de Laravel Breeze.

------------------------------------------------------------------------------------------------------------------------------------------ 
# Cobertura de puntos a evaluar por la empresa

### Buenas prácticas de desarrollo:

    Código limpio y bien documentado.
    Principios SOLID, en especial el de responsabilidad única.
    Uso de patrones de diseño MVC, Middleware, Facades, CQRS.
    Uso del standard psr-4.
    Pruebas funcionales de los métodos desarrollados en cada clase.
    Se utilizó el patrón de Middleware como estrategia de seguridad de la aplicación.
    Se manejaron excepciones por posibles fallas al consultar la api externa.
	
### Manejador de versiones:

Repositorio en Github para poder clonar el proyecto desde:
	
	https://github.com/pabloblanco/Reservandonos.git
	
### Utilización de contenedores Docker:

Repositorio en Dockerhub para hacer Pull y Run de la imagen del contenedor:	
	
	pabloblanco2025/reservandonos:latest
	
### Documentación del código:

Se documentaron:
    	
    Los campos de las tablas y las migraciones.
    Los modelos y las relaciones.
    Las rutas y los controladores.
    Los archivos de pruebas.

### Versiones utilizadas:

    PHP 8.3.1
    MySQL 8.0.32
    Composer 2.70
    Laravel 10.43.0
    Breeze 1.4
    Guzzle 7.8
    Tailwind 3.2.1
    Inertia 0.6.8
    Vue 3.4.16
    Node 20.11.0
    NPM 10.4.0
    Vite 5.1.0
    Sail 1.27	
    Docker Compose 2.23.3
    Docker Desktop 4.27.1
	
### Despliegue del proyecto en local para pruebas:

1.-Asegurate de tener Docker instalado.
	
2.-Crea la carpeta en la que necesitas tener el proyecto.
	
3.-Dentro de la carpeta, ejecuta el siguiente comando para bajar la imagen del contenedor:

    docker pull pabloblanco2025/reservandonos:latest
	
4.-Ejecutas tu contenedor Laravel basado en la imagen pabloblanco2025/reservandonos:latest.
	
5.-Inicia el servidor con docker exec -it pabloblanco2025/reservandonos npm run dev para que vite sirva los archivos del front correctamente.

Notas:
	
	La configuración del contenedor Laravel incluye la dependencia de una base de datos MySQL.

	Docker Compose, o el comando docker run, si estás ejecutando contenedores directamente, detectan que no tienes la imagen mysql:latest localmente.

	Docker descarga automáticamente la imagen mysql:latest desde Docker Hub antes de iniciar los contenedores.

	Se iniciarán los contenedores, y la aplicación Laravel y MySQL estarán en funcionamiento.
	
### Gestión del proyecto:

Backend:

    Se desarrollaron 4 componentes, quedaron pendientes 2.
    Se crearon 4 migraciones y 4 modelos.
    Se realizaron pruebas funcionales.
		
Frontend:

    Se crearon 3 componentes, quedan pendientes 3.

### Backlog del proyecto:
	
#### Laravel:
	
1.-Optimizar Laravel para maximizar el uso de recursos del servidor con Octane y Swoole.
2.-De ser necesario, configurar la base de datos con el patrón CQRS de segregación de responsabilidades para optimizar su uso.
3.-Instalación de XDebug para revisión de cobertura de pruebas.
4.-Instalación y configuración de PHPStan para pruebas estáticas del código.
5.-Configuración del seguimiento de bugs con el servicio de Slack y archivo de Logs.
	
#### Aplicación:
	
1.-Rutas: Pasar las rutas de consulta de la API externa al archivo de rutas api.php para funcionar como api intermedia por principio de responsabilidad única.
		
2.-Excepciones: Crear excepciones personalizadas para hacer más mantenible el código.
		
3.-Página del listado de lugares:
			
    3.1.-Dar funcinalidad al botón del corazón que suma likes.
    3.2.-Dar funcionalidad al botón ver más del paginador que muestra más resultados.
		
4.-Página con la información del lugar seleccionado:
			
    4.1.-Dar funcionalidad al popup que muestra el resto de las imagenes del lugar.
    4.2.-Dar funcionalidad al botón de Reservar con modalBooking.
			
5.-Página del top 5 de lugares que más reservaciones y likes tienen:
			
    5.1.-Mostrar la vista del componente Vue con la tabla de 5 lugares.
    5.2.-Dar funcionalidad al controlador para enviar los datos con la vista.
-----------------------------------------------------------------------------------------------------------------------------------------------------------	
### Screenshots de la aplicación web

#### Bienvenida

![Screenshot from 2024-02-12 10-15-10](https://github.com/pabloblanco/Reservandonos/assets/11873645/5b828a27-4e21-44d5-807e-5c1a9330883e)

#### Registro

![Screenshot from 2024-02-12 10-15-38](https://github.com/pabloblanco/Reservandonos/assets/11873645/44a14fe1-4ac2-4c1f-b642-979f5d3a006b)

#### Login

![Screenshot from 2024-02-12 10-16-13](https://github.com/pabloblanco/Reservandonos/assets/11873645/511259e6-7d76-4c2a-a583-9994619da090)

#### Dashboard

![Screenshot from 2024-02-12 10-16-28](https://github.com/pabloblanco/Reservandonos/assets/11873645/87274383-fd13-4bc5-854c-ef8707b88e12)

#### Usuarios

![Screenshot from 2024-02-12 10-16-40](https://github.com/pabloblanco/Reservandonos/assets/11873645/5a4a3efa-d65c-4b4f-b8bf-75c261ff6b59)

#### Listado de lugares

![Screenshot from 2024-02-12 10-17-21](https://github.com/pabloblanco/Reservandonos/assets/11873645/00c3c518-3718-4604-94ef-92a47411064b)

#### Información del lugar elegido

![Screenshot from 2024-02-12 10-17-39](https://github.com/pabloblanco/Reservandonos/assets/11873645/b0ecc160-9996-45c2-9326-351f2ec08b4a)

#### Continuación de la pantalla de información del lugar elegido

![Screenshot from 2024-02-12 10-18-05](https://github.com/pabloblanco/Reservandonos/assets/11873645/42ead9be-b795-4ab8-8537-7e9135859b93)

-----------------------------------------------------------------------------------------------------------------------------------------------------------
### Feedbak del proyecto:

