<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeLeave;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function employeeLeave()
    {
        try {

            $employeeLeave = EmployeeLeave::all();

            return view('admin.employee_leave.employeeLeaveList', [
                'employeeLeave' => $employeeLeave,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function employeeLeaveStore(Request $request)
    {
        $request->validate([
            'employee_id'       => 'required',
            'date_from'         => 'required',
            'date_to'           => 'required',
            'details'           => 'required',
        ]);

        try {
            // calc total leave day
            $from = Carbon::parse($request->date_from);
            $to = Carbon::parse($request->date_to);


            $employeeLeave = new EmployeeLeave();
            $employeeLeave->employee_id  = $request->employee_id;
            $employeeLeave->date_from  = $request->date_from;
            $employeeLeave->date_to  = $request->date_to;
            $employeeLeave->details  = $request->details;
            $employeeLeave->total  = $to->diffInDays($from);

            $employeeLeave->save();

            return back()->with(['alert-type' => 'success', 'message' => 'Leave Request Submitted']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function employeeLeaveCreate()
    {
        try {
            $employees = Employee::where('status', 1)->get();

            return view('admin.employee_leave.employeeLeave', [
                'employees' => $employees,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function employeeLeaveEdit($id)
    {
        try {
            $employeeLeave = EmployeeLeave::findOrFail($id);
            $employees = Employee::where('status', 1)->get();

            return view('admin.employee_leave.editEmployeeLeave', [
                'employeeLeave'         => $employeeLeave,
                'employees'             => $employees,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function employeeLeaveUpdate(Request $request)
    {
        $request->validate([
            'employee_id'       => 'required',
            'date_from'         => 'required',
            'date_to'           => 'required',
            'details'           => 'required',
        ]);

        try {
            // calc total leave day
            $from = Carbon::parse($request->date_from);
            $to = Carbon::parse($request->date_to);


            $employeeLeave = EmployeeLeave::findOrFail($request->id);
            $employeeLeave->employee_id  = $request->employee_id;
            $employeeLeave->date_from  = $request->date_from;
            $employeeLeave->date_to  = $request->date_to;
            $employeeLeave->details  = $request->details;
            $employeeLeave->total  = $to->diffInDays($from);

            $employeeLeave->update();



            return back()->with(['alert-type' => 'success', 'message' => 'Leave Request Updated']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function employeeLeaveDelete($id)
    {
        try {
            EmployeeLeave::findOrFail($id)->delete();
            return back()->with(['alert-type' => 'success', 'message' => 'Leave Request Deleted']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
