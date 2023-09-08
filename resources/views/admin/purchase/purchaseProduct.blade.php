@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">
        @can('purchase')
            <a href="{{ route('Product.Purchase.List') }}" class="btn btn-primary my-3">Purchase List</a>
        @endcan


        <div class="row">

            @can('show_purchase_product')
                <div class="col-lg-8 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mt-2">Product Purchase List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>SL</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>
                                @foreach ($purchaseProducts as $sl => $product)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $product->product->model }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            @php
                                                $date = App\Models\PurchaseInfo::where('bundle_id', $bundleId)->first()->date;
                                            @endphp
                                            {{ $date }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            @endcan


            @can('add_purchase_product')
                <div class="col-lg-4 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Purchase.Product.Store') }}" method="POST">
                                @csrf


                                <input type="hidden" name="bundle_id" value="{{ $bundleId }}">

                                <div class="my-2">
                                    <label>Product</label>
                                    <select name="product_id" id="product_id" class="form-control select" style="width: 100%;">
                                        <option selected disabled>Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->model }}</option>
                                        @endforeach
                                    </select>

                                    @error('product_id')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>

                                <div class="my-2">
                                    <label>Quantity</label>
                                    <input type="number" id="quantity" name="quantity" placeholder="Quantity"
                                        class="form-control" value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="my-2">
                                    <button class="btn btn-primary">Add</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            @endcan


        </div>
    </div>
@endsection
