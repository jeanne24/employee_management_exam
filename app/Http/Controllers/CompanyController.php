<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Company;
use App\Employee;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $companies = Company::select('companyId','name','address','country','city')->paginate(10);
        $data = ['companies'=>$companies];
        return view('pages.company_list', ['data'=>$data]);
    }

    public function store(Request $request, Faker $faker){

        if (!Auth::check()) {
            return redirect('/');
        }
        $name = $request->input('name');
        $address = $request->input('address');
        $country = $request->input('country');
        $description = $request->input('description');
        $companyId = 'CMPY'.$faker->unixTime;
        $state = $request->input('state');
        $city = $request->input('city');

        $company = new Company;
        $company->name = $name;
        $company->address = $address;
        $company->companyId = $companyId;
        $company->description = $description;
        $company->province = $state;
        $company->city = $city;
        $company->country = $country;
        $result=$company->save();
        
        $companies = Company::select('companyId','name','address','country','city')->paginate(10);
        $data = ['companies'=>$companies, 'result'=>$result];
        return view('pages.company_list', ['data'=>$data] );
    }

    public function edit($id){
        if (!Auth::check()) {
            return redirect('/');
        }
        $currentCompany = Company::where('companyId',$id)->first();
        $data = ['company'=>$currentCompany];
        return view('pages.company_details',['data'=>$data]);
    }
    public function update(Request $request, $id){
        if (!Auth::check()) {
            return redirect('/');
        }
        $name = $request->input('name');
        $address = $request->input('address');
        $country = $request->input('country');
        $description = $request->input('description');
        $state = $request->input('state');
        $city = $request->input('city');

        $company = Company::where('companyId',$id)->first();
        $company->name = $name;
        $company->address = $address;
        $company->description = $description;
        $company->province = $state;
        $company->city = $city;
        $company->country = $country;
        $result=$company->save();

        $data = ['company'=>$company, 'result'=>$result];
        return view('pages.company_details',['data'=>$data]);
    }

    public function viewCompany($id){
        if (!Auth::check()) {
            return redirect('/');
        }
        $company = Company::where('companyId',$id)->first();
        $employees = Employee::where('company_id',$company->id)->paginate(5);
        $data = ['company'=>$company,'employees'=>$employees, 'currentCompany'=>$company];
        return view('pages.company_employee', ['data'=>$data]);
    }

    public function delete($id){
        if (!Auth::check()) {
            return redirect('/');
        }
        $company = Company::where('companyId',$id)->first();
        $result = $company->delete();
        $companies = Company::select('companyId','name','address','country','city')->paginate(10);
        $data = ['result'=>$result, 'companies'=>$companies];
        return view('pages.company_list',['data'=>$data]);
    }

    public function addEmployee(Request $request, $id){
        if (!Auth::check()) {
            return redirect('/');
        }
        $company = Company::where('companyId',$id)->first();
        $employee = new Employee;
        $employee->employee_id = 'EMP'.$faker->unixTime;
        $employee->firstname = $request->input('fname');
        $employee->lastname = $request->input('lname');
        $employee->position = $request->input('position');
        $employee->hireDate = $request->input('hiredate');
        $employee->dateOfBirth = $request->input('bday');
        $employee->salary = $request->input('salary');
        $employee->department = $request->input('department');
        $employee->company_id = $company->id;
        $result = $employee->save();

        $company = Company::where('companyId',$id)->first();
        $employees = Employee::where('company_id',$company->id)->paginate(5);
        $data = ['company'=>$company,'employees'=>$employees, 'currentCompany'=>$company];
        return view('pages.company_employee', ['data'=>$data]);
    }
}
