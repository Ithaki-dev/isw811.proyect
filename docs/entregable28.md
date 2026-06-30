# Entregable 28

**Proyecto:** Laravel From Scratch 2026 — Proyecto final

---

## Episodio 28: Show a single idea

### Resumen

En este episodio se implementó la vista de detalle para una idea específica (`/ideas/{idea}`), permitiendo a los usuarios consultar toda la información asociada a una idea, incluyendo sus datos básicos (título, descripción, creador y fecha de publicación), etiquetas de estado, enlaces externos y el listado de pasos o tareas requeridos con su respectivo estado de completado.

Para lograrlo:
- Se actualizó el controlador `IdeaController` en su método `show()` para resolver el modelo `Idea` y retornar la vista de detalles del recurso.
- Se configuró la ruta `/ideas/{idea}` en `routes/web.php` utilizando el enlace a modelos implícito (Route Model Binding) de Laravel.
- Se diseñó la vista `show.blade.php` bajo `components.idea`, integrando el diseño general `<x-layout>` y estructurando las secciones de metadatos, enlaces interactivos, la lista visual de tareas (steps) y el formulario con los botones de acción para editar y eliminar la idea.
- Se modificó el componente de tarjeta `<x-idea.card />` para hacer que el título de la idea sea un enlace interactivo hacia su vista detallada.

---

### Conceptos aprendidos

- **Enlace a modelos implícito (Route Model Binding):** inyección automática de la instancia del modelo `Idea` directamente en el método `show(Idea $idea)` del controlador a partir del parámetro `{idea}` de la ruta de Laravel.
- **Renderizado de metadatos relacionales:** acceso seguro a los campos de tablas relacionadas mediante Eloquent (por ejemplo, `$idea->user->name` y `$idea->created_at->diffForHumans()`).
- **Listado dinámico y condicional de relaciones:** renderizado condicional de enlaces (`$idea->links`) y pasos (`$idea->steps`) haciendo uso de las directivas `@if` y `@foreach` de Blade.
- **Estilos de completitud para tareas (Steps):** tachado y cambio de color condicional utilizando clases de Tailwind CSS basadas en el estado booleano de la tarea (`$step->completed ? 'line-through text-slate-400' : 'text-slate-600'`).
- **Navegación contextual y enlaces amigables:** habilitación de hipervínculos de retorno ("← Back to ideas") y enlaces en títulos para mejorar la fluidez de navegación del usuario.

---

### Comandos utilizados

```bash
npm run dev
```

---

### Archivos modificados o creados

**Vistas y Componentes Blade:**
- `resources/views/components/idea/show.blade.php` [NEW] — estructura visual detallada de una idea específica, incluyendo metadatos, links, lista de pasos y botones de edición/eliminación.
- `resources/views/components/idea/card.blade.php` [MODIFY] — conversión del título de la tarjeta en un enlace hacia la vista detallada de la idea.

**Controladores:**
- `app/Http/Controllers/IdeaController.php` [MODIFY] — implementación del método `show(Idea $idea)` para retornar la vista correspondiente inyectando el modelo.

**Rutas:**
- `routes/web.php` [MODIFY] — definición de la ruta de consulta detallada `/ideas/{idea}` con soporte de Route Model Binding y middleware de autenticación.

---

### Evidencia

````carousel
![Vista de detalle de una idea (Single Idea View)](docs/img/single_idea.png)
<!-- slide -->
![Rutas registradas y su comportamiento para visualizar ideas](docs/img/single_route.png)
````

---

### Problemas encontrados y solución

- **Consulta de relaciones y excepciones en caso de IDs inexistentes:** si un usuario intenta acceder a una idea que no existe introduciendo un ID no válido en la URL (ej. `/ideas/999`), Laravel podría arrojar un error de excepción genérico o intentar acceder a propiedades sobre `null`.
  - **Solución:** se utilizó `Idea::findOrFail($idea->id)` en el controlador (o en su defecto el enlace automático de Laravel) para garantizar que si el recurso no es encontrado en la base de datos se retorne automáticamente un código de respuesta HTTP `404 Not Found`.
- **Renderizado de enlaces vacíos:** si una idea no tiene links registrados en su arreglo JSON de la base de datos, pintar el contenedor vacío dañaba el espaciado de la interfaz.
  - **Solución:** se envolvió el bloque bajo la condicional `@if ($idea->links->count())` para asegurar que el título y la lista de enlaces solo se muestren si existen elementos en la colección.

---

### Comentarios personales

El uso de Route Model Binding en Laravel hace que el desarrollo de APIs y aplicaciones web sea sumamente veloz y limpio. Delegar la resolución del modelo directamente a la definición de la ruta evita tener que escribir código repetitivo de búsqueda e inicialización en cada método del controlador.

Por otro lado, la estructura del componente de vista detallada (`show.blade.php`) permite visualizar la versatilidad de Tailwind CSS para crear interfaces de aspecto muy profesional. Por ejemplo, marcar visualmente los pasos completados utilizando clases como `line-clamp` y estados condicionales como `line-through` añade un dinamismo excelente con mínimo esfuerzo de código.

---

### Apuntes para próximos episodios

Con la capacidad de listar, filtrar y mostrar el detalle de ideas específicas, el siguiente paso será completar las acciones de escritura de datos: el formulario de creación (`/ideas/create`) y el de edición (`/ideas/{idea}/edit`), permitiendo a los usuarios gestionar el ciclo de vida completo de sus ideas de forma dinámica.
