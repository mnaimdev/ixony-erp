<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Image;
use Str;

class EmployeeController extends Controller
{
    public function employee()
    {
        try {
            $employees = $employees = Employee::where('status', 1)->get();
            return view('admin.employee.employee', [
                'employees' => $employees,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function createEmployee()
    {
        try {
            return view('admin.employee.createEmployee');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function employeeStore(Request $request)
    {

        // $request->validate([
        //     'nid_number' => ['required', 'regex:/^[0-9]{13}$/'],
        // ]);

        // insert employee data
        $newEmployee = new Employee();

        $newEmployee->name = $request->name;
        $newEmployee->designation = $request->designation;
        $newEmployee->permanent_address = $request->permanent_address;
        $newEmployee->current_address = $request->current_address;
        $newEmployee->nid_number = $request->nid_number;
        $newEmployee->personal_contract_number = $request->personal_contract_number;
        $newEmployee->office_contract_number = $request->office_contract_number;
        $newEmployee->whatsapp_number = $request->whatsapp_number;
        $newEmployee->email = $request->email;
        $newEmployee->joining_date = $request->joining_date;


        // check image
        if ($request->hasFile('photo')) {
            $uploadedFile = $request->file('photo');
            $extension = $uploadedFile->getClientOriginalExtension();

            // Customize the destination path and file name as per your requirements
            $fileName = Str::lower(str_replace(' ', '-', $request->name)) . '-' . rand(11111111, 9999999999) . '.' . $extension;

            // Move the uploaded file to the destination folder

            Image::make($uploadedFile)->save(public_path('/uploads/employee/' . $fileName));

            $newEmployee->photo = $fileName;
        }


        // check nid image
        if ($request->hasFile('nid_photo')) {
            $uploadedFile = $request->file('nid_photo');
            $extension = $uploadedFile->getClientOriginalExtension();

            // Customize the destination path and file name as per your requirements
            $fileName = Str::lower(str_replace(' ', '-', $request->name)) . '-' . rand(11111111, 9999999999) . '.' . $extension;

            // Move the uploaded file to the destination folder

            Image::make($uploadedFile)->save(public_path('/uploads/employee/nid/' . $fileName));

            $newEmployee->nid_photo = $fileName;
        }

        $newEmployee->save();


        // insert data into users table
        $randomNumber = str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);

        $user = new User();
        $user->name = $newEmployee->name;
        $user->email = $newEmployee->email;
        $user->password = bcrypt($randomNumber);
        $user->save();



        return back()->with(['alert-type' => 'success', 'message' => 'Employee Added']);
    }



    public function editEmployee($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            return view('admin.employee.editEmployee', [
                'employee'  => $employee,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function updateEmployee(Request $request)
    {

        // $request->validate([
        //     'nid_number' => ['required', 'regex:/^[0-9]{13}$/'],
        // ]);

        // insert employee data
        $newEmployee = Employee::findOrFail($request->id);

        $newEmployee->name = $request->name;
        $newEmployee->designation = $request->designation;
        $newEmployee->permanent_address = $request->permanent_address;
        $newEmployee->current_address = $request->current_address;
        $newEmployee->nid_number = $request->nid_number;
        $newEmployee->personal_contract_number = $request->personal_contract_number;
        $newEmployee->office_contract_number = $request->office_contract_number;
        $newEmployee->whatsapp_number = $request->whatsapp_number;
        $newEmployee->email = $request->email;
        $newEmployee->joining_date = $request->joining_date;


        // check image
        if ($request->hasFile('photo')) {

            $image = $newEmployee->photo;
            $deletedFrom = public_path('/uploads/employee/' . $image);
            unlink($deletedFrom);

            $uploadedFile = $request->file('photo');
            $extension = $uploadedFile->getClientOriginalExtension();

            // Customize the destination path and file name as per your requirements
            $fileName = Str::lower(str_replace(' ', '-', $request->name)) . '-' . rand(11111111, 9999999999) . '.' . $extension;

            // Move the uploaded file to the destination folder

            Image::make($uploadedFile)->save(public_path('/uploads/employee/' . $fileName));

            $newEmployee->photo = $fileName;
        }


        // check nid image
        if ($request->hasFile('nid_photo')) {

            $image = $newEmployee->nid_photo;
            $deletedFrom = public_path('/uploads/employee/nid/' . $image);
            unlink($deletedFrom);

            $uploadedFile = $request->file('nid_photo');
            $extension = $uploadedFile->getClientOriginalExtension();

            // Customize the destination path and file name as per your requirements
            $fileName = Str::lower(str_replace(' ', '-', $request->name)) . '-' . rand(11111111, 9999999999) . '.' . $extension;

            // Move the uploaded file to the destination folder

            Image::make($uploadedFile)->save(public_path('/uploads/employee/nid/' . $fileName));

            $newEmployee->nid_photo = $fileName;
        }

        $newEmployee->update();


        return back()->with(['alert-type' => 'success', 'message' => 'Employee Updated']);
    }




    public function viewEmployee($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            return view('admin.employee.viewEmployee', [
                'employee'      => $employee,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function viewResignedEmployee($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            return view('admin.employee.viewResignedEmployee', [
                'employee'      => $employee,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function resignedList()
    {
        $employees = Employee::where('status', 0)->get();

        return view('admin.employee.resignedList', ['employees' => $employees]);
    }


    public function employeeChangeStatus(Request $request)
    {
        Employee::find($request->id)->update(
            [
                'status'                => $request->status,
                'resigned_date'         => Carbon::now(),
            ]
        );

        return response()->json(['success' => 'Status change successfully.']);
    }
}
