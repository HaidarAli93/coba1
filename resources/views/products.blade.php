<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" content="width=device-width, initial-scale=1.0">
	<title>Products</title>
	@vite('resources/css/app.css')
</head>
<body>
	@foreach ($productData['results'] as $product)
	<p>{{ $product['name'] }}, {{ $product['price']['value'] }}, {{ $product['categoryName'] }}</p>
	<div>
		<img src="{{ $product['images'][0]['baseUrl'] }}" alt="" class="size-20" />
	</div>
	@endforeach
</body>
</html>
