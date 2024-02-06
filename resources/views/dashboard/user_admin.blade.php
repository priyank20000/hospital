@extends('layout.admin_base')
@section('base')
    <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-4" style="margin-left: 2rem;">USER AND ADMIN TABLE</h6>
    </nav>

    <div class="container-fluid py-4">
        <form action="{{ route('update-users') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">E-mail</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">user/admin</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Done</th>

                                </tr>
                                </thead>

                                <tbody>
                                @if(count($data)>0)
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">

                                                            <input type="hidden" name="user_ids[]" value="{{ $item->id }}">
                                                            <h6 class="mb-0 text-sm">{{$item->id}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$item->email}}</h6>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <select name="role[{{ $item->id }}]" id="role" style="border: none;">
                                                        @if(auth()->check() && auth()->user()->is_admin == 'admin')
                                                            <option style="text-align: center;" value="admin" {{ $item->is_admin === 'admin' ? 'selected' : '' }}>Admin</option>
                                                            <option style="text-align: center;" value="user" {{ $item->is_admin === 'user' ? 'selected' : '' }}>User</option>
                                                        @else
                                                            <option style="text-align: center;" value="user" {{ $item->is_admin === 'user' ? 'selected' : '' }}>User</option>
                                                            <option style="text-align: center;" value="admin" {{ $item->is_admin === 'admin' ? 'selected' : '' }}>Admin</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                </p>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                <button  type="submit"  style="Border: none;background: none;color: red; text-align: center;">Done</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>



@endsection
