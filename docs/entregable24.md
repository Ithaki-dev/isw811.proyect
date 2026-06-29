# Entregable 24

**Proyecto:** Laravel From Scratch 2026 — Proyecto final

---

## Episodio 24: Browser Testing Registration Forms with Pest

### Resumen

En este episodio se implementaron pruebas automatizadas para los formularios de registro e inicio de sesión de usuarios utilizando Pest PHP. Con este fin, se estructuró una suite de pruebas dentro del directorio `tests/Browser` para comprobar de manera el comportamiento correcto y seguro del flujo de autenticación desde el punto de vista del usuario.

Se definieron casos de prueba para validar el registro exitoso (con confirmación de contraseña e inserción en base de datos), el inicio de sesión correcto, y las distintas reglas de validación en caso de ingresar datos incorrectos o incompletos (campos obligatorios, formato de correo, unicidad de correo y coincidencia de contraseñas). Además, se modificó la regla de validación de contraseñas en el controlador de registro para exigir la confirmación (`confirmed`).

---

### Conceptos aprendidos

- **Estructuración de pruebas automatizadas con Pest:** organización y diseño de casos de prueba dentro de `tests/Browser` para validar los flujos de interacción del usuario.
- **Aserciones de sesión y autenticación:** verificación del estado de autenticación (`assertAuthenticatedAs`) y del almacenamiento de errores en sesión (`assertSessionHasErrors`) para validar las respuestas del servidor ante peticiones incorrectas.
- **Validación avanzada de formularios (`confirmed`):** uso de la regla de validación `confirmed` de Laravel en el controlador para exigir que el campo `password` coincida con el campo `password_confirmation`.
- **Aislamiento de base de datos en pruebas:** uso del trait `RefreshDatabase` en `tests/Pest.php` para resetear el estado de la base de datos en cada ejecución de prueba, previniendo colisiones de datos (como correos electrónicos duplicados).
- **Pruebas de base de datos (`assertDatabaseHas`):** comprobación de que los registros se inserten correctamente en la base de datos una vez completado el registro del usuario.
- **Integración de suites de pruebas en PHPUnit/Pest:** configuración de un nuevo suite de pruebas `Browser` en el archivo `phpunit.xml` para organizar y ejecutar pruebas de navegación de forma aislada.

---

### Comandos utilizados

```bash
composer require laravel/dusk --dev
npm install playwright
php artisan test --compact
```

---

### Archivos modificados o creados

**Pruebas Automatizadas (Tests):**
- `tests/Browser/LoginTest.php` [NEW] — pruebas de integración en Pest que validan el login exitoso, la obligatoriedad de los campos y el comportamiento ante credenciales inválidas.
- `tests/Browser/RegisterTest.php` [NEW] — pruebas de integración en Pest que validan el registro de nuevos usuarios, la obligatoriedad de campos, la unicidad del correo electrónico y la coincidencia de confirmación de contraseña.
- `tests/Pest.php` [MODIFY] — se amplió el alcance del trait `RefreshDatabase` e inicialización general para incluir la carpeta `Browser`.

**Configuraciones del Proyecto:**
- `composer.json` [MODIFY] — adición de la dependencia de desarrollo `laravel/dusk`.
- `package.json` [MODIFY] — adición de la dependencia de `playwright`.
- `phpunit.xml` [MODIFY] — adición de la suite de pruebas `Browser` apuntando al directorio `tests/Browser`.

**Controladores:**
- `app/Http/Controllers/RegisterUserController.php` [MODIFY] — actualización de la regla de validación de contraseña para requerir confirmación (`confirmed`).

---

### Evidencia

````carousel
![Resultados de las pruebas del Login](docs/img/login_test2.png)
<!-- slide -->
![Resultados de las pruebas del Registro](docs/img/register_test2.png)
````

---

### Problemas encontrados y solución

- **Coincidencia y confirmación de contraseñas:** al inicio no se exigía la confirmación del password, permitiendo registrar usuarios aunque no coincidieran.
  - **Solución:** se añadió la regla `confirmed` en `RegisterUserController` y se aseguró de enviar el parámetro `password_confirmation` en el formulario y los tests.
- **Persistencia de datos entre pruebas:** los registros creados por una prueba podían interferir con las pruebas subsiguientes (ej. errores de unicidad de correo).
  - **Solución:** se extendieron las configuraciones de `RefreshDatabase` en `tests/Pest.php` para limpiar la base de datos después de cada prueba en la carpeta `Browser`.

---

### Comentarios personales

El uso de Pest para escribir pruebas automatizadas simplifica enormemente la sintaxis de testing en PHP, haciendo que los tests sean legibles y parecidos a lenguaje natural. Agrupar las pruebas en una carpeta `Browser` permite mantener la lógica del comportamiento de cara al usuario separada de las pruebas unitarias y de integración del backend puro.

Configurar la regla `confirmed` de forma nativa en Laravel demuestra lo potente que es el sistema de validación integrado, pues realiza la comparación de campos automáticamente sin requerir lógica manual en el controlador. Por otro lado, contar con pruebas automatizadas sólidas nos da la tranquilidad de que cambios futuros en la interfaz o en el tema visual de Tailwind no romperán la funcionalidad crítica de registro e inicio de sesión.

---

### Apuntes para próximos episodios

Una vez asegurado el correcto comportamiento de los formularios de autenticación con pruebas automatizadas, el siguiente paso será diseñar y probar la interacción del usuario final con los recursos del negocio (las Ideas), asegurándonos de que solo los usuarios autenticados puedan realizar ciertas acciones y que estas se validen y almacenen correctamente en la base de datos de manera protegida.
