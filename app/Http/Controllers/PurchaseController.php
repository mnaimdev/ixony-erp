<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseProduct;
use App\services\PurchaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function productPurchaseList()
    {
        try {
            $service = new PurchaseService();
            $purchases = $service->purchase();

            return view('admin.purchase.purchase', [
                'purchases'      => $purchases,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productPurchaseStore(Request $request)
    {

        try {
            $service = new PurchaseService();

            $service
                ->setDate($request->date)
                ->setPurchaseFrom($request->purchase_from)
                ->setSupplierChallanNo($request->supplier_challan_no)
                ->setDetails($request->details)
                ->save();

            $notification = array(
                'message'       => 'Purchase Successful',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function productPurchaseEdit($id)
    {
        try {
            $service = new PurchaseService();
            $purchase = $service->edit($id);

            return view('admin.purchase.editPurchase', [
                'purchase'      => $purchase,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productPurchaseUpdate(Request $request)
    {

        try {
            $service = new PurchaseService();

            $service->setDate($request->date)
                ->setPurchaseFrom($request->purchase_from)
                ->setSupplierChallanNo($request->supplier_challan_no)
                ->setDetails($request->details)
                ->update($request->id);

            $notification = array(
                'message'       => 'Purchase Updated Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    // purchase product

    // purchase product add
    public function purchaseProductAdd($bundleId)
    {
        try {
            $service = new PurchaseService();
            $products = $service->product();
            $purchaseProducts = $service->purchaseProductList($bundleId);
            return view('admin.purchase.purchaseProduct', [
                'bundleId'              => $bundleId,
                'products'              => $products,
                'purchaseProducts'      => $purchaseProducts,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // purchase product store
    public function purchaseProductStore(Request $request)
    {
        try {
            $service = new PurchaseService();
            $service->setProduct($request->product_id)
                ->setQuantity($request->quantity)
                ->setBundleId($request->bundle_id)
                ->purchaseProduct();

            $notification = array(
                'message'       => 'Product Added',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
