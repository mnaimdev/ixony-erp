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
                        <div class="container">
                            <table class="table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Series</th>
                                        <th>Model</th>
                                        <th>Brand</th>
                                        <th>Stock</th>
                                        <th>
                                            <div class="w-100 text-center">
                                                Action
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $sl => $product)
                                        <tr>
                                            <td>{{ $sl + 1 }}</td>
                                            <td>{{ $product->title == '' ? 'NA' : $product->title }}</td>
                                            <td>
                                                {{ $product->series == '' ? 'NA' : substr($product->series, 0, 20) }}
                                                @if (strlen($product->series) >= 20)
                                                    ...
                                                @endif
                                            </td>
                                            <td>{{ $product->model == '' ? 'NA' : $product->model }}</td>
                                            <td>{{ $product->brand == '' ? 'NA' : $product->brand }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    {{ $product->current_stock == '' ? 'NA' : $product->current_stock }}
                                                </div>

                                            </td>
                                            <td>
                                                <div class="d-flex justify-containt-center my-2">
                                                    <div class="col">
                                                        <a href="{{ route('product.view', $product->id) }}"
                                                            class="btn-sm btn-info text-white">View</a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{ route('product.edit', $product->id) }}"
                                                            class="btn-sm btn-primary">Edit</a>
                                                    </div>
                                                </div>
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
    </div>
@endsection
