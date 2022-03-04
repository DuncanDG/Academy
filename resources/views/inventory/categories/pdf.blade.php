<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Categories</h2>

        <table class="table">
            {{-- the scope=col specifies that the column is a header row for --}}
            <thead class="thead-primary text-light">
                <th scope="col">Name</th>
                <th scope="col">products</th>
                <th scope="col">Total Stock</th>
                <th scope="col">Defective Stock</th>
                <th scope="col">Average Price of Product</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->name}}</td>
                    {{-- count the number of products that are in this category --}}
                    <td>{{count($category->products)}}</td> 
                    {{-- we are adding all the stock in products that are in this category --}}
                    {{-- stock is in products table  --}}
                    <td>{{$category->products->sum('stock')}}</td> 
                    {{-- add the number of defective stock in products in this category   --}}
                    <td>{{$category->products->sum('stock_defective')}}</td>
                    <td>{{$category->products->avg('price')}}</td>
                  </tr>      
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>