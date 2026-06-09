# Sistema de Gestión de Turnos

Proyecto académico desarrollado para la materia **Sistemas de Información**.

**Instituto Técnico Superior (ITS)**
**Tecnicatura en Análisis y Desarrollo de Sistemas de Información**
**3° Año - 1° Cuatrimestre**

## Descripción

Aplicación web desarrollada en PHP para la gestión de turnos de una peluquería.

Permite:

* Consultar los profesionales disponibles.
* Visualizar horarios disponibles.
* Reservar turnos.
* Registrar reservas en una base de datos MySQL.
* Evitar reservas duplicadas para un mismo horario.

## Tecnologías utilizadas

* PHP 8+
* MySQL
* Bootstrap 5
* Composer
* phpdotenv

## Requisitos

* PHP 8 o superior
* Composer
* MySQL
* XAMPP, Laragon o entorno equivalente

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/fitksh/Gestor-de-Turnos
cd Gestor-de-Turnos
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Configurar variables de entorno

Copiar el archivo:

```text
.env.example
```

y renombrarlo a:

```text
.env
```

Completar los datos de conexión según la configuración local.

Ejemplo:

```env
HOST=localhost
DB_NAME=peluqueria_db
USERNAME=root
PASSWORD=
PORT=3306
```

### 4. Crear la base de datos

Crear una base de datos llamada:

```sql
peluqueria_db
```

e importar el script SQL incluido en:

```text
database/peluqueria_db.sql
```

### 5. Iniciar MySQL

Verificar que el servicio MySQL se encuentre en ejecución.

Por defecto:

```text
Host: localhost
Puerto: 3306
```

### 6. Ejecutar la aplicación

Desde la raíz del proyecto:

```bash
php -S localhost:8000
```

### 7. Acceder desde el navegador

```text
http://localhost:8000
```

## Estructura del proyecto

```text
config/
controllers/
models/
views/
vendor/

index.php
composer.json
composer.lock
.env.example
```
