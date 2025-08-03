# ZTECH-PruebaTecnica
Repositorio para registro de cambios realizados durante el desarrollo de la prueba técnica.

Prueba Técnica - Gestión de Tareas

Este proyecto es una aplicación web desarrollada con Laravel 12, Vue 3 y Docker, que permite gestionar tareas asignadas a diferentes usuarios.

📋 Requisitos previos

Asegúrate de tener instalado lo siguiente en tu máquina:

PHP 8.x

Composer

Node.js 18.x o superior

Docker & Docker Compose (opcional pero recomendado)

SQL Server (si no usas Docker)

⚙️ Instalación del proyecto

Sigue los siguientes pasos para poner en marcha la aplicación localmente:

1. Clonar o descomprimir el proyecto

Si tienes el .zip, simplemente extrae el contenido.

2. Instalar dependencias

composer install
npm install

3. Compilar assets frontend

npm run build

4. Configurar entorno

cp .env.example .env

Luego edita el archivo .env para establecer la conexión con tu base de datos (SQL Server) y otros ajustes necesarios.

5. Generar clave de aplicación

php artisan key:generate

6. Migraciones (base de datos)

php artisan migrate

🐳 Uso con Docker (opcional pero recomendado)

Levantar los servicios:

docker compose up -d

Ejecutar las migraciones desde el contenedor:

docker compose exec app php artisan migrate

🧪 Datos de prueba

Puedes utilizar el script SQL proporcionado para poblar la base de datos con datos iniciales.

📁 Estructura del proyecto

app/ - Lógica del backend (Laravel)

resources/js/ - Componentes frontend (Vue 3)

routes/web.php y routes/api.php - Rutas de la aplicación

docker-compose.yml - Configuración de Docker

README.md - Este archivo

✅ Funcionalidades principales

Autenticación de usuarios

CRUD de tareas

Filtrado de tareas por estado

Validaciones de formularios

🧑‍💻 Desarrollado por

Eras, como parte de una prueba técnica.
