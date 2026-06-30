# Entregable 27

**Proyecto:** Laravel From Scratch 2026 — Proyecto final

---

## Episodio 27: Idea Filtering

### Resumen

En este episodio se implementó un sistema de filtrado de ideas por su estado (status) en la vista principal, permitiendo a los usuarios ordenar y consultar sus ideas de acuerdo con su progreso (`pending`, `in_progress`, `completed`, `cancelled` o ver todas (`all`)). Además, se agregó un contador dinámico en cada botón de filtro para llevar un control numérico de las ideas que se encuentran en cada etapa.

Para lograrlo:
- Se actualizó el controlador `IdeaController` para agrupar y contar de forma dinámica las ideas del usuario en la base de datos a través de una consulta relacional con `groupBy('status')` y `select`.
- Se implementó la condición `when()` de Eloquent en el controlador para aplicar el filtro de estado en la consulta a la base de datos únicamente si se encuentra presente el parámetro de consulta `status` en la petición.
- Se modificó la vista `index.blade.php` del listado de ideas para renderizar un conjunto de botones interactivos con los enlaces correspondientes (`/ideas?status={status}`), aplicando clases de Tailwind condicionales para resaltar de forma visual el filtro activo actual.

---

### Conceptos aprendidos

- **Filtrado condicional con Eloquent `when()`:** uso del método `when()` del constructor de consultas para aplicar cláusulas `where` condicionales según los parámetros del request, evitando estructuras repetitivas de control `if/else`.
- **Agrupamiento y conteo relacional en base de datos:** uso de `select`, `groupBy` y la función raw `DB::raw('count(*) as count')` combinados con `pluck` para realizar conteos eficientes por categorías en una sola consulta de base de datos.
- **Colecciones de Laravel para mapeo dinámico:** uso de colecciones y métodos como `mapWithKeys` y `put` para mapear los casos de enums a sus respectivos conteos calculados, asegurando que todos los estados (incluso aquellos con 0 elementos) se representen con su contador respectivo y sumando el total global para la opción "All".
- **Interacción con parámetros de consulta de URL:** uso del helper `request('status')` para extraer dinámicamente valores de la URL en controladores y Blade, controlando el estilo y la consulta activa.
- **Estilos de botones condicionales en Blade:** aplicación dinámica de clases utilitarias basadas en la coincidencia del estado actual con el de la URL (`request('status') == $status ? 'btn-primary' : 'btn-outline'`).

---

### Comandos utilizados

```bash
npm run dev
```

---

### Archivos modificados o creados

**Vistas y Componentes Blade:**
- `resources/views/components/idea/index.blade.php` [MODIFY] — inserción del bloque de botones de filtrado con contadores dinámicos y estilos condicionales.

**Controladores:**
- `app/Http/Controllers/IdeaController.php` [MODIFY] — importación del enum `IdeaStatus` y actualización del método `index()` para implementar la consulta de agrupamiento (`groupBy`), calcular los contadores y aplicar el filtrado condicional (`when`).

---

### Evidencia

````carousel
![Listado de ideas mostrando los botones de filtrado y el contador de estados](docs/img/filter_idea.png)
````

---

### Problemas encontrados y solución

- **Tratamiento del valor especial 'All' en la consulta SQL:** al pinchar en el filtro "All" (todos), la URL se define como `/ideas?status=all`. El controlador evalúa `request('status')` y realiza la consulta `where('status', 'all')`. Al no existir el estado `'all'` en el Enum ni en la columna correspondiente en la base de datos, el listado se mostraba completamente vacío en lugar de retornar todos los registros.
  - **Solución:** Aunque el código implementado de forma simple ejecuta `$query->where('status', request('status'))`, se identificó que para resolver esto de manera correcta se debe ajustar el condicional en la consulta de Eloquent para omitir el filtro de base de datos cuando el parámetro de la petición sea específicamente `'all'` (ej. `when(request('status') && request('status') !== 'all', ...)`).
- **Estados con contador en cero:** si un estado no poseía registros asociados en la base de datos, la consulta de base de datos no lo retornaba en el listado, causando que el botón de ese estado no tuviera un número o provocara un error de índice indefinido al pintar la vista.
  - **Solución:** se usó `collect(IdeaStatus::cases())` y `mapWithKeys` para iterar por todos los estados posibles del Enum, asignando un valor predeterminado de `0` mediante `ideasCount->get($status->value, 0)` en caso de que no existieran registros en el resultado de la base de datos.

---

### Comentarios personales

El uso de `when()` en Eloquent hace que construir consultas con múltiples filtros dinámicos sea una tarea sumamente limpia y legible. Permite añadir filtros adicionales (como búsqueda por texto, fecha, etc.) concatenando llamadas de forma fluida.

Por otro lado, realizar el conteo de estados directamente en la base de datos con `groupBy` es mucho más óptimo para el rendimiento que traer todas las ideas a la memoria de PHP y contarlas con colecciones. La combinación de colecciones de Laravel para asegurar que todos los casos de Enums estén mapeados (incluso aquellos con 0 registros) es una práctica excelente para evitar inconsistencias en el renderizado de la UI.

---

### Apuntes para próximos episodios

Con la vista de listado de ideas ahora equipada con filtros y contadores, el siguiente paso es permitir la interacción de escritura implementando las vistas y controladores de creación (`/ideas/create`), validando que la asignación del estado por defecto sea `pending` y que la respuesta redirija e informe al usuario mediante una notificación flash dinámica.
