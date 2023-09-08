@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">

        @can('add_product')
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
                Add New
            </button>
        @endcan

        {{-- <button onclick="print()" class="btn btn-info">Print</button> --}}
        @can('download_product')
            <a class="btn btn-info" href="{{ route('product.download') }}">Download</a>
        @endcan


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
                        {{-- products table --}}
                        <div class="main-table">
                            <table class="table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Series</th>
                                        <th>Model</th>
                                        <th>Brand</th>
                                        <th>Stock</th>
                                        <th>
                                            <div class="d-flex justify-content-center">
                                                Action
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $sl => $product)
                                        <tr>
                                            <td>{{ $sl + 1 }}</td>
                                            <td>{{ $product->title == '' ? 'NA' : $product->title }}</td>
                                            <td>{{ $product->series == '' ? 'NA' : $product->series }}</td>
                                            <td>{{ $product->model == '' ? 'NA' : $product->model }}</td>
                                            <td>{{ $product->brand == '' ? 'NA' : $product->brand }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    {{ $product->current_stock == '' ? 'NA' : $product->current_stock }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center" style="flex-wrap: nowrap;">
                                                    <div class="col my-2">
                                                        @can('view_product')
                                                            <a href="{{ route('product.view', $product->id) }}"
                                                                class="btn-sm btn-info text-white">View</a>
                                                        @endcan
                                                    </div>

                                                    <div class="col my-2">
                                                        @can('edit_product')
                                                            <a href="{{ route('product.edit', $product->id) }}"
                                                                class="btn-sm btn-primary">Edit</a>
                                                            </button>
                                                        @endcan
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>



            <!-- Modal -->
            {{-- create product --}}
            <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLabel">Create New Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('product.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Title</label>
                                            <input type="text" id="title" name="title" placeholder="Title"
                                                class="form-control" value="{{ old('title') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Series</label>
                                            <input type="text" id="series" name="series" placeholder="Series"
                                                class="form-control" value="{{ old('series') }}">
                                            @error('series')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Details</label>
                                            <textarea name="details" id="details" cols="20" rows="4" class="form-control" placeholder="Details">{{ old('details') }}</textarea>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Model</label>
                                            <input type="text" id="model" name="model" placeholder="Model"
                                                class="form-control" value="{{ old('model') }}">

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Category</label>
                                            <select name="category" class="select form-control" style="width:  100%">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Brand</label>
                                            <input type="text" id="brand" name="brand" placeholder="Brand"
                                                class="form-control" value="{{ old('brand') }}">

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Origin</label>
                                            <input type="text" id="origin" name="origin" placeholder="Origin"
                                                class="form-control" value="{{ old('origin') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Country of Manufacturing</label>
                                            <input type="text" id="country_of_manufacturing"
                                                name="country_of_manufacturing" placeholder="Country of manufacturing"
                                                class="form-control" value="{{ old('country_of_manufacturing') }}">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Base Unit</label>
                                            <input type="number" id="base_unit" name="base_unit"
                                                placeholder="Base Unit" class="form-control"
                                                value="{{ old('base_unit') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Current Price</label>
                                            <input type="number" id="current_price" name="current_price"
                                                placeholder="Current Price" class="form-control"
                                                value="{{ old('current_price') }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Current Stock</label>
                                            <input type="number" id="current_stock" name="current_stock"
                                                placeholder="Current Stock" class="form-control"
                                                value="{{ old('current_stock') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="my-2">
                                            <label>Stock Limit</label>
                                            <input type="number" id="stock_limit" name="stock_limit"
                                                placeholder="Stock Limit" class="form-control"
                                                value="{{ old('stock_limit') }}">
                                        </div>
                                    </div>
                                </div>





                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('scripts')
    <script>
        function print() {
            var divContents = document.getElementById("card").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
