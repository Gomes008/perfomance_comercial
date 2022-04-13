<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="/css/bootstrap.min.css">
   <link rel="stylesheet" href="/css/bootstrap-duallistbox.min.css">
   <link rel="stylesheet" href="/css/adminpro-custon-icon.css">
	<link rel="stylesheet" href="/css/styles.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

	<script src="/js/charts/highcharts.js"></script>
    <script src="/js/charts/highcharts-3d.js"></script>
    <script src="/js/charts/series-label.js"></script>
    <script src="/js/charts/offline-exporting.js"></script>
	
</head>
<body>
    <header>
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="collapse navbar-collapse" id="navbar">
				
				<ul class="navbar-nav">
					<li class="nav-item">
						<ion-icon name="school-outline"></ion-icon>
						<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
						 <span class="mini-dn">Agence</span> 
						<span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
						<div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
							<a href="#" class="dropdown-item">undefined</a>
						</div>
					</li>
					<li class="nav-item">
						<ion-icon name="folder-open-outline"></ion-icon>
						<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
						 <span class="mini-dn">Projects</span> 
						<span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
						<div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
							<a href="#" class="dropdown-item">undefined</a>
						</div>
					</li>
					<li class="nav-item">
						<ion-icon name="people-outline"></ion-icon>
						<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
						 <span class="mini-dn">Administrativo</span> 
						<span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
						<div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
							<a href="#" class="dropdown-item">undefined</a>
						</div>
					</li>
					<li class="nav-item">
						<ion-icon name="people-outline"></ion-icon>
						<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
						 <span class="mini-dn">Comercial</span> 
						<span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
						<div role="menu" class="dropdown-menu animated flipInX">
							<a href="/inicio" class="dropdown-item">Perfomance Comercial</a>
						</div>
					</li>
					<li class="nav-item">
						<ion-icon name="wallet-outline"></ion-icon>
						<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
						 <span class="mini-dn">Fiananceiro</span> 
						<span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
						<div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
							<a href="#" class="dropdown-item">undefined</a>
						</div>
					</li>
					<li class="nav-item">
						<ion-icon name="person-outline"></ion-icon>
						<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
						 <span class="mini-dn">usuario</span> 
						<span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
						<div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
							<a href="#" class="dropdown-item">undefined</a>
						</div>
					</li>
				</ul>
				<a href="/" class="navbar-brand">
					<img src="/img/logo.gif" alt="comercial">
				</a>
			</div>
		</nav>
	</header>

    <main>
        <div class="container-fluid">
			<div class="row">
				@if(session('msg'))
					<p class="msg">{{ session('msg') }}</p>
				@endif
				@yield('content')  
            </div>
        </div>
    </main>

	<footer>
		<p>Perfomance Comercial &copy; {{ date('Y') }}</p>
	</footer>

	<!-- JS -->
	<script src="/js/my_ajax.js"></script>
	<script src="/js/jquery-1.11.3.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.bootstrap-duallistbox.js"></script>
	<script src="/js/duallistbox.active.js"></script>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>