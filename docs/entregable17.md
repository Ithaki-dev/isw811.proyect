# Entregable 17

Proyecto 1: Laravel From Scratch 2026

## Episodio 17: Frontend Asset Bundling with Vite

### Resumen breve
En este episodio se trabajó con Vite como la herramienta principal para el manejo y empaquetado (bundling) de activos frontend en Laravel. Aprendimos cómo Vite optimiza la carga de archivos CSS, JavaScript e imágenes, proporcionando un entorno de desarrollo mucho más rápido que las herramientas tradicionales. 

Se enfocó en la configuración de estilos globales y en cómo aplicar un tema consistente a toda la aplicación. Aprendimos a integrar los archivos de recursos para que los estilos se reflejen correctamente en todas las vistas, permitiendo una personalización visual coherente y profesional de la interfaz de usuario.

### Comandos utilizados
- `npm install` para instalar las dependencias de Node.js.
- `npm run dev` para iniciar el servidor de desarrollo de Vite y ver cambios en tiempo real.
- `npm run build` para compilar y optimizar los activos para producción.

### Archivos modificados o creados
- `vite.config.js`
- `resources/css/app.css`
- `resources/js/app.js`
- `resources/views/layouts/app.blade.php` (o el layout principal utilizado)

### Evidencia
````carousel
![Captura de la aplicación con el nuevo tema](docs/img/theme.png)
````

### Problemas encontrados y solución
- A veces los cambios en el CSS no se reflejaban inmediatamente en el navegador. Se solucionó asegurándose de que el comando `npm run dev` estuviera activo y que la directiva `@vite` estuviera correctamente incluida en el layout principal.
- Confusión inicial sobre la diferencia entre el servidor de PHP y el servidor de Vite; se aclaró que ambos deben estar corriendo simultáneamente durante el desarrollo.

### Comentarios personales
Vite es una mejora increíble para el flujo de trabajo de Laravel. La velocidad con la que refresca los estilos y la facilidad para gestionar los assets hace que el desarrollo sea mucho más fluido. Me gusta cómo centraliza todo lo que necesitamos para que la aplicación se vea bien sin complicar la estructura de archivos.

## Apuntes para próximos episodios
Seguir agregando una sección nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.