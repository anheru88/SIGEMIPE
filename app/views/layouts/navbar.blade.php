<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
	<div class="conjtainer">
		<!-- Menu button for smallar screens -->
		<div class="navbar-header">
			<button class="navbar-toggle btn-navbar collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span>Menu</span>
			</button>
			<!-- Site name for smallar screens -->
			<a href="index.html" class="navbar-brand hidden-lg">SIGEMIPE</a>
		</div>

		<!-- Navigation starts -->
		<nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation">         
			<!-- Links -->
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown pull-right">            
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<img src="{{ Auth::user()->imagen }}" alt="perfil" class="profile"/>	{{ Auth::user()->username }} <b class="caret"></b>              
					</a>

					<!-- Dropdown menu -->
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-user"></i> Perfil </a></li>
						<li><a href="{{ route('logout') }}"><i class="icon-off"></i> Cerrar Sesión </a></li>
					</ul>
				</li>

			</ul>
		</nav>

	</div>
</div>