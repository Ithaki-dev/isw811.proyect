# Entregable 16

Proyecto 1: Laravel From Scratch 2026

## Episodio 16: Authorization Using Policies

### Resumen breve
En este episodio se aprendió a implementar el sistema de autorización utilizando Policies en Laravel. A diferencia de las Gates, que son ideales para acciones simples o globales, las Policies están diseñadas para manejar la autorización de acciones sobre modelos específicos. Se aprendió cómo organizar la lógica de permisos de manera más estructurada, permitiendo definir quién puede realizar qué acción (como editar, eliminar o crear) sobre un registro en particular.

Se practicó la creación de políticas para modelos (como `IdeaPolicy`), donde se definen métodos que verifican si el usuario autenticado tiene los permisos necesarios para interactuar con una instancia específica del modelo. Esto proporciona una capa de seguridad más granular y escalable, especialmente útil en aplicaciones con múltiples recursos y reglas de negocio complejas.

### Comandos utilizados
- `php artisan make:policy IdeaPolicy --model=Idea` para crear la política del modelo Idea.

### Archivos modificados o creados
- `app/Policies/IdeaPolicy.php`
- `routes/web.php`
- `app/Http/Controllers/IdeaController.php`

### Evidencia
- [ ] Captura de la política de la aplicación (app_policy.png).
- [ ] Captura de la política de ideas (idea_policy.png).

### Problemas encontrados y solucion
- Se identificó la confusión inicial sobre cuándo usar Gates frente a Policies. Se aclaró que las Policies son preferibles cuando la autorización depende de un modelo específico (ej. "¿Puede este usuario editar *esta* idea en particular?"), mientras que las Gates son mejores para acciones generales (ej. "¿Es el usuario un administrador?").
- Se tuvo que asegurar que el middleware `auth:api` o `auth` estuviera correctamente aplicado en las rutas para que las políticas pudieran acceder al usuario autenticado.

### Comentarios personales
Las Policies son una de las herramientas más potentes de Laravel para la seguridad. Me gusta mucho cómo permiten centralizar la lógica de permisos en un solo lugar por modelo, lo que hace que los controladores sean mucho más limpios y fáciles de mantener. Es una excelente práctica para aplicaciones que planean crecer en complejidad.

## Apuntes para proximos episodios
Seguir agregando una seccion nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.