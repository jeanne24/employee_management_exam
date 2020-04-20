@extends('layouts.app', ['activePage' => 'Manage Companies', 'titlePage' => 'Company List'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-12 text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompanyModal">Add New Company</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Companies You Manage</h4>
            <p class="card-category">Here are the companies you currently manage</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-primary">
                  <th>
                    Company Name
                  </th>
                  <th>
                    Country
                  </th>
                  <th>
                    City
                  </th>
                  <th>
                    Address
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>
                @foreach($data['companies'] as $company)
                  <tr>
                    <td>
                      {{ $company['name'] }}
                    </td>
                    <td>
                      {{ $company['country'] }}
                    </td>
                    <td>
                      {{ $company['city'] }}
                    </td>
                    <td>
                      {{ $company['address'] }}
                    </td>
                    <td class="td-actions text-left">
                        <a href="company/<?= $company['companyId']?>">
                        <button type="button" rel="tooltip" class="btn btn-info btn-round">
                            <i class="material-icons">person</i>
                        </button>
                        </a>
                        <a href="company/<?= $company['companyId']?>/edit">
                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                            <i class="material-icons">edit</i>
                        </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal" data-target="#delete<?= $company['companyId']?>">
                            <i class="material-icons">close</i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="delete<?= $company['companyId']?>" tabindex="-1" role="dialog" aria-labelledby="deleteIdLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="deleteIdLabel">Delete {{$company['name']}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Are you sure you want to delete {{$company['name']}} company?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <form method="post" action="/company/<?= $company['companyId']?>/delete">
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

              {{$data['companies']->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.modals.add_company_modal')
@endsection