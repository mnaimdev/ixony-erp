@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Returnable Challan</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Challan No</th>
                                <th>Work Order No</th>
                                <th>Customer Name</th>
                                <th>Action</th>
                            </tr>
                            @forelse ($returnedChallan as $sl => $challan)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $challan->date }}</td>
                                    <td>{{ $challan->challan_no }}</td>
                                    <td>{{ $challan->work_order_no }}</td>
                                    <td>{{ $challan->customer_name }}</td>


                                    @can('return_challan_complete')
                                        <td>
                                            <a href="{{ route('Challan.Return.Complete', $challan->bundle_id) }}"
                                                class="btn btn-primary">Complete</a>

                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                No Returnable Challan
                            @endforelse

                        </table>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            {{-- create purchase --}}
            {{-- <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLabel">Return Challan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('Product.Challan.Return.Store') }}" method="POST">
                                @csrf

                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Product</label>
                                        <select name="product_id" id="product_id" class="form-control select"
                                            style="width: 100%;">
                                            <option selected disabled>Select Product</option>
                                            @forelse ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->model }}</option>
                                            @endforeach
                                        </select>

                                        @error('product_id')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
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
                                </div>


                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Date</label>
                                        <input type="date" id="date" name="date" placeholder="Date"
                                            class="form-control" value="{{ old('date') }}">
                                        @error('date')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Customer Name</label>
                                        <input type="text" id="customer_name" name="customer_name"
                                            placeholder="Customer Name" class="form-control"
                                            value="{{ old('customer_name') }}">
                                        @error('customer_name')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Challan No</label>
                                        <input type="text" id="challan_no" name="challan_no" placeholder="Challan No"
                                            class="form-control" value="{{ old('challan_no') }}">

                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Challan Id</label>
                                        <select name="challan_id" id="challan_id" class="select" style="width: 100%">
                                            <option disabled selected>Select Challan Id</option>
                                            @foreach ($challans as $challan)
                                                <option value="{{ $challan->tran_id }}">{{ $challan->tran_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Delivery Location</label>
                                        <input type="text" id="delivery_location" name="delivery_location"
                                            placeholder="Delivery Location" class="form-control"
                                            value="{{ old('delivery_location') }}">

                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Contact Person</label>
                                        <input type="text" id="contact_person" name="contact_person"
                                            placeholder="Contact Person" class="form-control"
                                            value="{{ old('contact_person') }}">

                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Contact Number</label>
                                        <input type="number" id="contact_number" name="contact_number"
                                            placeholder="Contact Number" class="form-control"
                                            value="{{ old('contact_number') }}">

                                    </div>
                                </div>


                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection


@section('scripts')
    <script>
        @error('product_id')
            $('#exampleModal').modal('show');
        @enderror

        @error('quantity')
            $('#exampleModal').modal('show');
        @enderror

        @error('price')
            $('#exampleModal').modal('show');
        @enderror

        @error('date')
            $('#exampleModal').modal('show');
        @enderror

        @error('challan_id')
            $('#exampleModal').modal('show');
        @enderror
    </script>
@endsection
