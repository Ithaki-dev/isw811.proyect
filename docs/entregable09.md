# Entregable 09: Request Validation en Laravel

## Resumen del Aprendizaje

Hoy se exploró cómo validar datos en Laravel utilizando request validation. La validación es crucial para asegurarse de que los datos enviados por el usuario cumplan con ciertas reglas antes de ser procesados o guardados.

### **1. Validación de Datos en Controladores**

Para validar datos en un controlador, se utiliza el método `validate()` del objeto `Request`. Por ejemplo:

```php
public function store(Request $request)
{
    // Validación de los datos
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required'
    ]);

    // Crear nueva idea
    Idea::create($validatedData);

    // Redirigir a la vista de ideas
    return redirect()->route('ideas.index')->with('success', 'Idea creada con éxito');
}
```

### **2. Componente de Errores en Blade**

Los errores de validación se pueden mostrar en las vistas utilizando el componente `@error` de Laravel. Por ejemplo:

```blade
<!-- resources/views/ideas/create.blade.php -->

<form method="POST" action="{{ route('ideas.store') }}">
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">

        @error('title')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>

        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>
```

### **3. Modelo de Ideas**

El modelo `Idea` se utiliza para interactuar con la base de datos y manipular los datos de las ideas. 

## Capturas

````carousel
![Captura del componente de errores en el formulario](docs/img/error_component.png)
<!-- slide -->
![Captura del modelo de ideas](docs/img/idea_model.png)

## Apuntes para Próximos Episodios

Continuar trabajando en la aplicación implementando nuevas funcionalidades como la validación de datos más compleja, la integración de bases de datos más avanzadas y posiblemente el desarrollo de vistas más detalladas.

