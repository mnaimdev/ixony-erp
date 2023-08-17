<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChallanController;
use App\Http\Controllers\ChallanReturnController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeHolidayController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');



    // Profile Update
    Route::controller(UserController::class)->group(function () {
        Route::get('/edit/profile', 'editProfile')->name('Profile.Edit');
        Route::post('/profile/info/update', 'profileInfoUpdate')->name('Profile.Info.Update');
        Route::post('/profile/password/update', 'profilePasswordUpdate')->name('Profile.Password.Update');
        Route::post('/profile/image/update', 'profileImageUpdate')->name('Profile.Image.Update');
    });


    // Monthly Report
    Route::controller(ReportController::class)->group(function () {
        Route::get('/report', 'report')->name('Report');
        Route::post('/report/generate', 'reportGenerate')->name('Report.Generate');
        Route::get('/report/generate/list', 'reportGenerateList')->name('Report.Generate.List');
        Route::get('/product/report/{bundleId}', 'productReport')->name('Report.Product');

        Route::get('/print/report', 'printReport')->name('Print.Report');
    });



    // categories
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category',  'category')->name('category');
        Route::post('/category/category-store',  'categoryStore')->name('category.store');

        Route::get('/category/category-edit/{id}',  'categoryEdit')->name('category.edit');
        Route::get('/category/category-delete/{id}',  'categoryDelete')->name('category.delete');
        Route::post('/category/category-update',  'categoryUpdate')->name('category.update');

        Route::get('/category/product/{name}',  'categoryProduct')->name('category.product');
    });


    // products
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/product-list', 'productList')->name('product');
        Route::post('/product/product-store', 'productStore')->name('product.store');
        Route::get('/product/product-edit/{id}', 'productEdit')->name('product.edit');
        Route::post('/product/product-update', 'productUpdate')->name('product.update');
        Route::get('/product/product-view/{id}', 'productView')->name('product.view');


        Route::get('/search', 'search')->name('Search');
        Route::get('/product/download', 'productDownload')->name('product.download');
    });


    // purchases
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/product-purchase-list', 'productPurchaseList')->name('Product.Purchase.List');
        Route::post('/product/purchase/store', 'productPurchaseStore')->name('Product.Purchase.Store');
        Route::get('/product/product-purchase-edit/{id}', 'productPurchaseEdit')->name('Product.Purchase.Edit');
        Route::post('/product/product-purchase-update', 'productPurchaseUpdate')->name('Product.Purchase.Update');


        Route::get('purchase/product/add/{bundleId}', 'purchaseProductAdd')->name('Purchase.Product.Add');

        Route::post('purchase/product/store', 'purchaseProductStore')->name('Purchase.Product.Store');
    });


    // challans
    Route::controller(ChallanController::class)->group(function () {
        Route::get('/product-challan-list', 'productChallanList')->name('Product.Challan.List');
        Route::post('/product/challan/store', 'productChallanStore')->name('Product.Challan.Store');
        Route::get('/product/product-challan-edit/{id}', 'productChallanEdit')->name('Product.Challan.Edit');
        Route::post('/product/product-challan-update', 'productChallanUpdate')->name('Product.Challan.Update');
        Route::get('/product/view-challan/{id}', 'productChallanView')->name('Product.Challan.View');
        Route::get('/challanStatus', 'challanStatus');

        Route::get('/challan/product/add/{bundleId}', 'challanProductAdd')->name('Challan.Product.Add');
        Route::post('/challan/store-product/', 'challanProductStore')->name('Challan.Product.Store');
    });



    // return challan
    Route::controller(ChallanReturnController::class)->group(function () {
        Route::get('/challan/return-product', 'returnChallanProduct')->name('Product.Challan.Return');

        Route::get('/challan/return/complete/{bundleId}', 'challanReturnComplete')->name('Challan.Return.Complete');

        // Route::post('/challan/return-product/store', 'returnChallanProductStore')->name('Product.Challan.Return.Store');
        // Route::get('/challan/return-product/view/{id}', 'returnChallanProductView')->name('Product.Challan.Return.View');
    });



    // permissions
    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permission-list', 'index')->name('permission');
        Route::get('/permission/create', 'create')->name('permission.create');
        Route::post('/permission/store', 'store')->name('permission.store');
        Route::get('/permission/edit/{id}', 'edit')->name('permission.edit');
        Route::post('/permission/update', 'update')->name('permission.update');
        Route::get('/permission/delete/{id}', 'delete')->name('permission.delete');

        Route::get('/role/permission-add', 'addRolePermission')->name('add.role.permission');
        Route::post('/role/permission/store', 'rolePermissionStore')->name('role.permission.store');
    });


    // Roles
    Route::controller(RoleController::class)->group(function () {
        Route::get('/role-list', 'index')->name('role');
        Route::get('/role/create', 'create')->name('role.create');
        Route::post('/role/store', 'store')->name('role.store');
        Route::get('/role/edit/{id}', 'edit')->name('role.edit');
        Route::post('/role/update', 'update')->name('role.update');
        Route::get('/role/delete/{id}', 'delete')->name('role.delete');


        // assign role
        Route::get('/role/assign',  'roleAssign')->name('Role.Assign');
        Route::get('/role/assign/create',  'roleAssignCreate')->name('Role.Assign.Create');

        Route::post('/assign/user/role',  'assignUserRole')->name('Assign.User.Role');
        Route::get('/delete/user/permission/{id}', 'deleteUserPermission')->name('Delete.User.Permission');


        Route::get('/role/permission-assign/', 'rolePermission')->name('role.permission');
        Route::get('/edit/role/permission/{id}', 'editRolePermission')->name('edit.role.permission');
        Route::post('/role/permission/update/', 'rolePermissionUpdate')->name('role.permission.update');

        Route::get('/delete/role/permission/{id}', 'deleteRolePermission')->name('delete.role.permission');
    });



    //Employee section
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employee', 'employee')->name('Employee');
        Route::get('/employee/create-employee', 'createEmployee')->name('Employee.Create');
        Route::get('/employee/view-employee/{id}', 'viewEmployee')->name('Employee.View');
        Route::get('/employee/view-resigned-employee/{id}', 'viewResignedEmployee')->name('Employee.Resigned.View');

        Route::get('/employee/edit/{id}', 'editEmployee')->name('Employee.Edit');
        Route::post('/employee/update', 'updateEmployee')->name('Employee.Update');

        Route::post('/employee/employee-store', 'employeeStore')->name('Employee.Store');
        Route::get('/employee/resigned-list', 'resignedList')->name('Employee.Resigned');

        Route::get('/changeStatus', 'employeeChangeStatus');
    });





    // Employee Leave
    Route::controller(EmployeeLeaveController::class)->group(function () {
        Route::get('/employee/leave', 'employeeLeave')->name('Employee.Leave');
        Route::post('/employee/leave/store', 'employeeLeaveStore')->name('Employee.Leave.Store');
        Route::get('/employee/leave/create', 'employeeLeaveCreate')->name('Employee.Leave.Create');
        Route::get('/employee/leave/edit/{id}', 'employeeLeaveEdit')->name('Employee.Leave.Edit');
        Route::post('/employee/leave/update', 'employeeLeaveUpdate')->name('Employee.Leave.Update');
        Route::get('/employee/leave/delete/{id}', 'employeeLeaveDelete')->name('Employee.Leave.Delete');
    });


    // Manage Holiday
    Route::controller(EmployeeHolidayController::class)->group(function () {
        Route::get('/employee/holiday', 'employeeHoliday')->name('Employee.Holiday');
        Route::post('/employee/holiday/store', 'holidayStore')->name('Employee.Holiday.Store');
        Route::get('/employee/holiday/delete/{id}', 'holidayDelete')->name('Employee.Holiday.Delete');

        Route::get('/employee/holiday/edit/{id}', 'holidayEdit')->name('Employee.Holiday.Edit');
        Route::post('/employee/holiday/update', 'holidayUpdate')->name('Employee.Holiday.Update');


        Route::get('/manage/leave', 'manageLeave')->name('Employee.Manage.Leave');
    });


    // Attendence
    Route::controller(AttendenceController::class)->group(function () {
        Route::get('/employee/attendence', 'employeeAttendenceList')->name('Employee.Attendence');
        Route::get('/employee/attendence/create', 'employeeAttendenceCreate')->name('Employee.Attendence.Create');
        Route::post('/employee/attendence/store', 'employeeAttendenceStore')->name('Employee.Attendence.Store');
        Route::get('/employee/attendence/edit/{date}', 'employeeAttendenceEdit')->name('Employee.Attendence.Edit');
        Route::post('/employee/attendence/update', 'employeeAttendenceUpdate')->name('Employee.Attendence.Update');
        Route::get('/employee/attendence/view/{date}', 'employeeAttendenceView')->name('Employee.Attendence.View');
    });
});

require __DIR__ . '/auth.php';
