<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>

<body>
    <h1>Products</h1>
    <h3>Search for products:</h3>
    <form action="" method="post">
        @csrf
        <input type="text" name="name" id="id" placeholder="product name" value={{ old('name') }}>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">Send</button>
    </form>

    @if (Session::has('successmessage'))
        <div>{{ Session::get('successmessage') }}</div>
    @endif

    @if (Session::has('products'))
        @foreach (Session::get('products') as $product)
            <h4>{{ $product['name'] }}</h4>
            <ul>
                <li>Details: {{ $product['detail'] }}</li>
                <li>Price: {{ $product['price'] }}</li>
                <li>In Stock: {{ $product['stock'] }}</li>
                <li>Discount: {{ $product['discount'] }}</li>
            </ul>
        @endforeach
    @endif

</body>

</html>
