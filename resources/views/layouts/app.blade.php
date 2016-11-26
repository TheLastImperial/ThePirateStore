<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>The Pirate Store</title>
		<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
		@yield('styles')
	</head>
	<body>
		
		@yield('content')
		<script src='<?= asset("js/jquery.min.js") ?>'></script>
		@yield('scripts')
	</body>
</html>