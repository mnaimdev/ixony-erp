@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2 text-center">{{ $type }} Report</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">

                            <tr>
                                <th>SL</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Date</th>
                            </tr>
                            @foreach ($products as $sl => $product)
                                <tr>

                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $product->product->model }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $date->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
