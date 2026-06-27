## Episodio 14: Eloquent Relationships

### Resumen
En este episodio se aprendió a utilizar las relaciones en Eloquent ORM para conectar diferentes modelos de la base de datos, permitiendo una gestión más estructurada y eficiente de la información relacionada entre tablas.

### Comandos utilizados
php artisan make:model Idea
php artisan make:model User

### Archivos modificados
- app/Models/Idea.php
- app/Models/User.php

### Evidencia
![Relación Idea](img/idea_rela.png)
![Relación User](img/user_rela.png)

### Comentarios
Se comprendió cómo definir y utilizar relaciones (como belongsTo, hasMany, etc.) para acceder a datos vinculados de manera sencilla, evitando la necesidad de realizar consultas manuales complejas y mejorando la legibilidad del código.