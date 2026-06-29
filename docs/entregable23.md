# Entregable 23

**Proyecto:** Laravel From Scratch 2026 — Proyecto final

---

## Episodio 23: Tailwind Theme Setup

### Resumen

En este episodio se configuró y personalizó el tema visual de la aplicación utilizando Tailwind CSS, definiendo una paleta de colores coherente y tipografías personalizadas en el archivo de estilos. Se crearon componentes de CSS reutilizables para botones y formularios mediante la directiva `@apply` de Tailwind.

Además, se implementó el flujo completo de autenticación de usuarios (registro, inicio y cierre de sesión). Para ello, se crearon las vistas de login y registro utilizando el diseño personalizado, se definieron las rutas correspondientes protegidas por los middlewares `guest` y `auth`, y se desarrollaron los controladores `RegisterUserController` y `SessionController` para gestionar la validación de datos, la creación de usuarios con contraseñas encriptadas mediante `Hash::make()` y el manejo de sesiones en la aplicación.

---

### Conceptos aprendidos

- **Personalización del tema en Tailwind CSS v4:** uso de la directiva `@theme` en `app.css` para configurar variables de color (`primary`, `border`, `card`, etc.) y la tipografía base (`Instrument Sans`).
- **Componentes CSS con Tailwind `@apply`:** modularización de estilos mediante archivos independientes (`btn.css` y `form.css`) importados en el archivo de estilos principal, usando `@apply` para crear clases de utilidad semánticas y legibles.
- **Flujo de autenticación completo:** registro e inicio de sesión integrando validaciones robustas y redirecciones condicionales en Laravel.
- **Seguridad en almacenamiento de contraseñas:** uso del helper `Hash::make()` para almacenar hashes seguros en lugar de texto plano en la base de datos.
- **Protección de rutas mediante middlewares:** restricción de acceso a las rutas de autenticación utilizando los middlewares integrados `guest` (para restringir accesos a usuarios ya autenticados) y `auth` (para asegurar rutas que requieren sesión activa, como el cierre de sesión).
- **Manejo y ciclo de vida de sesiones:** regeneración del ID de sesión (`regenerate()`) e invalidación de la misma (`invalidate()`, `regenerateToken()`) para evitar ataques de fijación de sesión durante el login y logout.
- **Componentes Blade estructurados:** creación de un diseño base (`<x-layout>`) y componentes auxiliares como la barra de navegación (`<x-layout.navbar>`) para organizar de forma modular el marcado común de la aplicación.

---

### Comandos utilizados

```bash
php artisan make:controller RegisterUserController
php artisan make:controller SessionController
npm run dev
```

---

### Archivos modificados o creados

**Controladores:**
- `app/Http/Controllers/RegisterUserController.php` [NEW] — controlador encargado de mostrar el formulario de registro, validar los datos de entrada y crear un nuevo usuario.
- `app/Http/Controllers/SessionController.php` [NEW] — controlador encargado de gestionar el inicio de sesión, verificar las credenciales y procesar el cierre de sesión (logout).

**Estilos y Configuración de Tema (CSS):**
- `resources/css/app.css` [MODIFY] — definición del tema y variables personalizadas, así como la importación de las hojas de estilos de los componentes.
- `resources/css/components/btn.css` [NEW] — estilos para botones personalizados (`.btn-primary`, `.btn-secondary`, `.btn-ghost`, etc.) mediante `@apply`.
- `resources/css/components/form.css` [NEW] — clases de formulario personalizadas (`.form-group`, `.form-label`, `.form-input`, `.form-card`, etc.).

**Vistas y Plantillas Blade:**
- `resources/views/components/layout/layout.blade.php` [NEW] — estructura general HTML de la página web que sirve de base para el resto de vistas de la aplicación.
- `resources/views/components/layout/navbar.blade.php` [NEW] — componente de la barra de navegación que muestra enlaces contextuales dependiendo del estado de autenticación del usuario.
- `resources/views/auth/login.blade.php` [NEW] — vista para el formulario de inicio de sesión de usuarios.
- `resources/views/auth/register.blade.php` [NEW] — vista para el formulario de registro de nuevos usuarios.
- `resources/views/welcome.blade.php` [MODIFY] — página de bienvenida adaptada para hacer uso del nuevo layout base.

**Rutas:**
- `routes/web.php` [MODIFY] — definición de las rutas de login, register y logout con sus respectivos middlewares de grupo (`guest` y `auth`).

---

### Evidencia

````carousel
![Formulario de inicio de sesión con el nuevo tema visual](docs/img/login_page.png)
<!-- slide -->
![Flujo de rutas y comportamiento del login/registro](docs/img/login_route.png)
````

---

### Problemas encontrados y solución

- **Protección de rutas de autenticación:** se debieron agrupar las rutas correctamente bajo los middlewares `guest` y `auth` para evitar que un usuario autenticado acceda a la vista de login, o que un invitado intente hacer logout.
  - **Solución:** se aplicaron los métodos `Route::middleware('guest')->group(...)` y `Route::middleware('auth')->group(...)` en `routes/web.php`.
- **Estilos de componentes en Tailwind v4:** la nueva versión de Tailwind CSS maneja la configuración del tema de forma distinta (directiva `@theme` en CSS en lugar de un archivo de configuración JS separado).
  - **Solución:** se definieron las variables del tema de forma nativa directamente en `resources/css/app.css` y se utilizaron los modificadores `@source` para indicar las rutas de búsqueda de clases utilitarias de Tailwind.
- **Validación y errores en la interfaz:** mostrar los mensajes de error de forma clara cuando falla el inicio de sesión o la creación del usuario.
  - **Solución:** se agregó la condicional `@if ($errors->any())` y se aplicó la clase condicional `.form-input-error` para resaltar de manera dinámica el input con fallos de validación.

---

### Comentarios personales

La transición a Tailwind v4 y la configuración del tema directamente en el archivo CSS resulta sumamente limpia y simplificada en comparación con las configuraciones anteriores en archivos JS. Definir las variables de CSS en `@theme` permite que se integren de inmediato y puedan ser consumidas en todo el proyecto.

Por otro lado, la división de los estilos de los componentes en subcarpetas de CSS (`btn.css` y `form.css`) combinada con la directiva `@apply` de Tailwind ayuda a mantener el HTML mucho más limpio, evitando cadenas interminables de clases utilitarias en los botones y formularios comunes. Finalmente, implementar el flujo de autenticación de forma nativa en Laravel ayuda a comprender a fondo la gestión de sesiones, la encriptación de contraseñas y cómo interactúan los middlewares de seguridad (`guest` y `auth`) para resguardar la aplicación.

---

### Apuntes para próximos episodios

Con el sistema de autenticación funcionando y el diseño visual base establecido, el próximo paso será integrar el backend de las ideas con esta nueva interfaz de usuario, permitiendo que las acciones de creación, visualización, edición y eliminación de ideas estén asociadas directamente a los usuarios autenticados, y asegurando las acciones correspondientes a través de políticas de autorización (Policies).
