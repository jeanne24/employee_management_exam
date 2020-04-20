<?php
namespace App\Http\Controllers;
use App\Company;
use App\Employee;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::all();
        $employees = Employee::select(
            'company_id')->get();
        $employee_paginated = Employee::select(
            'employee_id',
            'company_id',
            'firstname', 
            'lastname',
            'dateOfBirth', 
            'hireDate',
            'position')->orderBy('hireDate','desc')->paginate(5);
        $company_employee = array();
        foreach($companies as $company){
            $number_of_employees = 0;
            foreach($employees as $employee){
                if($company->id==$employee->company_id){
                    $number_of_employees++;
                }
            };
            array_push($company_employee,['company_id'=>$company->companyId,'company_name'=>$company->name, 'country'=>$company->country, 'company_size'=>$number_of_employees]);
        }
        $data = ['company_details'=>$company_employee,'employees'=>$employee_paginated, 'companies'=>$companies];
        return view('dashboard',['data'=>$data]);
    }
}
