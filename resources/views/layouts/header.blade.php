<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Alternar de navegação</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" rel="home" href="#">Catalogo</a>
	</div>

	<div class="collapse navbar-collapse">

		<ul class="nav navbar-nav">
			<li><a href="#">Produtos</a></li>
			<li><a href="#">Categorias</a></li>
		</ul>
		<div class="pull-right">
			<div class="navbar-text">Usuario (<a href="{{ url('auth/logout') }}">Sair</a>)</div>
		</div>

	</div>
</div>
