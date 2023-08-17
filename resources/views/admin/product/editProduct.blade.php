@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">


        <div class="col-lg-8 m-auto col-sm-12 col-md-12">
            <a href="{{ route('product') }}" class="btn btn-primary my-3">List</a>

            <div class="card">
                <div class="card-header">
                    <h3>Edit Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update') }}" method="POST">
                        @csrf


                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Title</label>
                                    <input type="text" id="title" name="title" placeholder="Title"
                                        class="form-control" value="{{ $product->title }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Series</label>
                                    <input type="text" id="series" name="series" placeholder="Series"
                                        class="form-control" value="{{ $product->series }}">

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Details</label>
                                    <textarea name="details" id="details" cols="20" rows="4" class="form-control" placeholder="Details">
                                        {{ $product->details }}
                                    </textarea>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Model</label>
                                    <input type="text" id="model" name="model" placeholder="Model"
                                        class="form-control" value="{{ $product->model }}">

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="my-2 form-group">
                                    <label>Category</label>
                                    <select name="category" class="select py-2">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}"
                                                {{ $product->category == $category->name ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Brand</label>
                                    <input type="text" id="brand" name="brand" placeholder="Brand"
                                        class="form-control" value="{{ $product->brand }}">

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Origin</label>
                                    <input type="text" id="origin" name="origin" placeholder="Origin"
                                        class="form-control" value="{{ $product->origin }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Country of Manufacturing</label>
                                    <input type="text" id="country_of_manufacturing" name="country_of_manufacturing"
                                        placeholder="Country of manufacturing" class="form-control"
                                        value="{{ $product->country_of_manufacturing }}">
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Base Unit</label>
                                    <input type="number" id="base_unit" name="base_unit" placeholder="Base Unit"
                                        class="form-control" value="{{ $product->base_unit }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Current Price</label>
                                    <input type="number" id="current_price" name="current_price"
                                        placeholder="Current Price" class="form-control"
                                        value="{{ $product->current_price }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Current Stock</label>
                                    <input type="number" id="current_stock" name="current_stock"
                                        placeholder="Current Stock" class="form-control"
                                        value="{{ $product->current_stock }}">
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="my-2">
                                    <label>Stock Limit</label>
                                    <input type="number" id="stock_limit" name="stock_limit" placeholder="Stock Limit"
                                        class="form-control" value="{{ $product->stock_limit }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
