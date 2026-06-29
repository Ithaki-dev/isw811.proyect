# Entregable 22

**Proyecto:** Laravel From Scratch 2026 — Proyecto final

---

## Episodio 22: Design Your Model Layer

### Resumen

En este episodio se diseñó y estructuró la capa de modelos de la aplicación, estableciendo las relaciones de base de datos entre los modelos `User` (Usuarios), `Idea` (Ideas) y `Step` (Pasos/Etapas). Se implementaron migraciones con claves foráneas adecuadas y cascada de eliminación, se utilizaron enums nativos de PHP para representar los estados de las ideas, y se configuró el casteo de atributos complejos (como un arreglo JSON para los enlaces).

Además, se habilitó el modo estricto de Eloquent (`Model::shouldBeStrict()`) y se liberó la protección de asignación masiva de manera global (`Model::unguard()`) en el proveedor de servicios de la aplicación para agilizar el desarrollo y evitar la carga diferida (lazy loading) accidental. Por último, se crearon fábricas de datos (factories) y se redactaron pruebas automatizadas con Pest PHP para comprobar el correcto funcionamiento de las relaciones de pertenencia y de uno a muchos en el entorno virtualizado.

---

### Conceptos aprendidos

- **Diseño de relaciones Eloquent:** configuración de relaciones uno a muchos (`hasMany`) y pertenencia (`belongsTo`) entre usuarios, ideas y pasos.
- **Modo estricto de Eloquent (`Model::shouldBeStrict()`):** previene silencios o fallos indeseados en desarrollo:
  - Lanza excepciones si se intentan usar propiedades que no fueron cargadas (previene problemas de rendimiento N+1).
  - Lanza excepciones si se intenta asignar un atributo no fillable.
  - Lanza excepciones si se intenta acceder a un campo inexistente.
- **Unguard global (`Model::unguard()`):** deshabilita la protección de asignación masiva de manera global. En lugar de definir `$fillable` en cada modelo, se confía en la validación en los controladores/requests para la seguridad y se facilita el desarrollo de seeders y factories.
- **PHP Enums con Eloquent:** uso de Enums nativos de PHP (`IdeaStatus`) en el casteo de atributos del modelo para tipar fuemente campos como el estado de una idea (`pending`, `in_progress`, etc.) y proveer etiquetas amigables.
- **Atributos de tipo JSON (`AsArrayObject`):** casteo automático de columnas JSON de base de datos a objetos de PHP (`AsArrayObject::class`) para manipular arreglos de enlaces directamente.
- **Refactorización de pruebas con Pest y RefreshDatabase:** uso global de `RefreshDatabase` en Pest para garantizar que cada prueba corra en una base de datos limpia y aislada.
- **Estructuración de migraciones con claves foráneas relacionales:** uso de `foreignIdFor()` y modificadores como `cascadeOnDelete()` para definir la integridad referencial y de eliminación en cascada.

---

### Comandos utilizados

```bash
php artisan make:model Idea -mcrpf
php artisan make:model Step -mf
php artisan migrate
php artisan test
```
*Nota: `php artisan make:model Idea -mcrpf` genera el Modelo con su Migración, Controller (Resource), Request (Store/Update), Policy y Factory asociados en un solo paso.*

---

### Archivos modificados o creados

**Capa de Modelos y Enums:**
- `app/Models/Idea.php` [NEW] — modelo de ideas con casteo de enums, objetos de array y relaciones con usuarios y pasos.
- `app/Models/Step.php` [NEW] — modelo de pasos/etapas que componen una idea, con su relación inversa de pertenencia.
- `app/Models/User.php` [MODIFY] — se añadió la relación `ideas()` de tipo `hasMany`.
- `app/Enums/IdeaStatus.php` [NEW] — enumeración tipo cadena para definir y etiquetar los estados válidos de una idea (`pending`, `in_progress`, `completed`, `cancelled`).

**Migraciones de Base de Datos:**
- `database/migrations/2026_06_29_064210_create_ideas_table.php` [NEW] — tabla de ideas con columnas de texto, JSON para links, cadena para estatus e integridad referencial hacia usuarios.
- `database/migrations/2026_06_29_070104_create_steps_table.php` [NEW] — tabla de pasos con relación externa hacia ideas y eliminación en cascada.

