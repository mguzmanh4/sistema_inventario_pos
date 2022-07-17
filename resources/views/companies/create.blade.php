@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Información de la Empresa</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('companies.store') }}" id="form">
                @csrf
                <div class="row mt-3">

                    <div class="col">
                        <label for="exampleFormControlTextarea1">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $company ? $company->name : '' }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">RUC</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" value="{{ $company ? $company->ruc : '' }}" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $company ? $company->address : '' }}" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Teléfono</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $company ? $company->phone : '' }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Celular</label>
                        <input type="text" class="form-control" id="cellphone" name="cellphone" value="{{ $company ? $company->cellphone : '' }}" required>
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}" required>

                    </div>
                </div>
                <br>

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
                        maxlength: 20
                    },
                    ruc: {
                        required: true,
                    },
                    address: {
                        required: true,
                        maxlength: 50
                    },
                    phone: {
                        required: true,
                    },
                    cellphone: {
                        required: true,
                    },

                }
            });

            $('#ruc').mask('00000000000');
            $('#phone').mask('0000000');
            $('#cellphone').mask('000000000');

        });
    </script>
@endsection
