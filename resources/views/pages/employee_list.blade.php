@extends('layouts.app', ['activePage' => 'Manage Employees', 'titlePage' => 'Employee List'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-12 text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployeeModal">Add New Employee</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Employees</h4>
            <p class="card-category">Select the employee that you want to manage</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class=" text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    Position
                  </th>
                  <th>
                    Hire Date
                  </th>
                  <th>
                    Company Name
                  </th>
                  <th>
                    Action
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
                      {{ $employee->company? $employee->company->name:'- Not connected with company - ' }}
                    </td>
                    
                    <td class="td-actions text-left">
                        <a href="/employee/<?= $employee['employee_id']?>/edit">
                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                            <i class="material-icons">edit</i>
                        </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal" data-target="#delete<?= $employee['employee_id']?>">
                            <i class="material-icons">close</i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="delete<?= $employee['employee_id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteIdLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="deleteIdLabel">Delete {{$employee['firstname']}} {{$employee['lastname']}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Are you sure you want to delete Delete {{$employee['firstname']}} {{$employee['lastname']}}?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <form method="post" action="/employee/<?= $employee['employee_id']?>/delete">
                                  @csrf
                                  <button type="submit" class="btn btn-primary">Yes</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
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
@endsection