<!DOCTYPE html>
<html lang="en">
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0, maximum-scale-1">
	<head>
		<title>jerex</title>
		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-grid.min.css">
	</head>
	<body>
		@include('templates.partials.navigation')
		<div class="container mt-3">
			@include('templates.partials.alerts')
			@yield('content')
		</div>
	</body>
	<script  type='text/javascript' src="/assets/js/jquery-3.2.1.slim.min.js"></script>
	<script  type='text/javascript' src="/assets/js/popper.min.js"></script>
	<script  type='text/javascript' src="/assets/js/bootstrap.min.js"></script>
</html>