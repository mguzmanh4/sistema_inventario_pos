@extends('layouts.app')

@section('styles')
    {{-- Selectize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.min.css" integrity="sha512-VL5zQAJyFw5RL9wN3a5nF508dBqgOAYOZeww5RuEq8A8JQLiWy20iG2lLyiTuF6bv7gz48UGMcxuMlUycoHfJw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('users.update',[$user->id]) }}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"value="{{ $user->first_name }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"value="{{ $user->last_name }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Dni</label>
                        <input type="number" class="form-control" id="dni" name="dni" value="{{ $user->dni }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Role</label>
                    <select class="form-control" name="roles[]" id="roles">
                        @foreach($roles as $id => $role)
                            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.min.js" integrity="sha512-JFjt3Gb92wFay5Pu6b0UCH9JIOkOGEfjIi7yykNWUwj55DBBp79VIJ9EPUzNimZ6FvX41jlTHpWFUQjog8P/sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $("#roles").selectize({
            hideSelected: true,

        });
    </script>
@endsection
