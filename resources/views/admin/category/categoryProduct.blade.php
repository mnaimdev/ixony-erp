@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2 text-center">{{ $name }}</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Series</th>
                                <th>Model</th>
                                <th>Current Stock</th>
                            </tr>
                            @foreach ($products as $sl => $product)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $product->title == '' ? 'NA' : $product->title }}</td>
                                    <td>{{ $product->series == '' ? 'NA' : $product->series }}</td>
                                    <td>{{ $product->model == '' ? 'NA' : $product->model }}</td>

                                    <td>{{ $product->current_stock == '' ? 'NA' : $product->current_stock }}</td>

                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
