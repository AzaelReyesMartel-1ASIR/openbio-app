# 🚀 OpenBio - Tu ecosistema de enlaces en un solo lugar

OpenBio es una aplicación Full Stack desarrollada con **Laravel 11**, **Tailwind CSS** y **Docker**. Permite a los usuarios centralizar su presencia online mediante una página de perfil personalizada, similar a Linktree, pero con control total sobre los datos y las analíticas.

<img width="944" height="1026" alt="image" src="https://github.com/user-attachments/assets/d8d35702-a524-42b5-9d09-83a575f6ec03" />
<img width="955" height="903" alt="image" src="https://github.com/user-attachments/assets/0a28bcf2-90ff-462d-a93a-4b67242c93ff" />
<img width="941" height="527" alt="image" src="https://github.com/user-attachments/assets/55cdcd5c-c488-4ecc-86b0-b78f4d9e41cb" />
<img width="958" height="949" alt="image" src="https://github.com/user-attachments/assets/fb376a7d-e026-47e2-bd03-2197d168bc10" />
<img width="959" height="1010" alt="image" src="https://github.com/user-attachments/assets/3067eff4-5d6b-4aa6-955c-c79ff6936841" />

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
