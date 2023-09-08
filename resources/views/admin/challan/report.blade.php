@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Report Generate</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Report.Generate') }}" method="POST" class="my-3">

                            @csrf

                            <div class="my-2">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control">
                            </div>

                            <div class="my-2">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control">
                            </div>

                            <div class="my-2">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option>Type</option>
                                    <option value="Purchase">Purchase</option>
                                    <option value="Challan">Challan</option>
                                    <option value="Return">Return</option>
                                </select>
                            </div>

                            @can('report_submit')
                                <div class="my-2">
                                    <button type="submit" class="btn btn-primary mx-2">Submit</button>
                                </div>
                            @endcan

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
@endsection
