<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Download</title>
</head>

<body>
    <div class="container" style="margin-top: 100px;">

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card" id="card">

                    <div class="card-header p-3">
                        <h4 class="text-center" style="color: rgb(204, 25, 25)">IXONY ENGINEERING LIMITED</h4>
                    </div>

                    <div class="card-body">

                        @if (session('category_del'))
                            <div class="alert alert-danger">
                                {{ session('category_del') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Series</th>
                                    <th>Model</th>
                                    {{-- <th>Brand</th> --}}
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $sl => $product)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $product->title == '' ? 'NA' : $product->title }}</td>
                                        <td>{{ $product->series == '' ? 'NA' : $product->series }}</td>
                                        <td>{{ $product->model == '' ? 'NA' : $product->model }}</td>
                                        {{-- <td>{{ $product->brand == '' ? 'NA' : $product->brand }}</td> --}}
                                        <td>{{ $product->current_stock == '' ? 'NA' : $product->current_stock }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>
