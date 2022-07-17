@extends('layouts.app')

@section('styles')
    {{-- Selectize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.min.css"
        integrity="sha512-VL5zQAJyFw5RL9wN3a5nF508dBqgOAYOZeww5RuEq8A8JQLiWy20iG2lLyiTuF6bv7gz48UGMcxuMlUycoHfJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Crear Usuario</h6>
        </div>
        <div class="card-body">


            {{--  <form method="POST" action="{{ route('reniec.searchUser') }}">
                @csrf  --}}
                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">DNI</label>
                        <input type="text" class="form-control" id="dni_search" name="dni_search" required>
                        <button class="btn btn-primary btn-lg mt-2" onclick="SearchUser()">Buscar</button>
                    </div>
                </div>
                <br>

                {{--  <div class="d-flex justify-content-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>  --}}
            {{--  </form>  --}}

            <form method="POST" action="{{ route('users.store') }}" id="form">
                @csrf

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"  required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Apellido Paterno</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Apellido Materno</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"  required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Dni</label>
                        <input type="text" class="form-control" id="dni" name="dni" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>



                <div class="form-group">
                    <label for="exampleFormControlInput1">Rol</label>
                    <select class="form-control" name="roles[]" id="roles">
                        @foreach ($roles as $id => $role)
                            <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>
                                {{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.min.js"
        integrity="sha512-JFjt3Gb92wFay5Pu6b0UCH9JIOkOGEfjIi7yykNWUwj55DBBp79VIJ9EPUzNimZ6FvX41jlTHpWFUQjog8P/sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Mask -->

    <script>
        $("#roles").selectize({
            hideSelected: true,

        });
    </script>

    <script>
        $(document).ready(function() {
            $("#form").validate({

                rules: {

                    name: {
                        required: true,
                        maxlength: 50
                    },
                    first_name: {
                        required: true,
                        maxlength: 50
                    },
                    last_name: {
                        required: true,
                        maxlength: 50
                    }
                }

            });


            $('#dni_search').mask('00000000');
            $('#dni').mask('00000000');



        });



        function SearchUser() {

            var dni = $('#dni_search').val();
            console.log($('#dni_search').val());
            axios.post('{{ route('reniec.searchUser') }}', {
                dni: dni,
            }).then(function(response) {
                console.log(response);

                const { nombres,apellidoPaterno,apellidoMaterno,numeroDocumento } = response.data;

                $('#name').val(nombres)
                $('#first_name').val(apellidoPaterno)
                $('#last_name').val(apellidoMaterno)
                $('#dni').val(numeroDocumento)



            }).catch(function(error) {
                console.log(error);
            });





        }
    </script>
@endsection
