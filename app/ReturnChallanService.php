<?php

namespace App;

use App\Models\ChallanInfo;
use App\Models\ChallanProduct;
use App\Models\ChallanReturn;
use App\Models\ChallanReturnInfo;
use App\Models\ChallanReturnProduct;
use App\Models\Product;
use App\Models\TransactionBundle;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReturnChallanService
{

    private $product_id, $quantity, $date, $customerName, $challanNo, $deliveryLocation, $contactPerson, $contactNumber, $challanId;


    public function return()
    {
        $returnedChallan = ChallanInfo::where('returnable', 'Yes')->get();
        return $returnedChallan;
    }



    public function setProduct($value)
    {
        $this->product_id = $value;
        return $this;
    }

    public function setQuantity($value)
    {
        $this->quantity = $value;
        return $this;
    }


    public function setDate($value)
    {
        $this->date = $value;
        return $this;
    }


    public function setCustomerName($value)
    {
        $this->customerName = $value;
        return $this;
    }


    public function setChallanNo($value)
    {
        $this->challanNo = $value;
        return $this;
    }


    public function setDeliveryLocation($value)
    {
        $this->deliveryLocation = $value;
        return $this;
    }



    public function setContactPerson($value)
    {
        $this->contactPerson = $value;
        return $this;
    }


    public function setContactNumber($value)
    {
        $this->contactNumber = $value;
        return $this;
    }


    public function setChallanId($value)
    {
        $this->challanId = $value;
        return $this;
    }



    public function save()
    {

        $challan = new ChallanReturn();

        if (ChallanReturn::where('product_id', $this->product_id)->where('tran_id', $this->challanId)->exists()) {


            ChallanReturn::where('product_id', $this->product_id)->increment('quantity', $this->quantity);

            // manage stock
            Product::findOrFail($this->product_id)->increment('current_stock', $this->quantity);
        } else {

            $challan->product_id = $this->product_id;
            $challan->quantity = $this->quantity;
            $challan->date = $this->date;
            $challan->created_by = Auth::id();
            $challan->tran_id = $this->challanId;
            $challan->customer_name = $this->customerName;
            $challan->challan_no = $this->challanNo;
            $challan->delivery_location = $this->deliveryLocation;
            $challan->contact_person = $this->contactPerson;
            $challan->contact_number = $this->contactNumber;
            $challan->created_at = Carbon::now();
            $challan->save();

            // manage stock
            Product::findOrFail($this->product_id)->increment('current_stock', $this->quantity);

            // insert data into transactions
            $transaction = new TransactionBundle();
            $transaction->type = 'Challan Return';
            $transaction->date = Carbon::now();
            $transaction->type_id = $this->challanId;
            $transaction->save();
        }
    }

    public function view($id)
    {
        $challan = ChallanReturn::findOrFail($id);
        return $challan;
    }


    public function complete($bundleId)
    {
        $challanProducts =  ChallanProduct::where('bundle_id', $bundleId)->get();

        foreach ($challanProducts as $challan) {

            // insert data into challan_return_products
            $returnProduct = new ChallanReturnProduct();
            $returnProduct->bundle_id = '1112';
            $returnProduct->product_id = 111;
            $returnProduct->quantity = 12;
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
        $challanReturnInfo->bundle_id = $bundleId;
        $challanReturnInfo->customer_name = $challan->customerName;
        $challanReturnInfo->challan_no = $challan->challanNo;
        $challanReturnInfo->delivery_location = $challan->deliveryLocation;
        $challanReturnInfo->contact_person = $challan->contactPerson;
        $challanReturnInfo->contact_number = $challan->contactNumber;
        $challanReturnInfo->work_order_no = $challan->workOrderNo;
        $challanReturnInfo->created_at = Carbon::now();
        $challanReturnInfo->save();


        // insert data into transactions
        $transaction = new TransactionBundle();
        $transaction->type = 'Challan Return';
        $transaction->date = Carbon::now();
        $transaction->bundle_id = $bundleId;
        $transaction->save();
    }
}
