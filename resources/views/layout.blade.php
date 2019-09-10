
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

		<script src="http://code.jquery.com/jquery-latest.js"></script>

        <title></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <!-- Styles -->
        <style>
			header {
				width:100%; /* Establecemos que el header abarque el 100% del documento */
				overflow:hidden; /* Eliminamos errores de float */
				background:#252932;
				margin-bottom:20px;
			}

			.wrapper {
				width:90%; /* Establecemos que el ancho sera del 90% */
				max-width:1000px; /* Aqui le decimos que el ancho máximo sera de 1000px */
				margin:auto; /* Centramos los elementos */
				overflow:hidden; /* Eliminamos errores de float */
			}

			header .logo {
				color:#f2f2f2;
				font-size:50px;
				line-height:200px;
				float:left;
			}

			header nav {
				float:right;
				line-height:200px;
			}

			header nav a {
				display:inline-block;
				color:#fff;
				text-decoration:none;
				padding:10px 20px;
				line-height:normal;
				font-size:20px;
				font-weight:bold;
				-webkit-transition:all 500ms ease;
				-o-transition:all 500ms ease;
				transition:all 500ms ease;
			}

			header nav a:hover {
				background:#f56f3a;
				border-radius:50px;
			}
			.active {
				background:#f56f3a;
				border-radius:50px;
			}
        </style>
	</head>
	<body>
        <header>
		<div class="wrapper">
			<div class="logo">Tienda Virtual</div>
			
			<nav>
				<!-- este if con el request es para que el boton este seleccinado en la pagina donde estas
				para hacerlo mas dinamico , y la referencia es al link no al archivo blade eso se encarga el pageController -->
				<a class="{{ request() ->is('/')? 'active' :'' }}" href= "{{ route('home') }}">Inicio</a>

				<!--  el simbolo de * es para que no importe lo que este alli igul lo toma como cierto -->
				<a class="{{ request() ->is('servicios/*')? 'active' :'' }}" href= "{{ route('servicios', 'herick') }}">       Servicios</a>
				<a class="{{ request() ->is('proyectos/*')? 'active' :'' }}" href="{{ route('proyectos', '') }}">Proyectos</a>
				<a class="{{ request() ->is('contactanos')? 'active' :'' }}" href="{{ route('contactos') }}">Contacto</a>
			</nav>
		</div>
	</header>
		<!-- esto porque aqui debajo iria el contenido de la pagina sin afectar el layout-->
		@yield('contenido');
		<footer> Copyright ° herick  {{ date('Y') }}</footer>
    </body>
</html>