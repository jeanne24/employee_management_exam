@extends('layouts.app', ['activePage' => $data['employee']->employee_id, 'titlePage' =>$data['employee']->employee_id])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Employee Record') }}</h4>
                <p class="card-category">{{ __('Employee information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="<?= $data['employee']->firstname?>" required>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="<?= $data['employee']->lastname?>" required>
                </div>
                <div class="form-group">
                    <label for="mname">Middle Name</label>
                    <input type="text" class="form-control" id="mname" name="mname" value="<?= $data['employee']->middlename?>" required>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" name="position" value="<?= $data['employee']->position?>" required>
                </div>
                <div class="form-group">
                    <label for="hiredate">Hire Date</label>
                    <input type="date" class="form-control" id="hiredate" name="hiredate" value="<?= $data['employee']->hireDate?>" required>
                </div>
                <div class="form-group">
                    <label for="bday">Date  of Birth</label>
                    <input type="date" class="form-control" id="bday" name="bday" value="<?= $data['employee']->dateOdBirth?>" required>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" step="0.01" class="form-control" id="salary" name="salary" value="<?= $data['employee']->salary?>" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" name="department" value="<?= $data['employee']->department?>" required>
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <select id="company" name="company" class="form-control" required>
                        @foreach($data['companies'] as $company)
                        <option value="<?=$company['id']?>" <?= $data['employee']->company_id==$company['id']? 'selected': '' ?>>{{$company['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info">Update Employee</button>
                </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
@endsection