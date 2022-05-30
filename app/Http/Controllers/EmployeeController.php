<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    //
    public function index(){

        $employees = Employee::orderBy('id', 'DESC')->get();

        return view('employee.index', compact('employees'));
    }

    public function destroy($id){
        
        $id = Employee::where('id', $id);
        $id->delete();
        return redirect('/employee')->with('success', 'Employee has been deleted');
    }

    public function add_employee(){
        return view('employee.add-employee');
    }

    public function create_employee(Request $request){
        
        $data_employee = [
            'name' => $request->employee_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'salary' => $request->salary
        ];

        Employee::create($data_employee);

        return redirect('/employee')->with('success', 'Employee has been Added');
    }

    public function edit_employee($id){
        $employee = Employee::findOrFail($id);
        return view('employee.edit-employee', compact('employee'));
    }

    public function update_employee(Request $request, $id){

        $employee = Employee::findOrFail($id);
        $data = [
            'name' => $request->employee_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'salary' => $request->salary
        ];

        $employee->update($data);
        return redirect('/employee')->with('success', 'Employee has been successlly edited');;

    }
}
