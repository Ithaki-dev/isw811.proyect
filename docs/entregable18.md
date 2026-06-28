# Entregable 18

**Proyecto:** Laravel From Scratch 2026

---

## Episodio 18: Notifications and Mail with Mailpit

### Resumen

En este episodio se trabajó con el sistema de notificaciones de Laravel, aprendiendo a enviar alertas a los usuarios a través de diferentes canales, enfocándonos principalmente en el envío de correos electrónicos. Se exploró cómo Laravel abstrae la lógica de las notificaciones para que sea fácil cambiar de canal (mail, database, slack, etc.) sin modificar la lógica principal de la aplicación.

Además, se integró **Mailpit** como un servidor SMTP local para capturar y visualizar los correos enviados durante el desarrollo, lo que permite probar el flujo de envío de manera segura y rápida sin necesidad de servicios externos.

---

### Instalación de Mailpit

**Vía Docker (recomendado):**

```bash
docker run -d -p 8025:8025 -p 1025:1025 axllent/mailpit
```

**Vía binario:** Descargar el ejecutable desde el [repositorio oficial de Mailpit](https://github.com/axllent/mailpit) y ejecutarlo localmente.

**Configuración en `.env`:**

```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

### Comandos utilizados

```bash
php artisan make:notification IdeaPublished
php artisan make:mail
php artisan config:clear
php artisan tinker
```

---

### Archivos modificados o creados

- `app/Notifications/` — clases de notificación
- `app/Mail/` — clases de contenido de correo
- `.env` — configuración de variables de entorno para Mailpit

---

### Evidencia

- [ ] Captura del correo recibido en Mailpit (`mail.png`)
- [ ] Captura de la notificación enviada en la aplicación (`notification.png`)

---

### Problemas encontrados y solución

**Error de conexión SMTP:** Los correos no llegaban porque el `MAIL_HOST` dentro de la VM apunta a `127.0.0.1` (la propia VM) en lugar de la IP de la laptop host (`192.168.56.1`). Se corrigió cambiando el host en `.env` y limpiando la caché con `php artisan config:clear`.

---

### Comentarios personales

El sistema de notificaciones de Laravel es muy elegante. Permite definir la lógica de envío en un solo lugar y disparar la notificación desde cualquier parte del código (controladores, jobs, etc.). Mailpit es una herramienta indispensable para el flujo de trabajo de desarrollo, ya que facilita enormemente las pruebas de correos sin depender de servicios externos.

---

### Apuntes para próximos episodios

Seguir agregando una sección nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.