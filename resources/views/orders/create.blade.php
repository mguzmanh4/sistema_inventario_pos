@extends('layouts.app')

@section('styles')
    {{-- Selectize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.min.css" integrity="sha512-VL5zQAJyFw5RL9wN3a5nF508dBqgOAYOZeww5RuEq8A8JQLiWy20iG2lLyiTuF6bv7gz48UGMcxuMlUycoHfJw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Crear Orden</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('orders.store') }}" id="form">
                @csrf
                <div class="row mt-3">

                    <div class="col">
                        <label for="exampleFormControlTextarea1"># Orden</label>
                        <input type="text"  readonly class="form-control" id="id" name="id" value="{{ $order ? $order->id + 1 : 1 }}" >
                    </div>

                    <div class="col">
                        <label for="exampleFormControlTextarea1">Nombre de Cliente</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" required>
                    </div>

                </div>
                <br>

                <div class="form-group mt-3">
                    {{--  <label for="exampleFormControlInput1">Select Products</label>
                    <select class="form-control" name="products[]" id="products" multiple>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ in_array($product->id, old('products', [])) ? 'selected' : '' }}> {{ $product->name }} - {{ $product->purchase_price }}</option>
                        @endforeach
                    </select>  --}}

                    <label class="required" for="products"> <strong>Products</strong></label>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Check</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
                        @foreach($products as $product)
                            <tr>
                                <td><input {{ $product->value ? 'checked' : null }} data-id="{{ $product->id }}" type="checkbox" class="product-enable"></td>
                                <td>{{ $product->name }}</td>
                                <td><input id="amount_val"  value="{{ $product->value ?? null }}" {{ $product->value ? null : 'disabled' }} data-id="{{ $product->id }}" name="products[{{ $product->id }}]" type="text" class="product-amount form-control" placeholder="Cantidad"></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Crear Orden</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.min.js" integrity="sha512-JFjt3Gb92wFay5Pu6b0UCH9JIOkOGEfjIi7yykNWUwj55DBBp79VIJ9EPUzNimZ6FvX41jlTHpWFUQjog8P/sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $("#products").selectize({
            hideSelected: true,

        });

        $(document).ready(function() {
            $('.product-enable').on('click', function () {
                let id = $(this).attr('data-id')
                console.log(id)
                let enabled = $(this).is(":checked")
                $('.product-amount[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.product-amount[data-id="' + id + '"]').val(null)
            })

            $("#form").validate({
                rules: {
                    client_name: {
                        required: true,
                        maxlength: 50
                    }
                }
            });

            $('#amount_val').mask('000');


        });





    </script>
@endsection
