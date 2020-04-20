
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-add-employee" role="document">
    <div class="modal-content">
      <div class="card card-add-employee card-plain">
        <div class="card-header card-header-info">
          <h2 class="modal-title card-title">New employee</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 mr-auto">
            <form method="POST" action="<?= (isset($data['currentCompany']))? '/company/'.$data['currentCompany']->companyId.'/add-employee':'/add-employee' ?>">
                @csrf
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" required>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" required>
                </div>
                <div class="form-group">
                    <label for="mname">Middle Name</label>
                    <input type="text" class="form-control" id="mname" name="mname" required>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" name="position" required>
                </div>
                <div class="form-group">
                    <label for="hiredate">Hire Date</label>
                    <input type="date" class="form-control" id="hiredate" name="hiredate" required>
                </div>
                <div class="form-group">
                    <label for="bday">Date  of Birth</label>
                    <input type="date" class="form-control" id="bday" name="bday" required>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" step="0.01" class="form-control" id="salary" name="salary" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" name="department" required>
                </div>
                @if(isset($data['currentCompany']))
                <fieldset disabled>
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" name="company" value="<?=$data['currentCompany']->id?>" style="visibility:hidden">
                    <p><?=$data['currentCompany']->name?></p>
                </div>
                </fieldset>
                @else
                <div class="form-group">
                    <label for="company">Company</label>
                    <select id="company" name="company" class="form-control" required>
                        @foreach($data['companies'] as $company)
                        <option value="<?=$company['id']?>">{{$company['name']}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                <button type="submit" class="btn btn-info">Add Company</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>