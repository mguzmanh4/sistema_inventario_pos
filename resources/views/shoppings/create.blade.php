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
            <h6 class="m-0 font-weight-bold text-primary">Create Shopping</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('shoppings.store') }}" id="form">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">Product</label>
                    <select class="form-control" name="products[]" id="products">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ in_array($product->id, old('products', [])) ? 'selected' : '' }}>{{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Sku</label>
                        <input type="text" readonly class="form-control" id="sku" name="sku" required>
                        <input type="hidden"  class="form-control" id="product_id" name="product_id" >

                    </div>
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Stock</label>
                        <input type="number"readonly class="form-control" id="stock" name="stock" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Purchased Amount</label>
                        <input type="number" class="form-control" id="purchased_amount" name="purchased_amount" required>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">Vendor</label>
                        <input type="text" class="form-control" id="vendor" name="vendor" required>
                    </div>

                    <div class="col">
                        <label for="exampleFormControlTextarea1">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost" required>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.min.js"
        integrity="sha512-JFjt3Gb92wFay5Pu6b0UCH9JIOkOGEfjIi7yykNWUwj55DBBp79VIJ9EPUzNimZ6FvX41jlTHpWFUQjog8P/sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $("#products").selectize({
            hideSelected: true,
            onChange(value) {
                getProductData(value)
            }
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

        window.addEventListener('load', async () => {
            if (purchase_price) {

                purchase_price.addEventListener('keyup', (event) => {
                    //console.log("2222")

                    let selling_priceElm = document.getElementById('selling_price').value;
                    if (selling_priceElm) {
                        let valueSelling = Number.parseFloat(selling_priceElm.replace(/,/g, ''));
                        let purchase_price = Number.parseFloat(event.target.value.replace(/,/g, ''));
                        document.getElementById('utility').value = ((purchase_price + valueSelling))
                            .toFixed(2);
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
                        document.getElementById('utility').value = ((purchase_price + valueSelling))
                            .toFixed(2);
                    }
                });
            }



        });

        function getProductData(id) {
            let url = '/products/' + id;

            $.get(url, function(data) {
                document.getElementById('product_id').value = data.id;
                document.getElementById('sku').value = data.sku;
                document.getElementById('stock').value = data.stock;
            })

        }
    </script>
@endsection
