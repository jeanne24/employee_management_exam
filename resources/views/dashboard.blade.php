@extends('layouts.app', ['activePage' => 'Dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Company Overview</h4>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-warning">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Headcount</th>
                  </thead>
                  <tbody>
                  @foreach($data['company_details'] as $company_detail)
                    <tr>
                      <td>{{ $company_detail['company_id'] }}</td>
                      <td>{{ $company_detail['company_name'] }}</td>
                      <td>{{ $company_detail['country'] }}</td>
                      <td>{{ $company_detail['company_size'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <a href="/company">
                  <button class="btn btn-primary btn-round">View All Companies</button>
                </a>
              </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Employees Stats</h4>
                <p class="card-category">
                </p>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-warning">
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Company</th>
                  </thead>
                  <tbody>
                    @foreach($data['employees'] as $employee)
                    <tr>
                      <td>{{$employee['employee_id']}}</td>
                      <td>{{$employee['firstname'].' '.$employee['lastname']}}</td>
                      <td>{{$employee->company ? $employee->company->name:'- Not Connected with Company -'}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <a href="/employee">
                <button class="btn btn-info btn-round">View All Employees</button>
                </a>
              </div>
            </div>
        </div>
        
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Quick Actions</h4>
              <p class="category">Perform quick actions by clicking below button</p>
            </div>
            <div class="card-body text-center">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addEmployeeModal">Add New Employee</button> 
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompanyModal">Add New Company</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@include('layouts.modals.add_company_modal')
@include('layouts.modals.add_employee_modal')
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush