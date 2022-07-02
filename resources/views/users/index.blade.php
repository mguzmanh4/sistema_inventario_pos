@extends('layouts.app')

{{--  @section('styles')
    <!-- Datatables-->
    <link href="{{ asset('css/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection  --}}

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>

        <div class="card-header py-3">
            <a href="{{ route('users.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>


        <div class="card-body">


            <table id="user-table" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Dni</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->dni }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-primary">{{ $item->name }}</span>
                                @endforeach
                            </td>

                            <td>
                                <form action="{{ route('users.destroy', $user->id ) }}" method="post">
                                    <a href="/users/{{ $user->id }}/edit" class="btn btn-info">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
@endsection

@section('scripts')
    <!-- Datatables-->
    <script src="{{ asset('js/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#user-table').DataTable({
                order: [[0, 'desc']],
            });
        });
    </script>
@endsection
