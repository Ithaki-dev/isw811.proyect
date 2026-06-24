@props(['title' => 'ISW811'])

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title }}</title>
	<style>
		:root {
			--bg: #0f172a;
			--panel: rgba(15, 23, 42, 0.78);
			--text: #e2e8f0;
			--muted: #94a3b8;
			--accent: #38bdf8;
			--accent-strong: #0ea5e9;
		}

		body {
			margin: 0;
			font-family: Arial, sans-serif;
			background: radial-gradient(circle at top, #1e293b 0%, var(--bg) 45%, #020617 100%);
			color: var(--text);
			min-height: 100vh;
		}

		.navbar {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 1rem 2rem;
			background: rgba(15, 23, 42, 0.92);
			backdrop-filter: blur(10px);
			border-bottom: 1px solid rgba(148, 163, 184, 0.18);
			position: sticky;
			top: 0;
			z-index: 10;
		}

		.brand {
			font-size: 1.1rem;
			font-weight: 700;
			letter-spacing: 0.08em;
			text-transform: uppercase;
			color: var(--text);
		}

		.nav-links {
			display: flex;
			gap: 1rem;
			flex-wrap: wrap;
		}

		.nav-links a {
			color: var(--text);
			text-decoration: none;
			padding: 0.7rem 1rem;
			border-radius: 999px;
			transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
		}

		.nav-links a:hover {
			background: rgba(56, 189, 248, 0.16);
			color: #fff;
			transform: translateY(-1px);
		}

		main {
			max-width: 1100px;
			margin: 0 auto;
			padding: 4rem 1.5rem;
		}

		.hero {
			max-width: 720px;
			padding: 3rem;
			border: 1px solid rgba(148, 163, 184, 0.16);
			border-radius: 24px;
			background: var(--panel);
			box-shadow: 0 20px 60px rgba(2, 6, 23, 0.45);
		}

		h1 {
			font-size: clamp(2.4rem, 5vw, 4.2rem);
			margin: 0 0 1rem;
			line-height: 1.05;
		}

		p {
			font-size: 1.1rem;
			line-height: 1.75;
			color: var(--muted);
		}

		.button {
			display: inline-block;
			margin-top: 2rem;
			padding: 0.9rem 1.5rem;
			background: linear-gradient(135deg, var(--accent), var(--accent-strong));
			color: #08111f;
			text-decoration: none;
			border-radius: 999px;
			font-weight: bold;
			box-shadow: 0 10px 24px rgba(14, 165, 233, 0.25);
		}

		.button:hover {
			filter: brightness(1.05);
		}
	</style>
</head>
<body>
	<nav class="navbar">
		<div class="brand">ISW811</div>
		<div class="nav-links">
			<a href="/">Home</a>
			<a href="/about">About</a>
			<a href="/contact">Contact</a>
		</div>
	</nav>

	<main>
{{ $slot }}
	</main>

</body>
</html>

