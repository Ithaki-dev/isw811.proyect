# Entregable 11: A Brief DaisyUI Detour

## Resumen del Aprendizaje

Hoy se exploró cómo usar DaisyUI, un conjunto de componentes de interfaz de usuario gratuitos y de código abierto, para mejorar la apariencia del proyecto. DaisyUI facilita el diseño responsivo y moderno sin necesidad de escribir CSS personalizado.

### **1. Instalación de DaisyUI**

Para instalar DaisyUI en tu proyecto Laravel, puedes utilizar un CDN (Content Delivery Network). Aquí hay un ejemplo de cómo hacerlo:

```html
<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Link a DaisyUI via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- Contenido de la aplicación -->
</body>
</html>
```

### **2. Uso de DaisyUI para Mejorar la Apariencia**

Puedes utilizar los componentes de DaisyUI en tus vistas Blade para mejorar la apariencia del proyecto. Por ejemplo:

```blade
<!-- resources/views/ideas/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Ideas</h1>

        @foreach ($ideas as $idea)
            <div class="card bg-base-100 shadow-lg mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $idea->title }}</h2>
                    <p>{{ $idea->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
```

## Capturas

### **Captura 1: Inclusión de DaisyUI via CDN en `resources/views/layout.blade.php`**

![CDN de DaisyUI](docs/img/cdn.png)

### **Captura 2: Apariencia mejorada del proyecto utilizando DaisyUI en `resources/views/ideas/index.blade.php`**

![Apariencia con DaisyUI](docs/img/daisy.png)

## Archivos Modificados

- `resources/views/layouts/layout.blade.php`
- `resources/views/ideas/navbar.blade.php`

## Apuntes para Próximos Episodios

Continuar trabajando en la aplicación implementando nuevas funcionalidades como la validación de datos más compleja, la integración de bases de datos más avanzadas y posiblemente el desarrollo de vistas más detalladas.
