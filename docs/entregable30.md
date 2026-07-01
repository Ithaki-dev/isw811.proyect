# Entregable 30

**Proyecto:** Laravel From Scratch 2026 — Proyecto final

---

## Episodio 30: Construct the idea form

### Resumen

En este episodio se construyó el formulario de ideas tanto para crear como para editar registros, centralizando toda la lógica de inputs en un único componente reutilizable. La meta principal fue evitar duplicación entre ambas pantallas y mantener una estructura consistente para los campos de título, descripción, estado y enlaces.

Para lograrlo:
- Se creó el componente Blade `<x-idea.form />` como base común del formulario de ideas.
- Se diseñó el componente para trabajar en dos modos: creación y edición, detectando si recibe o no una instancia de `Idea` mediante `@props(['idea' => null])`.
- Se definió dinámicamente la URL de envío y el método HTTP correcto según el contexto, usando `POST` para crear y `PATCH` para editar.
- Se reutilizaron los valores previos con `old()` para conservar la información del usuario en caso de errores de validación.
- Se integró el formulario dentro de dos modales separados: uno para crear una nueva idea y otro para editar una existente, manteniendo la misma experiencia visual en ambos casos.

---

### Conceptos aprendidos

- **Reutilización de componentes Blade:** encapsulación de un formulario completo dentro de `<x-idea.form />` para compartir campos, validación visual y comportamiento entre crear y editar.
- **Formularios adaptables por contexto:** uso de una prop opcional (`$idea`) para decidir si el formulario está en modo de creación o de edición.
- **Métodos HTTP en formularios HTML:** aplicación de `@csrf` y `@method('PATCH')` para respetar la semántica de Laravel en operaciones de escritura.
- **Persistencia de valores en validación:** uso de `old('campo', $idea?->campo)` para evitar que el usuario pierda la información capturada cuando el servidor devuelve errores.
- **Listas de enlaces en texto multilínea:** transformación de varios links escritos en un textarea en una colección de enlaces separados por salto de línea.

---

### Comandos utilizados

```bash
npm run dev
```

---

### Archivos modificados o creados

**Vistas y Componentes Blade:**
- `resources/views/components/idea/form.blade.php` [NEW] — componente base reutilizable con los campos del formulario de idea.
- `resources/views/components/idea/create-modal.blade.php` [MODIFY] — integración del formulario en el modal de creación.
- `resources/views/components/idea/edit-modal.blade.php` [MODIFY] — integración del mismo formulario en el modal de edición.

**Controladores:**
- `app/Http/Controllers/IdeaController.php` [MODIFY] — métodos `create()`, `store()`, `edit()` y `update()` conectados al formulario reutilizable.

---

### Evidencia

````carousel
![Formulario para crear una nueva idea](docs/img/new_idea_form.png)
<!-- slide -->
![Formulario para editar una idea existente](docs/img/edit_idea_form.png)
````

---

### Problemas encontrados y solución

- **Duplicación de campos entre crear y editar:** inicialmente cada vista tenía su propio formulario, lo que duplicaba labels, inputs, validación y botones.
  - **Solución:** se extrajo toda la estructura a `<x-idea.form />`, dejando en los modales solo la envoltura visual y la apertura/cierre.
- **Valores vacíos al reabrir el formulario tras una validación fallida:** si el servidor devolvía errores, el usuario podía perder parte de la información escrita.
  - **Solución:** se usaron `old()` en cada campo para restaurar automáticamente el contenido previo del request.
- **Diferencias entre crear y editar:** ambos casos necesitaban la misma interfaz, pero con acciones distintas y un método HTTP diferente.
  - **Solución:** el componente detecta si recibió una `Idea` y ajusta la acción del formulario, el método y el texto del botón en función del contexto.

---

### Comentarios personales

La mejor parte de esta implementación fue comprobar que un formulario bien diseñado puede servir para dos flujos completos sin repetir código. Blade permite construir piezas pequeñas pero muy expresivas, y eso hace que el mantenimiento sea mucho más simple cuando el formulario crece o cambia.

También quedó claro que combinar `old()` con props opcionales es una forma muy limpia de mantener una experiencia consistente para el usuario. El resultado final se siente uniforme tanto al crear como al editar, sin sacrificar claridad en el código.

---

### Apuntes para próximos episodios

Con el formulario de ideas ya unificado, el siguiente paso será fortalecer la experiencia de usuario con validaciones más visibles, mejoras en la interacción de los modales y posibles refinamientos en la gestión de enlaces o campos adicionales de la idea.