**Proveedores y Configuración de Pruebas:**
- `app/Providers/AppServiceProvider.php` [MODIFY] — configuración global de `Model::unguard()` y `Model::shouldBeStrict()` en el arranque de la app.
- `tests/Pest.php` [MODIFY] — se habilitó el trait `RefreshDatabase` de forma global para las carpetas Feature y Unit de Pest.

**Controladores, Requests, Políticas y Factories:**
- `app/Http/Controllers/IdeaController.php` [NEW] — controlador de recursos para ideas.
- `app/Http/Requests/StoreIdeaRequest.php` [NEW] — request validador para almacenar ideas.
- `app/Http/Requests/UpdateIdeaRequest.php` [NEW] — request validador para actualizar ideas.
- `app/Policies/IdeaPolicy.php` [NEW] — política de autorización para regular las operaciones sobre las ideas.
- `database/factories/IdeaFactory.php` [NEW] — fábrica para generar ideas y poblar la base de datos de pruebas.
- `database/factories/StepFactory.php` [NEW] — fábrica para generar pasos con relaciones a ideas.

**Pruebas Automatizadas (Tests):**
- `tests/Feature/IdeaTest.php` [NEW] — pruebas de integración en Pest que validan la pertenencia de una idea a un usuario y la relación con sus respectivos pasos.

---

### Evidencia

![Ejecución exitosa de los tests de Pest en el entorno virtual](docs/img/pest_test.png)

---

### Problemas encontrados y solución

- **Falta del controlador de SQLite en el entorno local de desarrollo:** al intentar ejecutar los tests directamente en la máquina host, arrojaba el error `could not find driver (Connection: sqlite...)`.
  - **Solución:** dado que la base de datos y la versión de PHP con todas sus extensiones (incluyendo SQLite para pruebas en memoria) están configuradas en la máquina virtual Vagrant, las pruebas deben ser ejecutadas desde dentro de la VM (`vagrant ssh` y luego `./vendor/bin/pest` o `php artisan test`).
- **Control de asignación masiva (Mass Assignment Exception):** al utilizar fábricas o métodos directos de creación en las pruebas, si los campos no estaban explícitamente en el arreglo `$fillable`, se arrojaban excepciones.
  - **Solución:** se aplicó `Model::unguard()` en `AppServiceProvider` para desactivar esta restricción a nivel global, permitiendo un desarrollo de modelos más ágil, delegando la seguridad de los parámetros a los objetos `FormRequest` en el controlador.
- **N+1 Queries y accesos a atributos no cargados:** en el modo estricto de desarrollo, acceder a propiedades dinámicas sin usar `load()` o `with()` causa un error fatal para evitar el mal rendimiento en producción.
  - **Solución:** se comprendió el funcionamiento de `Model::shouldBeStrict()` y la importancia de la carga ansiosa (eager loading) al consumir relaciones de Eloquent.

---

### Comentarios personales

El diseño de la capa de datos en Laravel 12 se siente increíblemente limpio. El uso de enums nativos de PHP integrados directamente con el motor de casteo de Eloquent hace que el código sea mucho más autodescriptivo y seguro, evitando cadenas "mágicas" e inconsistentes en la base de datos.

La introducción de `Model::shouldBeStrict()` me parece una práctica excelente que debería activarse por defecto en todo proyecto moderno, ya que te obliga a escribir consultas eficientes (evitando el típico problema N+1) desde la fase de desarrollo, en lugar de sufrir lentitud en producción. Además, `Model::unguard()` junto con `FormRequests` dedicados permite concentrar la lógica de validación de entrada en un único punto sin duplicar la lista de atributos permitidos dentro del modelo.

---

### Apuntes para próximos episodios

Con la capa de datos y las relaciones fundamentales ya testeadas y configuradas, el siguiente paso natural será construir la interfaz de usuario, los formularios, y conectar el controlador de recursos (`IdeaController`) con las vistas para permitir a los usuarios registrar y consultar ideas y pasos de manera visual.
