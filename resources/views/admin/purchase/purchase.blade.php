@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">
        @can('add_purchase')
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
                Add New
            </button>
        @endcan


        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Purchase List</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Purchase From</th>
                                <th>Supplier Challan No</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($purchases as $sl => $purchase)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $purchase->date }}</td>
                                    <td>{{ $purchase->purchase_from }}</td>
                                    <td>{{ $purchase->supplier_challan_no }}</td>
                                    <td>{{ $purchase->details }}</td>
                                    <td>
                                        @can('edit_purchase')
                                            <a href="{{ route('Product.Purchase.Edit', $purchase->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        @endcan

                                        @can('purchase_product')
                                            <a href="{{ route('Purchase.Product.Add', $purchase->bundle_id) }}"
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
                            <h5 class="modal-title m-auto" id="exampleModalLabel">Create New Purchase</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('Product.Purchase.Store') }}" method="POST">
                                @csrf




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
                                        <label>Purchase From</label>
                                        <input type="text" id="purchase_from" name="purchase_from"
                                            placeholder="Purchase From" class="form-control"
                                            value="{{ old('purchase_from') }}">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Supplier Challan No</label>
                                        <input type="text" id="supplier_challan_no" name="supplier_challan_no"
                                            placeholder="Supplier Challan No" class="form-control"
                                            value="{{ old('supplier_challan_no') }}">
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <div class="my-2">
                                        <label>Details</label>
                                        <textarea name="details" id="details" cols="20" rows="4" class="form-control">{{ old('details') }}</textarea>
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
