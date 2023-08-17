@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="row">

            <div class="col-lg-8 m-auto col-sm-12 col-md-12">
                <a href="{{ route('Product.Challan.List') }}" class="btn btn-primary my-3">List</a>

                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2 text-center">Edit Purchase</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Product.Challan.Update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $challan->id }}">


                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Date</label>
                                    <input type="date" id="date" name="date" placeholder="Date"
                                        class="form-control" value="{{ $challan->date }}">

                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Challan No</label>
                                    <input type="text" id="challan_no" name="challan_no" placeholder="Challan No"
                                        class="form-control" value="{{ $challan->challan_no }}">

                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Work Order No</label>
                                    <input type="text" id="work_order_no" name="work_order_no"
                                        placeholder="Work Order No" class="form-control"
                                        value="{{ $challan->work_order_no }}">

                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Customer Name</label>
                                    <input type="text" id="customer_name" name="customer_name"
                                        placeholder="Customer Name" class="form-control"
                                        value="{{ $challan->customer_name }}">
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
                                        value="{{ $challan->delivery_location }}">

                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Contact Person</label>
                                    <input type="text" id="contact_person" name="contact_person"
                                        placeholder="Contact Person" class="form-control"
                                        value="{{ $challan->contact_person }}">

                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Contact Number</label>
                                    <input type="number" id="contact_number" name="contact_number"
                                        placeholder="Contact Number" class="form-control"
                                        value="{{ $challan->contact_number }}">

                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Returnable</label>
                                    <select name="returnable" class="form-control">
                                        <option selected disabled>Is Returnable</option>
                                        <option value="Yes" {{ $challan->returnable == 'Yes' ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="No" {{ $challan->returnable == 'No' ? 'selected' : '' }}>No
                                        </option>
                                    </select>

                                </div>
                            </div>


                            <div class="my-2">
                                <button type="submit" class="btn btn-primary">Update</button>

                            </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
    </div>
@endsection
