@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">


        <div class="col-lg-12 m-auto col-sm-12 col-md-12">
            <a href="{{ route('Product.Challan.Return') }}" class="btn btn-primary my-3">List</a>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">View Returned Challan</h3>
                </div>



                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Product: </b>{{ $returnedChallan->product->title }}</li>
                                <li class="list-group-item"><b>Quantity: </b>{{ $returnedChallan->quantity }}</li>
                                <li class="list-group-item"><b>Date: </b>{{ $returnedChallan->date }}</li>

                                <li class="list-group-item"><b>Created By: </b>{{ $returnedChallan->user->name }}</li>
                                <li class="list-group-item"><b>Customer Name: </b>{{ $returnedChallan->customer_name }}</li>

                            </ul>
                        </div>


                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Challan No: </b>{{ $returnedChallan->challan_no }}</li>
                                <li class="list-group-item"><b>Delivery Location:
                                    </b>{{ $returnedChallan->delivery_location }}</li>
                                <li class="list-group-item"><b>Contact Person: </b>{{ $returnedChallan->contact_person }}
                                </li>
                                <li class="list-group-item"><b>Contact Number: </b>{{ $returnedChallan->contact_number }}
                                </li>
                                <li class="list-group-item"><b>Challan Id: </b>{{ $returnedChallan->tran_id }}</li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
