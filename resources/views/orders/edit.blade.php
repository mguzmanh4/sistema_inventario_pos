@extends('layouts.app')

@section('styles')
    {{-- Selectize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.min.css" integrity="sha512-VL5zQAJyFw5RL9wN3a5nF508dBqgOAYOZeww5RuEq8A8JQLiWy20iG2lLyiTuF6bv7gz48UGMcxuMlUycoHfJw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Order</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('orders.update',[$order->id]) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">User</label>
                    <input type="text" class="form-control" readonly id="name" name="name" value="{{ $order->user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Client Name</label>
                    <input type="text" class="form-control" readonly id="client_name" name="client_name" value="{{ $order->client_name }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Products</label>
                    <select class="form-control" name="products[]" id="products" multiple>
                        @foreach($products as  $product)
                            <option value="{{ $product->id }}" {{ (in_array($product->id, old('products', [])) || $order->products->contains($product->id)) ? 'selected' : '' }}>{{ $product->name }} - {{ $product->purchase_price }}</option>
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
        $("#products").selectize({
            hideSelected: true,

        });
    </script>
@endsection
