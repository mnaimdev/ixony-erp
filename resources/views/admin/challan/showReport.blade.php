@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <a href="{{ route('Report') }}" class="btn btn-info my-3 mx-3">Report</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="printContent">
                    <div class="card-header">
                        <div class="d-flex">
                            <img src="{{ asset('ixony.png') }}" alt="">
                            <h3>Engineering Limited</h3>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Total Product</th>
                            </tr>

                            @if ($reports != '')
                                @forelse ($reports as $sl => $report)
                                    @if ($report->type == 'Purchase')
                                        @php
                                            $product = App\Models\PurchaseProduct::where('bundle_id', $report->bundle_id)->count();
                                        @endphp
                                    @elseif($report->type == 'Challan')
                                        @php
                                            $product = App\Models\ChallanProduct::where('bundle_id', $report->bundle_id)->count();
                                        @endphp
                                    @else
                                        @php
                                            $product = App\Models\ChallanReturnProduct::where('bundle_id', $report->bundle_id)->count();
                                        @endphp
                                    @endif


                                    <tr class="report" data-url="{{ route('Report.Product', $report->bundle_id) }}">
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $report->type }}</td>
                                        <td>{{ $report->date }}</td>
                                        <td>{{ $product }}</td>
                                    </tr>

                                @empty
                                    No Records Found
                                @endforelse
                            @endif


                        </table>

                    </div>
                </div>


            </div>

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        const report = document.querySelectorAll('.report');
        report.forEach((item) => {
            item.addEventListener('click', function() {
                let dataURL = item.getAttribute('data-url');
                location.href = dataURL;
            });
        });
    </script>
@endsection
