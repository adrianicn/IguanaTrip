<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{ $title }}</h2>

		<div>
			{!! $intro . link_to('auth/confirm/' . $confirmation_code, $link) !!}.<br>
		</div>
	</body>
</html>
