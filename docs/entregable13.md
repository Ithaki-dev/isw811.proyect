# Entregable 13: Require Authentication with Middlewares

## Resumen del Aprendizaje

Hoy se exploró cómo usar middlewares en Laravel para controlar el acceso a las rutas, asegurando que solo los usuarios autenticados puedan acceder a ciertas partes de la aplicación. Además, se aprendió cómo redirigir a los usuarios no autenticados a una página de inicio de sesión.

### **1. Creación y Configuración del Middleware**

Puedes crear un nuevo middleware utilizando Artisan CLI:

```bash
php artisan make:middleware EnsureUserIsAdmin
```

Este comando generará un archivo `EnsureUserIsAdmin.php` en la carpeta `app/Http/Middleware`.

Dentro de este archivo, puedes definir las reglas de acceso:

```php
// app/Http/Middleware/EnsureUserIsAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
```

### **2. Uso del Middleware en Rutas**

Puedes aplicar el middleware a rutas específicas en tu archivo `routes/web.php`:

```php
// routes/web.php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('/ideas', IdeaController::class);
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});
```

## Capturas

### **Captura 1: Configuración del Middleware (`app/Http/Middleware/EnsureUserIsAdmin.php`)**

![Configuración del Middleware](docs/img/middleware.png)

### **Captura 2: Uso de Middlewares en Rutas (`routes/web.php`)**

![Uso de Middlewares en Rutas](docs/img/idea_middleware.png)

## Archivos Modificados

- `app/Http/Middleware/EnsureUserIsAdmin.php`
- `app/Http/Kernel.php`
- `routes/web.php`

## Apuntes para Próximos Episodios

Continuar trabajando en la aplicación implementando nuevas funcionalidades como roles y permisos más complejos, notificaciones y posiblemente el desarrollo de vistas más detalladas.