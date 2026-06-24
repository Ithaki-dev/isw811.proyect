<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienvenido</title>
	<style>
		body {
			margin: 0;
			font-family: Arial, sans-serif;
			background: linear-gradient(135deg, #0f172a, #1e293b);
			color: #e2e8f0;
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.container {
			text-align: center;
			padding: 3rem;
			max-width: 700px;
		}

		h1 {
			font-size: 3rem;
			margin-bottom: 1rem;
		}

		p {
			font-size: 1.2rem;
			line-height: 1.6;
			color: #cbd5e1;
		}

		.button {
			display: inline-block;
			margin-top: 2rem;
			padding: 0.9rem 1.5rem;
			background: #38bdf8;
			color: #0f172a;
			text-decoration: none;
			border-radius: 999px;
			font-weight: bold;
		}

		.button:hover {
			background: #7dd3fc;
		}
	</style>
</head>
<body>
	<main class="container">
		<h1>Bienvenido</h1>
		<p>
			Esta es una página de bienvenida simple creada con HTML para tu proyecto.
			Puedes personalizar este contenido según tus necesidades.
		</p>
        
		<a class="button" href="/about">Comenzar</a>
		<a class="button secondary" href="/contact" style="margin-left:0.75rem; background:#94a3b8; color:#0f172a;">Contacto</a>
	</main>
</body>
</html>
