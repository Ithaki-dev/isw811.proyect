# Entregable 02

Proyecto 1: Laravel From Scratch 2026

## Episodio 02: Blade Components

### Resumen breve
En este episodio se trabajó con componentes Blade para evitar duplicar código en las vistas. Se revisó el uso de `<x-layout>` y `{{ $slot }}` para insertar contenido dinámico dentro de una estructura compartida. También se exploró la diferencia entre pasar datos como props, usar `{{ $title }}` dentro de los componentes y crear un componente adicional para una tarjeta sin declararla como prop, con el fin de comparar ambos enfoques.

Además, se practicó el uso de `{{ $attributes }}` para recibir atributos HTML desde fuera del componente y hacer merge de clases de forma flexible.

### Comandos utilizados
- `php artisan serve` para probar la aplicación en local.
- `php artisan route:list` para verificar las rutas registradas.

### Archivos modificados o creados
- `resources/views/components/layout.blade.php`
- `resources/views/welcome.blade.php`
- `resources/views/about.blade.php`
- `resources/views/contact.blade.php`
- `routes/web.php`

### Evidencia
- [ ] Captura de la barra de navegación creada: [docs/img/layout.png](docs/img/layout.png)
- [ ] Captura de la vista principal usando el componente layout: [docs/img/card.png](docs/img/card.png)


### Problemas encontrados y solución
- Al trabajar con componentes Blade se identificó que era importante mantener el contenido dentro del `<x-layout>` para que `{{ $slot }}` funcionara correctamente.
- También se corrigió la ruta raíz para que no apuntara a una vista inexistente y así mantener coherencia entre rutas y vistas.

### Comentarios personales
Este episodio ayudó a entender mejor cómo Blade permite reutilizar estructura sin repetir HTML en cada vista. El uso de componentes, slots y atributos hace que el proyecto sea más ordenado y fácil de mantener.

## Apuntes para próximos episodios
Seguir agregando una sección nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.