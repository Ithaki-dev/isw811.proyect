# Entregable 12: Authentication Explained

## Resumen del Aprendizaje

Hoy se exploró cómo implementar la autenticación en Laravel, incluyendo el registro de usuarios, la validación de datos, el inicio de sesión y los cierres de sesión. Laravel proporciona una serie de herramientas y funciones que facilitan este proceso.

### **1. Configuración de Autenticación**

Puedes configurar la autenticación en tu proyecto Laravel utilizando Artisan CLI:

```bash
php artisan make:auth
```

Este comando generará las vistas, rutas, controladores y migraciones necesarias para la autenticación.

### **2. Registro de Usuarios**

Para registrar usuarios, puedes utilizar el método `create()` del controlador `RegisterController`. Aquí hay un ejemplo:

```php
// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
```

### **3. Inicio de Sesión**

Para el inicio de sesión, puedes utilizar el método `login()` del controlador `LoginController`. Aquí hay un ejemplo:

```php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
```

### **4. Cierre de Sesión**

El cierre de sesión se maneja automáticamente con el método `logout()` proporcionado por Laravel.

## Capturas

````carousel
![Página de Inicio de Sesión](docs/img/login_page.png)
<!-- slide -->
![Rutas de Autenticación](docs/img/login_route.png)
````

## Archivos Modificados

- `app/Http/Controllers/Auth/RegisterController.php`
- `app/Http/Controllers/Auth/LoginController.php`
- `resources/views/auth/register.blade.php`
- `resources/views/auth/login.blade.php`

## Apuntes para Próximos Episodios

Continuar trabajando en la aplicación implementando nuevas funcionalidades como roles y permisos, notificaciones y posiblemente el desarrollo de vistas más detalladas.