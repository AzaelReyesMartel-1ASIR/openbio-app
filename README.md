# 🚀 OpenBio - Tu ecosistema de enlaces en un solo lugar

OpenBio es una aplicación Full Stack desarrollada con **Laravel 11**, **Tailwind CSS** y **Docker**. Permite a los usuarios centralizar su presencia online mediante una página de perfil personalizada, similar a Linktree, pero con control total sobre los datos y las analíticas.

<img width="954" height="808" alt="image" src="https://github.com/user-attachments/assets/9a445b95-18e5-4a78-82a5-36b962acb326" />
<img width="958" height="827" alt="image" src="https://github.com/user-attachments/assets/84296dc8-21c5-4a04-874c-b215cd02b887" />
<img width="958" height="684" alt="image" src="https://github.com/user-attachments/assets/efcc3c37-0493-4432-b289-c60af4eda8a5" />


## ✨ Características principales

* **Gestión de Enlaces (CRUD):** Crea, edita y organiza tus enlaces de redes sociales o proyectos.
* **Identidad Visual:** Sube y gestiona tu propia foto de perfil personalizada.
* **Analíticas en Tiempo Real:** Contador de clics integrado para medir el impacto de cada enlace.
* **Diseño Responsive:** Interfaz optimizada para dispositivos móviles.
* **Panel de Administración:** Gestión segura de tu perfil mediante autenticación protegida.



## 🛠️ Tecnologías utilizadas

* **Backend:** PHP 8.2+ & Laravel 11.
* **Frontend:** Blade Templates & Tailwind CSS.
* **Base de Datos:** MySQL.
* **Entorno:** Docker & Docker Compose.
* **Autenticación:** Laravel Breeze.

## 🚀 Instalación y uso (Local)

Para levantar el proyecto en tu entorno local usando Docker:

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/AzaelReyesMartel-1ASIR/openbio-app.git](https://github.com/AzaelReyesMartel-1ASIR/openbio-app.git)
    cd openbio-app
    ```

2.  **Levantar los contenedores:**
    ```bash
    docker-compose up -d
    ```

3.  **Configuración inicial:**
    *(Ejecuta estos comandos para preparar la base de datos y los archivos)*
    ```bash
    docker-compose exec app composer install
    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan migrate
    docker-compose exec app php artisan storage:link
    ```

4.  **Acceso:**
    Visita [http://localhost:8090](http://localhost:8090) en tu navegador.

## 📈 Próximas Mejoras (Roadmap)
- [ ] Implementación de temas visuales dinámicos.
- [ ] Integración con almacenamiento en la nube para persistencia de imágenes.
- [ ] Panel de estadísticas avanzadas con gráficas.

---
Creado por [Azael Reyes](https://github.com/AzaelReyesMartel-1ASIR)
