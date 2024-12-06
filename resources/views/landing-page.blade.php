<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Page Utama</title>
</head>
<body>
	<h1>Welcome, {{ $user->name }}</h1>
	<a href="/logout">Logout</a>
	<a href="/products">Produk Kami</a>
</body>
</html>
