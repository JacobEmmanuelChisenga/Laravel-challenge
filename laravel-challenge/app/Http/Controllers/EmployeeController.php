<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;


use Session;
class EmployeeController extends Controller

{
    public function index(){
        $employees = new Employee();
        $employees = Employee::all();
        $employees = Employee::with('company')->paginate(10);
        return view('administrator.employee.index',compact('employees'));
    }

    public function create(){
        $companies = Company::all();
        //dd($companies);

        return view('administrator.employee.create',compact('companies')); 
    }

    public function store(Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastname'=> 'required'
        ]);
      $employee = new Employee();
      $employee->firstname = request('firstname');
      $employee->lastname = request('lastname');
      $employee->company = request('company');
      $employee->email = request('email');
      $employee->phone = request('phone');
      //dd($employee);
      $employee->save();
     

      $employee = Employee::all();
        
      Session::flash('alert-class', 'alert-success');
      Session::flash('message', 'New employee record created');
      return redirect()->route('employee');
    
    }
    public function show($id)
    {
      $employee = Employee::find($id);
      //dd($company);
      return view('administrator.employee.create',compact('employee')); 
    }
    public function edit(Request $request)
    {
        //  $id  = $_GET['id'];
        //  dd($id);
        $id = $request->id;
        //dd($id);
        $employee = Employee::find($id);
        $companies = Company::all();
        //dd($employee);
        return view('administrator.employee.edit', compact(['employee', 'companies']));
    }

    public function update(Request $request){
            $id = $request->id;
            $input = [
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'company' => $request->input('company')
              ];

            $oldEmployeeRecord = Employee::find($id);
            $oldEmployeeRecord->update($input);
    
            Session::flash('alert-class', 'alert-success');
            Session::flash('message', 'Employee record updated');

            return redirect()->route('employee');
    }
  
    public function deleteemployee($id){
        $employee = Employee::find($id);
        if($employee != null){
            $employee->delete();
           
        }
        //dd($employee);
        return redirect()->route('employee');
      
    }

}