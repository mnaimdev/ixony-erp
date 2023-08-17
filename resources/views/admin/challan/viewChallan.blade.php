@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">


        <div class="col-lg-12 m-auto col-sm-12 col-md-12">
            <a href="{{ route('Product.Challan.List') }}" class="btn btn-primary my-3">List</a>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">View Challan</h3>
                </div>



                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-group">

                                <li class="list-group-item"><b>Date: </b>{{ $challan->date }}</li>
                                <li class="list-group-item"><b>Challan No: </b>{{ $challan->challan_no }}</li>
                                <li class="list-group-item"><b>Work Order No: </b>{{ $challan->work_order_no }}</li>
                                <li class="list-group-item"><b>Status: </b>{{ $challan->status }}</li>
                                <li class="list-group-item"><b>Created By: </b>{{ $challan->user->name }}</li>


                            </ul>
                        </div>


                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Customer Name: </b>{{ $challan->customer_name }}</li>
                                <li class="list-group-item"><b>Contact Person: </b>{{ $challan->contact_person }}</li>
                                <li class="list-group-item"><b>Contact Number: </b>{{ $challan->contact_number }}</li>
                                <li class="list-group-item"><b>Delivery Location:
                                    </b>{{ $challan->delivery_location }}</li>
                                <li class="list-group-item"><b>Returnable Type: </b>{{ $challan->returnable }}</li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
