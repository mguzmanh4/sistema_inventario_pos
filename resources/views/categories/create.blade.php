@extends('layouts.app')

{{-- @section('styles')
    <!-- Datatables-->
    <link href="{{ asset('css/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection --}}

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Crear Categoria</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('categories.store') }}" id="form">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripcion</label>
                    <textarea class="form-control" id="description" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 25
                    },
                    description: {
                        required: true,
                        maxlength: 50
                    }
                }
            });
        });
    </script>
@endsection
