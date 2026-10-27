# myclegalgroup.com – Plataforma Web y Panel de Administración Jurídica

> **DIMO – Defensa, Investigación y Metodologías Operacionales**  
> Portal web corporativo de alta precisión legal y panel de administración integral (AdminLTE 3) para la gestión de contenidos, áreas de práctica, equipo de abogados, bandeja de consultas y control de accesos.

---

## 🚀 Requisitos del Servidor

* **PHP:** >= 8.2 (Recomendado PHP 8.3)
  * Extensiones requeridas: `pdo`, `pdo_sqlite` (o `pdo_mysql`), `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`, `curl`
* **Composer:** >= 2.x
* **Node.js & NPM:** >= 18.x (para compilar assets con Vite/Tailwind)
* **Base de Datos:** SQLite (predeterminado y listo para usar) o MySQL/MariaDB / PostgreSQL
* **Servidor Web:** Nginx o Apache (con módulo `mod_rewrite` habilitado)

---

## 🛠️ Guía de Despliegue en un Nuevo Servidor

### 1. Clonar el Repositorio
```bash
git clone https://github.com/caprietoj/dimo.git
cd dimo
```

---

### 2. Instalar Dependencias de Backend (PHP)
En entorno de producción:
```bash
composer install --no-dev --optimize-autoloader
```
*(Si es un entorno de desarrollo local, ejecute simplemente `composer install`)*

---

### 3. Configurar el Archivo de Entorno (`.env`)
Copie el archivo de plantilla `.env.example`:
```bash
cp .env.example .env
```

Genere la clave criptográfica de la aplicación:
```bash
php artisan key:generate
```

Edite las variables principales en `.env` según su servidor:
```ini
APP_NAME="myclegalgroup.com"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://su-dominio.com

# Base de datos (Por defecto SQLite)
DB_CONNECTION=sqlite

# Si prefiere usar MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=dimo_db
# DB_USERNAME=dimo_user
# DB_PASSWORD=su_contraseña_segura
```

---

### 4. Preparar la Base de Datos y Ejecutar Migraciones con Seeders

#### Si usa SQLite (Recomendado para inicio rápido):
Cree el archivo de base de datos vacío si aún no existe:
```bash
# En Linux / macOS / Bash:
touch database/database.sqlite

# En Windows PowerShell:
New-Item -ItemType File -Path database/database.sqlite -Force
```

#### Ejecutar Migraciones:
```bash
php artisan migrate --force
```

#### Ejecutar el Seeder de Contenido Completo del Sitio:
Este seeder inicializa todos los roles, áreas de práctica, abogados, textos personalizables y crea el usuario administrador por defecto:
```bash
php artisan db:seed --class=SiteContentSeeder --force
```
*(O de forma general `php artisan db:seed --force`)*

---

### 5. Compilar los Assets Frontend (Vite & Tailwind)
```bash
npm install
npm run build
```

---

### 6. Configurar Enlace Simbólico de Almacenamiento y Permisos

Cree el enlace para archivos subidos e imágenes:
```bash
php artisan storage:link
```

Asigne los permisos de escritura necesarios al servidor web (`www-data`, `nginx` o `apache`):
```bash
# En servidores Linux (Ubuntu/Debian):
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

---

### 7. Optimización de Producción (Caché de Rutas, Vistas y Configuración)
Para asegurar el máximo rendimiento y respuesta rápida en producción:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🔐 Credenciales de Acceso al Panel de Administración

Una vez desplegado y ejecutado el seeder, acceda al panel en:
* **URL:** `https://su-dominio.com/login` o `https://su-dominio.com/admin`
* **Correo Electrónico:** `admin@dimo.com`
* **Contraseña:** `admin123`

> ⚠️ **Recomendación de Seguridad:** Inmediatamente después del primer ingreso, ingrese al módulo **Seguridad y Accesos > Usuarios**, seleccione su cuenta y cambie la contraseña por una clave segura y robusta.

---

## 🌐 Configuración del Servidor Web

### Configuración Nginx (Ejemplo)
```nginx
server {
    listen 80;
    server_name su-dominio.com;
    root /var/www/dimo/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### Configuración Apache
Asegúrese de apuntar el `DocumentRoot` a la carpeta `/public` del proyecto y habilitar `mod_rewrite`:
```bash
sudo a2enmod rewrite
```

---

## 📦 Estructura de Módulos del Sistema

* **Front-End Público:**
  * `Inicio`: Hero institucional, pilares normativos, Método DIMO, canal de debate jurídico.
  * `Nuestra Firma`: Historia institucional, propuesta de valor, equipo legal directivo, misión y visión.
  * `Estrategias y Soluciones`: Portafolio interactivo de especialidades jurídicas y servicios corporativos.
  * `Consultoría de Alto Nivel`: Formulario de recepción y radicación de solicitudes de asesoría.
* **Panel de Administración (AdminLTE):**
  * `Tablero de Control`: Métricas operativas en tiempo real.
  * `Personalizar Web (100%)`: Editor de contenido dinámico para textos, citas, imágenes y métricas.
  * `Áreas de Práctica`: CRUD para crear y editar especialidades del despacho.
  * `Equipo Legal`: Gestión de abogados, cargos, citas y fotografías.
  * `Consultas Legales`: Bandeja de entrada y seguimiento a mensajes ciudadanos y corporativos.
  * `Seguridad y Accesos`: Creación y edición de usuarios, roles, perfiles y cambio de contraseñas.

---

## 📄 Licencia y Derechos
© 2026 DIMO - Defensa, Investigación y Metodologías Operacionales. Todos los derechos reservados.
