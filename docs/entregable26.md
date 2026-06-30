# Entregable 26

**Proyecto:** Laravel From Scratch 2026 — Proyecto final

---

## Episodio 26: Idea Cards

### Resumen

En este episodio se diseñó y construyó la interfaz para listar y visualizar de forma detallada las ideas del usuario mediante componentes de tarjeta (cards) limpios y responsivos.

Para ello:
- Se creó el componente Blade reutilizable `<x-idea.card />` encargado de renderizar cada idea con su título, descripción recortada (`line-clamp-2`), enlaces de referencia, etiquetas de estado coloreadas dinámicamente según su enumeración (`IdeaStatus`) y botones de acción (Ver, Editar, Eliminar).
- Se implementaron las vistas `index.blade.php` (para el listado de ideas en una cuadrícula responsiva) y `show.blade.php` (para la vista detallada de una idea específica, incluyendo sus pasos o tareas completadas/pendientes).
- Se actualizó el controlador `IdeaController` en sus métodos `index()` y `show()` para recuperar las ideas correspondientes al usuario autenticado mediante la relación `Auth::user()->ideas()`.
- Se configuraron y protegieron las nuevas rutas en `routes/web.php` dentro del middleware `auth`, y se redirigió la ruta raíz `/` hacia `/ideas`.
- Se refactorizaron los archivos de estilos de componentes (`btn.css` y `form.css`) utilizando la directiva `@utility` nativa de Tailwind CSS v4 para registrar correctamente las utilidades y botones personalizados.

---

### Conceptos aprendidos

- **Componentes Blade anidados y namespaces:** estructuración de componentes específicos de un módulo mediante la nomenclatura de subcarpetas (ej. `<x-idea.card />` mapeando a `components/idea/card.blade.php`).
- **Recuperación segura de datos relacionales:** recuperación de registros específicos del usuario activo mediante `Auth::user()->ideas()->get()`, asegurando a nivel de base de datos que cada usuario interactúe solo con sus propias ideas.
- **Formateo de fechas relativo con Carbon:** uso de `$idea->created_at->diffForHumans()` para mostrar fechas amigables relativas al tiempo actual (ej. "hace 2 horas").
- **Estilos condicionales y enums en Blade:** aplicación dinámica de clases de Tailwind según el valor de un enum PHP (`IdeaStatus`), tiñendo la etiqueta del estado con el color representativo (`pending` -> amarillo, `in_progress` -> azul, `completed` -> verde, `cancelled` -> rojo).
- **Control de flujos condicionales de colecciones:** uso de `@if ($ideas->isEmpty())` para mostrar estados vacíos interactivos ("No ideas yet") y guiar al usuario a crear contenido.
- **Implementación de `@utility` en Tailwind CSS v4:** adopción de la sintaxis `@utility` en lugar de la combinación clásica de `@apply` sobre clases generales de CSS, permitiendo que Vite y Tailwind compilen clases de utilidad personalizadas más eficientes.
- **Acciones directas y directivas RESTful en Blade:** integración de formularios de eliminación con spoofing de método (`@method('DELETE')`) y confirmaciones de Javascript en el cliente.

---

### Comandos utilizados

```bash
php artisan tinker
npm run dev
```

---

### Archivos modificados o creados

**Vistas y Componentes Blade:**
- `resources/views/components/idea/card.blade.php` [NEW] — componente de tarjeta reutilizable para representar de forma sintética los detalles clave de una idea.
- `resources/views/components/idea/index.blade.php` [NEW] — vista para el listado general de ideas, que renderiza las tarjetas en una cuadrícula responsiva.
- `resources/views/components/idea/show.blade.php` [NEW] — vista de detalle para una idea específica, mostrando información adicional como enlaces externos y la lista de pasos asociados.
- `resources/views/components/layout/layout.blade.php` [MODIFY] — ajuste de espaciado y estructura de la página.

**Controladores y Modelos:**
- `app/Http/Controllers/IdeaController.php` [MODIFY] — actualización de los métodos `index` y `show` para retornar las nuevas vistas e inyectar los datos del usuario.
- `app/Models/User.php` [MODIFY] — importación de la clase `HasMany` y corrección del tipo de retorno en el método de relación `ideas()`.

**Rutas:**
- `routes/web.php` [MODIFY] — redirección de la raíz `/` a `/ideas` y definición de las rutas `/ideas` y `/ideas/{idea}` protegidas por autenticación.

**Estilos (CSS) y Compilación:**
- `resources/css/app.css` [MODIFY] — reordenamiento de los imports de estilos para integrarlos al tema de Tailwind CSS v4.
- `resources/css/components/btn.css` [MODIFY] — refactorización de clases de botones utilizando `@utility` de Tailwind v4.
- `resources/css/components/form.css` [MODIFY] — refactorización de clases de formulario utilizando `@utility` de Tailwind v4.

---

### Evidencia

````carousel
![Listado de ideas del usuario utilizando el componente de tarjeta (Idea Card)](docs/img/ideas_list.png)
````

---

### Problemas encontrados y solución

- **Relaciones con nombres incorrectos o tipos de retorno no importados:** al invocar `ideas()` en el modelo `User`, se arrojaba un error de tipo debido a que `HasMany` no estaba importada con la capitalización adecuada (`hasMany` vs `HasMany`).
  - **Solución:** se importó `Illuminate\Database\Eloquent\Relations\HasMany` en [User.php](file:///home/bob/Github/ISW811/VMs/webserver/sites/isw811.proyect/app/Models/User.php) y se tipó correctamente el método de relación.
- **Configuración de componentes en subcarpetas en Tailwind v4:** al mover los estilos a archivos `@utility`, Tailwind v4 requiere importarlos en un orden específico y asegurar que las fuentes de escaneo estén configuradas en `app.css`.
  - **Solución:** se reordenaron las directivas `@import` en [app.css](file:///home/bob/Github/ISW811/VMs/webserver/sites/isw811.proyect/resources/css/app.css) importando los componentes inmediatamente después de `@import 'tailwindcss'`.

---

### Comentarios personales

El uso de subcarpetas en los componentes de Blade (`components/idea/`) ayuda enormemente a organizar proyectos medianos y grandes, permitiendo agrupar vistas relacionadas lógicamente bajo un namespace intuitivo como `<x-idea.card />`.

La transición a `@utility` en Tailwind CSS v4 es un cambio de paradigma interesante que evita inflar las hojas de estilos finales y encaja de forma más natural con el motor de compilación nativo en Rust de Vite. Además, la facilidad de Eloquent para filtrar colecciones asociadas directamente al usuario autenticado (`Auth::user()->ideas()`) simplifica la seguridad del acceso a datos, garantizando que un usuario no pueda listar ideas ajenas sin autorización explícita.

---

### Apuntes para próximos episodios

Con las vistas de listado y detalle de ideas completadas y estilizadas, el siguiente paso lógico es crear el formulario y controlador correspondientes para permitir a los usuarios crear nuevas ideas de manera visual (`/ideas/create`), validando los datos en el servidor y redirigiendo con notificaciones flash.
