<?php

namespace App\Http\Controllers;

use App\Models\ChallanInfo;
use App\Models\ChallanProduct;
use App\Models\ChallanReturnProduct;
use App\Models\PurchaseProduct;
use App\Models\TransactionBundle;
use App\ReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        try {
            return view('admin.challan.report');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function reportGenerate(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $type = $request->type;

        $service = new ReportService();
        $reports = $service->setStartDate($request->start_date)
            ->setEndDate($request->end_date)
            ->setType($request->type)
            ->report();

        return redirect()->route('Report.Generate.List')->with('reports', $reports);
    }


    public function reportGenerateList()
    {
        return view('admin.challan.showReport', [
            'reports'    => session('reports'),
        ]);
    }


    public function productReport($bundleId)
    {


        try {

            $type = TransactionBundle::where('bundle_id', $bundleId)->first()->type;
            $date = Carbon::parse(TransactionBundle::where('bundle_id', $bundleId)->first()->date);

            if ($type == 'Challan') {
                $products = ChallanProduct::where('bundle_id', $bundleId)->get();
                $type = 'Challan';
            } else if ($type == 'Purchase') {
                $products = PurchaseProduct::where('bundle_id', $bundleId)->get();
                $type = 'Purchase';
            } else {
                $products = ChallanReturnProduct::where('bundle_id', $bundleId)->get();
                $type = 'Challan Return';
            }

            return view('admin.challan.reportProduct', [
                'products'  => $products,
                'date'      => $date,
                'type'      => $type,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function printReport($reports)
    {
        echo $reports;
    }
}
