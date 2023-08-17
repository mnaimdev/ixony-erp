@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="row">

            <div class="col-lg-8 m-auto col-sm-12 col-md-12">
                <a href="{{ route('Product.Purchase.List') }}" class="btn btn-primary my-3">List</a>

                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2 text-center">Edit Purchase</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Product.Purchase.Update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $purchase->id }}">


                            <div class="my-2">
                                <label>Date</label>
                                <input type="date" id="date" name="date" placeholder="Date" class="form-control"
                                    value="{{ $purchase->date }}">
                            </div>


                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Purchase From</label>
                                    <input type="text" id="purchase_from" name="purchase_from"
                                        placeholder="Purchase From" class="form-control"
                                        value="{{ $purchase->purchase_from }}">
                                </div>
                            </div>



                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Supplier Challan No</label>
                                    <input type="text" id="supplier_challan_no" name="supplier_challan_no"
                                        placeholder="Supplier Challan No" class="form-control"
                                        value="{{ $purchase->supplier_challan_no }}">
                                </div>
                            </div>



                            <div class="col-lg-12">
                                <div class="my-2">
                                    <label>Details</label>
                                    <textarea name="details" id="details" cols="20" rows="5" class="form-control">{{ $purchase->details }}</textarea>
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
