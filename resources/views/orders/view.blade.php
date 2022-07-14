@extends('layouts.app')

@section('styles')
    {{-- Selectize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.min.css" integrity="sha512-VL5zQAJyFw5RL9wN3a5nF508dBqgOAYOZeww5RuEq8A8JQLiWy20iG2lLyiTuF6bv7gz48UGMcxuMlUycoHfJw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Order</h6>
        </div>
        <div class="card-body">

            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">User</label>
                    <input readonly type="text" class="form-control" id="name" name="name" value="{{ $order->user->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Client Name</label>
                    <input type="text" class="form-control" readonly id="client_name" name="client_name" value="{{ $order->client_name }}" required>
                </div>
                <div class="form-group">
                    <table id="order-table" class="table" style="width:100%">
                        <thead>
                            <tr align="center">
                                <th>Product</th>
                                <th>Sku</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $suma = 0 ;
                            @endphp
                            @foreach ($order->products as $product)
                                <tr align="center">
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>S/ {{ $product->purchase_price }}</td>
                                </tr>
                                @php
                                    $suma += $product->purchase_price;
                                @endphp
                            @endforeach
                                <tr>
                                    <td align="center" style="font-size: 30px; font-weight: bold;">Total</td>
                                    <td></td>
                                    <td align="center" style="font-size: 30px; font-weight: bold;">S/ {{ $suma }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <a href="/donwload-pdf/{{ $order->id }}" class="btn btn-primary btn-lg btn-block">
                    Download PDF
                </a>


                {{--  <button type="submit" class="btn btn-primary btn-lg btn-block">Download PDF</button>  --}}
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
    </script>
@endsection
