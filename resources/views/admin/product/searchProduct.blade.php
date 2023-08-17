@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Searching Products</h3>
                    </div>
                    <div class="card-body">


                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Series</th>
                                    <th>Model</th>
                                    <th>Brand</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $sl => $product)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $product->title == '' ? 'NA' : $product->title }}</td>
                                        <td>{{ $product->series == '' ? 'NA' : $product->series }}</td>
                                        <td>{{ $product->model == '' ? 'NA' : $product->model }}</td>
                                        <td>{{ $product->brand == '' ? 'NA' : $product->brand }}</td>
                                        <td>{{ $product->current_stock == '' ? 'NA' : $product->current_stock }}</td>
                                        <td>
                                            <a href="{{ route('product.view', $product->id) }}"
                                                class="btn btn-info text-white">View</a>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            </button>

                                        </td>
                                    </tr>
                                @empty
                                    No Product Match
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
