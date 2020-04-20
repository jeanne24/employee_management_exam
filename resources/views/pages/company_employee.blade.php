@extends('layouts.app', ['activePage' => 'Manage '.$data['company']->name, 'titlePage' => $data['company']->name])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-12 text-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployeeModal">Add New Employee</button>
      <a href="/company/<?= $data['company']->companyId ?>/edit"><button type="button" class="btn btn-primary">View Company Details</button></a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ $data['company']->name }}</h4>
            <p class="card-category">Employee Master List</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    Position
                  </th>
                  <th>
                    HireDate
                  </th>
                  <th>
                    Salary
                  </th>
                  <th>
                    Date of Birth
                  </th>
                </thead>
                <tbody>
                @foreach($data['employees'] as $employee)
                  <tr>
                    <td>
                      {{ $employee['firstname'].' '.$employee['lastname'] }}
                    </td>
                    <td>
                      {{ $employee['position'] }}
                    </td>
                    <td>
                      {{ $employee['hireDate'] }}
                    </td>
                    <td>
                      {{ $employee['salary'] }}
                    </td>
                    <td>
                      {{ $employee['dateOfBirth'] }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              {{$data['employees']->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.modals.add_employee_modal')
@include('layouts.modals.add_company_modal')
@endsection