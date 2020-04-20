<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::select('company_id','employee_id','firstname','lastname','position','hireDate', 'dateOfBirth')->paginate(10);
        $companies = Company::select('id','name')->get();
        $data = ['employees'=>$employees,'companies'=>$companies];
        return view('pages.employee_list', ['data'=>$data]);
    }

    public function store(Request $request, Faker $faker){
        $employee = new Employee;
        $employee->employee_id = 'EMP'.$faker->unixTime;
        $employee->firstname = $request->input('fname');
        $employee->lastname = $request->input('lname');
        $employee->position = $request->input('position');
        $employee->hireDate = $request->input('hiredate');
        $employee->dateOfBirth = $request->input('bday');
        $employee->salary = $request->input('salary');
        $employee->department = $request->input('department');
        $employee->company_id = $request->input('company');
        $result = $employee->save();

        $employees = Employee::select('company_id','employee_id','firstname','lastname','position','hireDate', 'dateOfBirth')->paginate(10);
        $companies = Company::select('id','name')->get();
        
        $data = ['employees'=>$employees,'companies'=>$companies, 'result'=>$result];
        return view('pages.employee_list', ['data'=>$data]);
    }

    public function edit($id){
        if (!Auth::check()) {
            return redirect('/');
        }
        $currentEmployee = Employee::where('employee_id',$id)->first();
        $companies = Company::all();
        $data = ['employee'=>$currentEmployee, 'companies'=>$companies];
        return view('pages.employee_details',['data'=>$data]);
    }

    public function update(Request $request, $id){
        if (!Auth::check()) {
            return redirect('/');
        }
        $employee = Employee::where('employee_id',$id)->first();
        $employee->firstname = $request->input('fname');
        $employee->lastname = $request->input('lname');
        $employee->position = $request->input('position');
        $employee->hireDate = $request->input('hiredate');
        $employee->dateOfBirth = $request->input('bday');
        $employee->salary = $request->input('salary');
        $employee->department = $request->input('department');
        $employee->company_id = $request->input('company');
        $result = $employee->save();
        $companies = Company::all();
        $data = ['employee'=>$employee, 'companies'=>$companies];
        return view('pages.employee_details',['data'=>$data]);
    }

    public function delete($id){
        if (!Auth::check()) {
            return redirect('/');
        }
        $employee = Employee::where('employee_id',$id)->first();
        $result = $employee->delete();
        $employees = Employee::select('company_id','employee_id','firstname','lastname','position','hireDate', 'dateOfBirth')->paginate(10);
        $companies = Company::select('id','name')->get();
        $data = ['employees'=>$employees,'companies'=>$companies];
        return view('pages.employee_list', ['data'=>$data]);
    }
}
