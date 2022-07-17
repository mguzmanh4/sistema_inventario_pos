@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar Perfil</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('updateUserWithOutRoles', [$user->id]) }}">
                {{--  @method('PUT')  --}}
                @csrf
                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Apellido Paterno</label>
                        <input type="text" class="form-control" id="first_name"
                            name="first_name"value="{{ $user->first_name }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Apellido Materno</label>
                        <input type="text" class="form-control" id="last_name"
                            name="last_name"value="{{ $user->last_name }}" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $user->username }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Dni</label>
                        <input type="number" class="form-control" id="dni" name="dni" value="{{ $user->dni }}"
                            required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Correo</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $user->email }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>

                <br>


                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
            </form>
        </div>
    </div>
@endsection
