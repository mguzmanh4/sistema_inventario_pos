@extends('layouts.app')

{{--  @section('styles')
    <!-- Datatables-->
    <link href="{{ asset('css/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection  --}}

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
        </div>

        <div class="card-header py-3">
            <a href="{{ route('roles.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>


        <div class="card-body">


            <table id="role-table" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form action="{{ route('roles.destroy', $role->id ) }}" method="post">
                                    <a href="/roles/{{ $role->id }}/edit" class="btn btn-info">
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
            $('#role-table').DataTable({
                order: [[0, 'desc']],
            });
        });
    </script>
@endsection
