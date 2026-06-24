<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contacto</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			background: linear-gradient(135deg, #eff6ff, #e0f2fe);
			color: #0f172a;
		}
		.container {
			max-width: 900px;
			margin: 0 auto;
			padding: 60px 20px;
		}
		.card {
			background: rgba(255, 255, 255, 0.92);
			border-radius: 16px;
			padding: 40px;
			box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
		}
		h1 {
			margin-top: 0;
			font-size: 2.5rem;
		}
		p {
			line-height: 1.7;
			font-size: 1.05rem;
		}
		.link {
			display: inline-block;
			margin-top: 24px;
			padding: 0.85rem 1.25rem;
			border-radius: 999px;
			text-decoration: none;
			background: #0f172a;
			color: #fff;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="card">
			<h1>Contact Us</h1>
			<p>
				Esta vista se agregó como práctica del episodio de routing para demostrar cómo crear una ruta nueva y conectarla con una vista Blade.
			</p>
			<p>
				Aquí puedes escribir después tus datos de contacto, formulario o información de soporte.
			</p>
			<a class="link" href="/">Volver al inicio</a>
		</div>
	</div>
</body>
</html>