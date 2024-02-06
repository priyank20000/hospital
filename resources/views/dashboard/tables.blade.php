@extends('layout.admin_base')
@section('base')
    <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-4" style="margin-left: 2rem;">LOGING ACTIVE TABLE</h6>
    </nav>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id/Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">E-mail</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">user/admin</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                @if(count($data)>0)
                @foreach ($data as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                            <p class="text-xs text-secondary mb-0">id:{{$item->id}}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->email}}</p>

                      </td>
                      <td class="align-middle text-center text-sm">

                        <span class="badge badge-sm bg-gradient-success" >{{$item->phone}}</span>
                      </td>
                      {{-- <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$item->password}}</span>
                      </td> --}}
                      <td class="align-middle text-center">
                        <a href="{{ url('edit/'.$item->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>

                      </td>
                      <td class="align-middle text-center">
                        <a href="{{ url('delete/'.$item->id)}}" class="text-secondary font-weight-bold text-xs text-danger" data-toggle="tooltip" data-original-title="Edit user">
                            Delete
                           </a>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$item->is_admin}}</span>
                      </td>
                    </tr>

                @endforeach
                 @endif
                </tbody>
            </table>
        </div>
    </div><br>
</div>
      @endsection
