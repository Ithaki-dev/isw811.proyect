# Entregable 08: Controladores en Laravel

## Resumen del Aprendizaje

Hoy se profundizó en la comprensión y el uso de controladores en Laravel. Los controladores son componentes clave que gestionan las solicitudes entrantes, interactúan con los modelos y retornan respuestas al usuario a través de vistas.

### **1. Creación del Controlador**

Un controlador puede ser creado utilizando Artisan CLI. Por ejemplo:

```bash
php artisan make:controller IdeaController
```

Esto generará un archivo `IdeaController.php` en la carpeta `app/Http/Controllers`.

### **2. Métodos de Controlador**

Los métodos de controlador corresponden a las acciones que se pueden realizar, como mostrar formularios (`create`), procesar formularios (`store`), listar recursos (`index`), etc.

#### **Método Create**

El método `create` generalmente se utiliza para mostrar el formulario de creación de un nuevo recurso:

```php
public function create()
{
    return view('ideas.create');
}
```

Este método retorna una vista que contiene el formulario de entrada de datos.

#### **Método Store**

El método `store` maneja la lógica de almacenamiento de los datos enviados desde el formulario:

```php
public function store(Request $request)
{
    // Validación de los datos
    $request->validate([
        'idea' => 'required|max:255',
    ]);

    // Crear nueva idea
    Idea::create($request->all());

    // Redirigir a la vista de ideas
    return redirect()->route('ideas.index')->with('success', 'Idea creada con éxito');
}
```

### **3. Enrutamiento**

Las rutas son enlazadas con los métodos del controlador. Por ejemplo, para crear una nueva idea:

```php
Route::get('/ideas/create', [IdeaController::class, 'create'])->name('ideas.create');
Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
```

Estas rutas permiten que el usuario acceda a la vista de creación (`/ideas/create`) y envíe los datos al servidor para crear una nueva idea (`/ideas`).

## Capturas

### **Captura 1: Archivo de Controlador `app/Http/Controllers/IdeaController.php`**

![Archivo de Controlador](docs/img/controller.png)

### **Captura 2: Archivo de Rutas `routes/web.php`**

![Archivo de Rutas](docs/img/routes_controllers.png)

## Apuntes para Próximos Episodios

Continuar trabajando en la aplicación implementando nuevas funcionalidades como autenticación de usuarios, manejo de sesiones, y posiblemente integrar una base de datos más compleja.