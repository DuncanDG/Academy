<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Products</h2>

        <table class="table table-bordered mb-5">
            <thead class="thead-primary  text-primary">
                <th scope="col">Category</th>
                <th scope="col">Product</th>
                <th scope="col">Base Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Faulty</th>
                <th scope="col">Total Sold</th>
                <th scope="col">#</th>
            </thead>
            <tbody> 
               @foreach ($products as $data)
                   <tr>
                       <td>{{$data->category->name }}</a></td>
                       <td>{{$data->name}}</td>
                       <td>{{$data->price}}</td>
                       <td>{{$data->stock}}</td>
                       <td>{{$data->stock_defective}}</td>
                       <td>#</td>
                   </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
