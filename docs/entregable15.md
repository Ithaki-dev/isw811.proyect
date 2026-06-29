# Entregable 15

Proyecto 1: Laravel From Scratch 2026

## Episodio 15: Authorization Using Gates

### Resumen breve
En este episodio se implementó el sistema de autorización utilizando Gates en Laravel. Se aprendió a definir reglas de acceso para proteger ciertas partes de la aplicación, permitiendo diferenciar qué acciones puede realizar un usuario autenticado. Se enfocó en cómo restringir el acceso a áreas sensibles, como el panel de administración, basándose en permisos específicos en lugar de solo verificar si el usuario ha iniciado sesión.

Se practicó la creación de Gates en el `AppServiceProvider` y su aplicación en las rutas y las vistas, asegurando que solo los usuarios con los privilegios adecuados puedan visualizar o interactuar con ciertas funcionalidades, lo cual es fundamental para la seguridad de cualquier aplicación web.

### Comandos utilizados
- `php artisan make:gate AdminAccess` para crear la puerta de autorización de administrador.

### Archivos modificados o creados
- `app/Providers/AppServiceProvider.php`
- `routes/web.php`
- `resources/views/admin/dashboard.blade.php`

### Evidencia
````carousel
![Captura de acceso a App Service](docs/img/app_service.png)
<!-- slide -->
![Captura de acceso a panel de Admin](docs/img/admin.png)
````

### Problemas encontrados y solucion
- Una confusión común es mezclar autenticación con autorización. Se aclaró que la autenticación responde a "¿Quién eres?" (Login), mientras que la autorización (Gates) responde a "¿Qué tienes permitido hacer?".
- Se identificó que las Gates deben ser registradas correctamente en el `AuthServiceProvider` para que Laravel pueda evaluarlas en toda la aplicación.

### Comentarios personales
Las Gates son una herramienta muy potente y limpia. Me parece una excelente forma de centralizar la lógica de permisos, evitando llenar los controladores con múltiples validaciones `if (auth()->user()->isAdmin())` y permitiendo que el código sea mucho más escalable.

## Apuntes para proximos episodios
Seguir agregando una seccion nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.