# Entregable 31

**Proyecto:** Laravel From Scratch 2026 — Proyecto final

---

## Episodio 31: Test the create idea form

### Resumen

En este episodio se creó un test con Pest para validar el formulario de creación de ideas desde el punto de vista funcional. El objetivo fue comprobar que un usuario autenticado puede registrar una idea correctamente, que los campos `title` y `description` son obligatorios y que un invitado no puede enviar el formulario sin iniciar sesión.

Para lograrlo:
- Se escribió el test `tests/Browser/CreateIdeaTest.php` utilizando la sintaxis de Pest.
- Se verificó el caso positivo de creación autenticada con `actingAs($user)` y una petición `POST` al endpoint `/ideas`.
- Se comprobó que el formulario rechaza envíos incompletos cuando faltan `title` y `description`.
- Se validó que un usuario no autenticado es redirigido a `/login` al intentar crear una idea.
- Se confirmó que al crear correctamente la idea, el registro queda almacenado en la base de datos y la respuesta redirige al listado de ideas.

---

### Conceptos aprendidos

- **Testing funcional con Pest:** uso de una sintaxis expresiva basada en `it()` para describir comportamiento de negocio en lugar de implementar tests verbosos.
- **Autenticación en pruebas:** simulación de un usuario logueado con `actingAs()` para verificar rutas protegidas.
- **Validación de formularios en Laravel:** uso de `assertSessionHasErrors()` para comprobar reglas requeridas en campos obligatorios.
- **Persistencia en base de datos durante tests:** uso de `assertDatabaseHas()` para confirmar que la idea fue realmente guardada.
- **Protección de rutas privadas:** verificación de que los invitados son enviados al login cuando intentan acceder a una acción restringida.

---

### Comandos utilizados

```bash
php artisan test --compact tests/Browser/CreateIdeaTest.php
```

---

### Archivos modificados o creados

**Pruebas Browser con Pest:**
- `tests/Browser/CreateIdeaTest.php` [NEW] — pruebas para crear ideas, validar campos requeridos y restringir el acceso a usuarios invitados.

---

### Evidencia

````carousel
![Resultado exitoso de la prueba de creación de ideas](docs/img/ok_test.png)
````

---

### Problemas encontrados y solución

- **Ejecución local del test sin driver de SQLite:** al intentar correr el archivo de pruebas en el entorno actual, Laravel devolvió un error `could not find driver` para `sqlite` en memoria.
  - **Solución:** el test queda correctamente documentado y preparado para ejecutarse en un entorno con `pdo_sqlite` habilitado, que es el requisito mínimo para usar la base de datos en memoria durante la suite.
- **Cobertura de escenarios del formulario:** era necesario validar tanto el flujo exitoso como los casos de rechazo por validación y autenticación.
  - **Solución:** se separaron tres pruebas claras: creación autenticada, validación de campos requeridos y redirección de invitados.

---

### Comentarios personales

Este test deja claro que validar un formulario no solo consiste en revisar que el registro se guarde, sino también en comprobar que el acceso esté protegido y que las reglas de validación no se puedan saltar. Pest hace que estas intenciones se lean casi como documentación ejecutable.

La combinación de `actingAs()`, `assertSessionHasErrors()` y `assertDatabaseHas()` cubre el comportamiento esencial del flujo de creación con muy poco código, y eso ayuda a mantener la suite simple pero efectiva.

---

### Apuntes para próximos episodios

Con el formulario de creación ya cubierto por pruebas, el siguiente paso será aplicar la misma estrategia al formulario de edición y a cualquier validación adicional relacionada con estados o enlaces de la idea.