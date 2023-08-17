<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function employeeAttendenceList()
    {
        $attendences = Attendence::select('date')->groupBy('date')->orderBy('date', 'DESC')->get();

        return view('pages.attendence.index', [
            'attendences'      => $attendences,
        ]);
    }

    public function employeeAttendenceCreate()
    {
        $employees = Employee::all();

        return view('pages.attendence.create', [
            'employees'     => $employees,
        ]);
    }

    public function employeeAttendenceStore(Request $request)
    {
        $employeeCount = count($request->employee_id);


        if (Attendence::where('date', $request->date)->exists()) {
            return back()->with('submit', 'Already Submitted');
        }

        // else
        else {
            for ($i = 0; $i < $employeeCount; $i++) {
                $status = 'status' . $i;

                $attendence = new Attendence();
                $attendence->employee_id = $request->employee_id[$i];
                $attendence->date = $request->date;
                $attendence->status = $request->$status;
                $attendence->created_at = Carbon::now();
                $attendence->save();
            }


            return back()->with('attendence', 'Attendence Submitted');
        }
    }


    public function employeeAttendenceEdit($date)
    {
        $attendences = Attendence::where('date', $date)->get();

        return view('pages.attendence.edit', [
            'attendences' => $attendences,
        ]);
    }


    public function employeeAttendenceUpdate(Request $request)
    {
        $employeeCount = count($request->employee_id);

        for ($i = 0; $i < $employeeCount; $i++) {
            $status = 'status' . $i;

            $attendence = Attendence::find($request->attendence_id[$i]);
            $attendence->employee_id = $request->employee_id[$i];
            $attendence->date = $request->date;
            $attendence->status = $request->$status;
            $attendence->created_at = Carbon::now();
            $attendence->update();
        }

        return back()->with('attendence', 'Attendence Updated');
    }


    public function employeeAttendenceView($date)
    {
        $attendences = Attendence::where('date', $date)->get();

        return view('pages.attendence.view', [
            'attendences' => $attendences,
        ]);
    }
}
