# Prueba Adoclic  Laravel API
Esta aplicación Laravel API se creó como parte de la prueba técnica para Adoclic. A continuación, se detallan los pasos para ejecutar la aplicación.

## Requisitos previos
    - Tener composer instalado.
    - servidor web como: XAMPP, WAMMP o LARAGON(en mi caso use este servidor local).

## Pasos para ejecutar la aplicación

### 1. Clonar el repositorio
    - git clone ACA TENGO QUE INCORPORAR LA URL
    - cd prueba-adoclic-laravel

### 2. Instalar dependencias
    - composer install

### 3. Configurar el archivo .env
    - Copiar el archivo `.env.example` a `.env` y configurar la conexión a la base de datos

### 4. Crear la base de datos
    - Importar la estructura de la base de datos desde el archivo SQL proporcionado en la carpeta `database`:
        * prueba_adoclic/database/prueba_adoclic.sql

### 5. Ejecutar migraciones
    - php artisan migrate

### 6. Levantar el proyecto
    - php artisan serve

### 7. Pueden proceder a probar:
    ### a. Seeders: prueba_adoclic/database/seeders/CategoriesTableSeeder.php
    ### b. Api:
            - Importación de datos desde el servicio: http://localhost:(PUERTO VARIA SEGUN NUESTRA ELECCION)/import-data
            - Consulta por categoría: http://127.0.0.1:(PUERTO VARIA SEGUN NUESTRA ELECCION)/api/getDataByCategory/(Security/Animals segun corresponda)
    ### c. Pruebas Unitarias
