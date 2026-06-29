# Entregable 19

**Proyecto:** Laravel From Scratch 2026

---

## Episodio 19: When to Queue It Up

### Resumen

En este episodio aprendimos cuando conviene usar colas en Laravel y como separar tareas pesadas o secundarias del flujo principal de la aplicacion. La idea principal fue entender que no todo debe ejecutarse inmediatamente durante una peticion HTTP, especialmente cuando se trata de procesos que pueden tardar, como enviar correos, generar reportes, actualizar estadisticas o comunicarse con servicios externos.

Tambien se practico el uso de **jobs**, **queues** y **workers**. Un **job** representa una tarea que Laravel puede ejecutar despues; una **queue** funciona como la lista donde se guardan esas tareas pendientes; y un **worker** es el proceso encargado de tomar los jobs de la cola y ejecutarlos en segundo plano.

En el proyecto se relaciono este concepto con las ideas de la aplicacion, usando un job para simular la actualizacion de estadisticas de ideas. Con esto se pudo ver como Laravel permite mantener la aplicacion mas rapida para el usuario, delegando tareas adicionales al sistema de colas.

---

### Conceptos aprendidos

- **Job:** clase que contiene una tarea especifica que puede ejecutarse en segundo plano.
- **Queue:** mecanismo que almacena trabajos pendientes hasta que un worker los procese.
- **Worker:** proceso que escucha la cola y ejecuta los jobs disponibles.
- **ShouldQueue:** interfaz que indica que una clase debe enviarse a la cola en lugar de ejecutarse de forma inmediata.
- **Dispatch:** accion de enviar un job a la cola para que sea procesado posteriormente.

---

### Comandos utilizados

```bash
php artisan make:job UpdateIdeaStatistics
php artisan queue:table
php artisan migrate
php artisan queue:work
php artisan tinker
```

---

### Configuracion importante

Para trabajar con colas usando la base de datos, se reviso o configuro la variable de entorno:

```env
QUEUE_CONNECTION=database
```

Esta configuracion le indica a Laravel que los jobs pendientes se deben guardar en la tabla `jobs`. Luego, el worker los lee desde esa tabla y los ejecuta.

---

### Archivos modificados o creados

- `app/Jobs/UpdateIdeaStatistics.php` -- job creado para ejecutar una tarea relacionada con estadisticas de ideas.
- `database/migrations/0001_01_01_000002_create_jobs_table.php` -- migracion de la tabla utilizada por la cola.
- `.env` -- configuracion de `QUEUE_CONNECTION`.
- `app/Notifications/IdeaPublished.php` -- notificacion que implementa `ShouldQueue` para poder enviarse a la cola.
- `app/Http/Controllers/IdeaController.php` -- controlador desde donde se dispara la logica relacionada con ideas.

---

### Evidencia

````carousel
![Actualizacion de idea](docs/img/update_idea.png)
````

---

### Problemas encontrados y solucion

**Los jobs no se ejecutaban automaticamente:** Se comprendio que guardar un job en la cola no significa que se ejecute solo. Es necesario iniciar un worker con `php artisan queue:work` para que Laravel procese los trabajos pendientes.

**La aplicacion podia parecer que no hacia nada:** Al enviar una tarea a la cola, la respuesta al usuario ocurre antes de que el trabajo termine. Para verificar que el job si se estaba ejecutando, se uso `logger()` dentro del metodo `handle()` y se revisaron los logs de Laravel.

**Diferencia entre ejecutar ahora y ejecutar despues:** Fue importante distinguir entre una tarea que debe ocurrir inmediatamente y una tarea que puede esperar. Las colas son utiles para mejorar la experiencia del usuario cuando el resultado de una tarea no necesita estar listo en la misma peticion.

---

### Comentarios personales

Este episodio ayudo a entender mejor como Laravel maneja tareas en segundo plano. Las colas son muy utiles porque permiten que la aplicacion responda mas rapido y que procesos como correos, notificaciones o actualizaciones internas se ejecuten sin bloquear al usuario.

Tambien quedo mas claro el papel de cada parte: el job define que se debe hacer, la queue guarda lo pendiente y el worker se encarga de ejecutarlo. Esta separacion hace que el proyecto sea mas ordenado y mas facil de escalar.

---

### Apuntes para proximos episodios

Seguir agregando una seccion nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.
