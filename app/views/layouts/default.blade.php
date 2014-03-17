<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<!-- Assets de la aplicacion -->
	@yield('assets')

	<title>
		@yield('title')
	</title>

	<!-- Meta Etiquetas Necesarias 
	============================================================================ -->

	<meta name="author" content="Anheru88"/>

	@yield('meta')

	<!-- Mobile Specific Metas 
	============================================================================ -->

	<meta name="voewport" content="width=device-width, initial-scale=1.0" />

	<!-- CSS 
	============================================================================ -->


	@yield('css')

</head>
<body>
	@yield('content')

	<!-- JS 
	============================================================================ -->
	@yield('scripts')
</body>
</html>