@extends('layouts.app')

@section('styles')
    {{-- Selectize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.min.css" integrity="sha512-VL5zQAJyFw5RL9wN3a5nF508dBqgOAYOZeww5RuEq8A8JQLiWy20iG2lLyiTuF6bv7gz48UGMcxuMlUycoHfJw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('products.update',[$product->id]) }}" id="form">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Sku</label>
                        <input type="text"  readonly class="form-control" id="sku" name="sku" value="{{ $product->sku}}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Category</label>
                    <select class="form-control" name="categories[]" id="categories" multiple>
                        @foreach($categories as $id => $category)
                            <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $product->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="description" name="description" id="exampleFormControlTextarea1" required
                        rows="3">{{ $product->description }}</textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Purchase Price per Uni</label>
                        <input type="text" class="form-control" id="purchase_price" name="purchase_price" value="{{ $product->purchase_price }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Selling Price per Unit</label>
                        <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{ $product->selling_price }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Utility</label>
                        <input type="text" class="form-control" readonly id="utility" name="utility" value="{{ $product->utility }}" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.min.js" integrity="sha512-JFjt3Gb92wFay5Pu6b0UCH9JIOkOGEfjIi7yykNWUwj55DBBp79VIJ9EPUzNimZ6FvX41jlTHpWFUQjog8P/sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $("#categories").selectize({
            hideSelected: true,

        });
    </script>
    <script>
        $(document).ready(function() {
            $("#form").validate({});
        });
    </script>

    <script>
        let purchase_price = document.getElementById('purchase_price');
        let selling_price = document.getElementById('selling_price');

        window.addEventListener('load', async() => {
            if (purchase_price) {

                purchase_price.addEventListener('keyup', (event) => {
                    //console.log("2222")

                    let selling_priceElm = document.getElementById('selling_price').value;
                    if (selling_priceElm) {
                        let valueSelling = Number.parseFloat(selling_priceElm.replace(/,/g, ''));
                        let purchase_price = Number.parseFloat(event.target.value.replace(/,/g, ''));
                        document.getElementById('utility').value = ((purchase_price + valueSelling)).toFixed(2);
                    }
                })
            }

            if (selling_price) {
                selling_price.addEventListener('keyup', (event) => {
                    // console.log(event.target.value);
                    let purchase_price = document.getElementById('purchase_price').value;
                    if (purchase_price) {
                        let valueSelling = Number.parseFloat(event.target.value.replace(/,/g, ''));
                        purchase_price = Number.parseFloat(purchase_price.replace(/,/g, ''));
                        document.getElementById('utility').value = ((purchase_price + valueSelling)).toFixed(2);
                    }
                });
            }



        });
    </script>


@endsection
