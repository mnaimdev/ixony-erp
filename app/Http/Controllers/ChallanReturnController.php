<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use App\Models\ChallanInfo;
use App\Models\ChallanProduct;
use App\Models\ChallanReturnInfo;
use App\Models\ChallanReturnProduct;
use App\Models\Product;
use App\Models\TransactionBundle;
use App\ReturnChallanService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallanReturnController extends Controller
{
    public function returnChallanProduct()
    {
        try {
            $service = new ReturnChallanService();
            $returnedChallan = $service->return();
            // $products = Product::all();
            // $challans = Challan::all();

            return view('admin.return.returnChallan', [
                'returnedChallan'      => $returnedChallan,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function returnChallanProductStore(Request $request)
    {
        $request->validate([
            'quantity'          => 'required',
            'product_id'        => 'required',
            'date'              => 'required',
            'challan_id'        => 'required',
        ]);

        try {
            $service = new ReturnChallanService();
            $service->setProduct($request->product_id)
                ->setQuantity($request->quantity)
                ->setDate($request->date)
                ->setCustomerName($request->customer_name)
                ->setChallanNo($request->challan_no)
                ->setDeliveryLocation($request->delivery_location)
                ->setContactPerson($request->contact_person)
                ->setContactNumber($request->contact_number)
                ->setChallanId($request->challan_id)
                ->save();

            $notification = array(
                'message'       => 'Challan Returned',
                'alert-type'    => 'warning',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function returnChallanProductView($id)
    {
        try {
            $service = new ReturnChallanService();
            $returnedChallan = $service->view($id);
            return view('admin.return.viewChallanReturn', [
                'returnedChallan'       => $returnedChallan,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function challanReturnComplete($bundleId)
    {
        try {
            $challanProducts =  ChallanProduct::where('bundle_id', $bundleId)->get();

            foreach ($challanProducts as $challan) {

                // insert data into challan_return_products
                $returnProduct = new ChallanReturnProduct();
                $returnProduct->bundle_id = $challan->bundle_id;
                $returnProduct->product_id = $challan->product_id;
                $returnProduct->quantity = $challan->quantity;
                $returnProduct->created_at = Carbon::now();
                $returnProduct->save();

                // stock manage
                Product::where('id', $challan->product_id)->increment('current_stock', $challan->quantity);
            }


            // update challan returnable type
            ChallanInfo::where('bundle_id', $bundleId)->update([
                'returnable'    => 'Returned',
            ]);

            // insert data into challan_return_infos

            $challan = ChallanInfo::where('bundle_id', $bundleId)->first();
            $challanReturnInfo = new ChallanReturnInfo();

            $challanReturnInfo->date = $challan->date;
            $challanReturnInfo->created_by = Auth::id();
            $challanReturnInfo->bundle_id = $challan->bundle_id;
            $challanReturnInfo->customer_name = $challan->customer_name;
            $challanReturnInfo->challan_no = $challan->challan_no;
            $challanReturnInfo->delivery_location = $challan->delivery_location;
            $challanReturnInfo->contact_person = $challan->contact_person;
            $challanReturnInfo->contact_number = $challan->contact_number;
            $challanReturnInfo->work_order_no = $challan->work_order_no;
            $challanReturnInfo->created_at = Carbon::now();
            $challanReturnInfo->save();


            // insert data into transactions
            $transaction = new TransactionBundle();
            $transaction->type = 'Challan Return';
            $transaction->date = Carbon::now();
            $transaction->bundle_id = $bundleId;
            $transaction->save();

            return back()->with(['message'  => 'Challan Returned', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
