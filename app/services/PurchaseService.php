<?php

namespace App\services;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseInfo;
use App\Models\PurchaseProduct;
use App\Models\TransactionBundle;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PurchaseService
{
    private $productId, $quantity, $date, $purchaseFrom, $supplierChallanNo, $details, $bundleId;

    public function purchase()
    {
        $purchase = PurchaseInfo::all();
        return $purchase;
    }


    public function purchaseProductList($bundleId)
    {
        $purchaseProducts = PurchaseProduct::where('bundle_id', $bundleId)->get();
        return $purchaseProducts;
    }


    public function product()
    {
        $products = Product::all();
        return $products;
    }


    public function setProduct($value)
    {
        $this->productId = $value;
        return $this;
    }

    public function setQuantity($value)
    {
        $this->quantity = $value;
        return $this;
    }

    public function setBundleId($value)
    {
        $this->bundleId = $value;
        return $this;
    }


    public function setDate($value)
    {
        $this->date = $value;
        return $this;
    }


    public function setPurchaseFrom($value)
    {
        $this->purchaseFrom = $value;
        return $this;
    }


    public function setSupplierChallanNo($value)
    {
        $this->supplierChallanNo = $value;
        return $this;
    }


    public function setDetails($value)
    {
        $this->details = $value;
        return $this;
    }



    public function save()
    {

        $bundleId = 'purchase' . '-' . rand(111111, 9999999);
        $purchase = new PurchaseInfo();


        $purchase->date = $this->date;
        $purchase->created_by = Auth::id();
        $purchase->purchase_from = $this->purchaseFrom;
        $purchase->supplier_challan_no = $this->supplierChallanNo;
        $purchase->details = $this->details;
        $purchase->bundle_id = $bundleId;
        $purchase->created_at = Carbon::now();
        $purchase->save();


        // insert data into transactions
        $transaction = new TransactionBundle();
        $transaction->type = 'Purchase';
        $transaction->date = $this->date;
        $transaction->bundle_id = $bundleId;
        $transaction->save();
    }


    public function update($id)
    {

        $purchase = PurchaseInfo::findOrFail($id);
        $purchase->date = $this->date;
        $purchase->created_by = Auth::id();
        $purchase->purchase_from = $this->purchaseFrom;
        $purchase->supplier_challan_no = $this->supplierChallanNo;
        $purchase->details = $this->details;
        $purchase->created_at = Carbon::now();
        $purchase->update();
    }


    public function edit($id)
    {
        $purchase = PurchaseInfo::findOrFail($id);
        return $purchase;
    }



    public function purchaseProduct()
    {

        if (PurchaseProduct::where('product_id', $this->productId)->where('bundle_id', $this->bundleId)->exists()) {
            PurchaseProduct::where('product_id', $this->productId)->where('bundle_id', $this->bundleId)->increment('quantity', $this->quantity);

            // stock manage
            Product::where('id', $this->productId)->increment('current_stock', $this->quantity);
        } else {
            $purchase  = new PurchaseProduct();
            $purchase->product_id = $this->productId;
            $purchase->quantity = $this->quantity;
            $purchase->bundle_id = $this->bundleId;
            $purchase->created_at = Carbon::now();
            $purchase->save();


            // stock manage
            Product::where('id', $this->productId)->increment('current_stock', $this->quantity);
        }
    }
}
