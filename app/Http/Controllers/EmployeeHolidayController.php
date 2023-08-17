<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeHoliday;
use App\Models\EmployeeLeave;
use Illuminate\Http\Request;

class EmployeeHolidayController extends Controller
{
    public function employeeHoliday()
    {
        try {
            $employees = Employee::where('status', 1)->get();
            $employeeHoliday = EmployeeHoliday::all();

            return view('admin.employee_holiday.employeeHoliday', [
                'employees'             => $employees,
                'employeeHoliday'       => $employeeHoliday,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function holidayStore(Request $request)
    {
        $request->validate([
            'employee_id'       => 'required',
            'holiday'        => 'required',
        ]);

        try {
            if (EmployeeHoliday::where('employee_id', '=', $request->employee_id)->exists()) {
                EmployeeHoliday::where('employee_id', $request->employee_id)->increment('holiday', $request->holiday);

                return back()->with('holiday', 'Employee Holiday Added');
            } else {

                $employeeHoliday = new EmployeeHoliday();
                $employeeHoliday->employee_id  = $request->employee_id;
                $employeeHoliday->holiday  = $request->holiday;

                $employeeHoliday->save();


                return back()->with(['alert-type' => 'success', 'message' => 'Emoployee Holiday Added']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function holidayDelete($id)
    {
        try {
            EmployeeHoliday::findOrFail($id)->delete();



            return back()->with(['alert-type' => 'success', 'message' => 'Emoployee Holiday Deleted']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }





    public function holidayEdit($id)
    {
        try {
            $holiday = EmployeeHoliday::findOrFail($id);
            $employees = Employee::where('status', 1)->get();

            return view('admin.employee_holiday.editHoliday', [
                'holiday'          => $holiday,
                'employees'        => $employees,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function holidayUpdate(Request $request)
    {
        $request->validate([
            'employee_id'       => 'required',
            'holiday'        => 'required',
        ]);


        try {
            $employeeHoliday = EmployeeHoliday::findOrFail($request->id);
            $employeeHoliday->employee_id  = $request->employee_id;
            $employeeHoliday->holiday  = $request->holiday;

            $employeeHoliday->update();



            return back()->with(['alert-type' => 'success', 'message' => 'Emoployee Holiday Updated']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    // manage leave
    public function manageLeave()
    {
        try {
            $employees = Employee::where('status', 1)->get();

            return view('admin.employee_holiday.manageLeave', [
                'employees' => $employees,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
