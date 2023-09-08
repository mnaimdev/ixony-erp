@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">
        @can('add_challan')
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
                Add New
            </button>
        @endcan


        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Challan List</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Challan No</th>
                                <th>Work Order No</th>
                                <th>Return Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($challans as $sl => $challan)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $challan->date }}</td>
                                    <td>{{ $challan->challan_no }}</td>
                                    <td>{{ $challan->work_order_no }}</td>
                                    <td>{{ $challan->returnable }}</td>

                                    <td>
                                        @can('challan_status')
                                            <div class="custom-control custom-switch">
                                                <input data-id="{{ $challan->id }}" class="toggle-class" type="checkbox"
                                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                    data-on="Active" data-off="InActive"
                                                    {{ $challan->status == 'Pending' ? '' : 'checked' }}>

                                            </div>
                                        @endcan



                                    </td>

                                    <td>
                                        @can('edit_challan')
                                            <a href="{{ route('Product.Challan.Edit', $challan->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        @endcan


                                        @can('view_challan')
                                            <a href="{{ route('Product.Challan.View', $challan->id) }}"
                                                class="btn btn-primary">View</a>
                                        @endcan

                                        @can('challan_product')
                                            <a href="{{ route('Challan.Product.Add', $challan->bundle_id) }}"
                                                class="btn btn-info">Product</a>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            {{-- create purchase --}}
            <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLabel">Create New Challan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('Product.Challan.Store') }}" method="POST">
                                @csrf

                                {{-- <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Product</label>
                                        <select name="product_id" id="product_id" class="form-control select"
                                            style="width: 100%;">
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
                                </div> --}}


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
                                        <label>Challan No</label>
                                        <input type="text" id="challan_no" name="challan_no" placeholder="Challan No"
                                            class="form-control" value="{{ old('challan_no') }}">

                                        @error('challan_no')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Work Order No</label>
                                        <input type="text" id="work_order_no" name="work_order_no"
                                            placeholder="Work Order No" class="form-control"
                                            value="{{ old('work_order_no') }}">

                                        @error('work_order_no')
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



                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Returnable</label>
                                        <select name="returnable" class="form-control">
                                            <option selected disabled>Is Returnable</option>
                                            <option value="Yes" {{ old('returnable') == 'Yes' ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="No" {{ old('returnable') == 'No' ? 'selected' : '' }}>No
                                            </option>
                                        </select>


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
    {{-- <script>
        @error('date')
            $('#exampleModal').modal('show');
        @enderror

        @error('challan_no')
            $('#exampleModal').modal('show');
        @enderror

        @error('work_order_no')
            $('#exampleModal').modal('show');
        @enderror
    </script> --}}



    <script>
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 'Complete' : 'Pending';
            var id = $(this).data('id');


            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/challanStatus',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    alert(data.success);
                }
            });
        })
    </script>
@endsection
