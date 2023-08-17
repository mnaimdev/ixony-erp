@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">


        <div class="col-lg-12 m-auto col-sm-12 col-md-12">
            <a href="{{ route('product') }}" class="btn btn-primary my-3">List</a>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">View Product</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Title: </b>{{ $product->title }}</li>
                                <li class="list-group-item"><b>Series: </b>{{ $product->series }}</li>
                                <li class="list-group-item"><b>Details: </b>{{ $product->details }}</li>
                                <li class="list-group-item"><b>Model: </b>{{ $product->model }}</li>
                                <li class="list-group-item"><b>Category: </b>{{ $product->category }}</li>
                                <li class="list-group-item"><b>Brand: </b>{{ $product->brand }}</li>

                            </ul>
                        </div>


                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Origin: </b>{{ $product->origin }}</li>
                                <li class="list-group-item"><b>Country of Manufacturing:
                                    </b>{{ $product->country_of_manufacturing }}</li>
                                <li class="list-group-item"><b>Base Unit: </b>{{ $product->base_unit }}</li>
                                <li class="list-group-item"><b>Current Price: </b>{{ $product->current_price }}</li>
                                <li class="list-group-item"><b>Current Stock: </b>{{ $product->current_stock }}</li>
                                <li class="list-group-item"><b>Stock Limit: </b>{{ $product->stock_limit }}</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
