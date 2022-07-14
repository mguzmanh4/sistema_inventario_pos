<table id="product-table" class="table" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Product</th>
            <th>Sku</th>
            <th>Stock</th>
            <th>Purchased Amount</th>
            <th>Vendor</th>
            <th>Cost</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shoppings as $shopping)
            <tr>
                <td>{{ $shopping->id }}</td>
                <td>{{ $shopping->product->name }}</td>
                <td>{{ $shopping->product->sku }}</td>
                <td>{{ $shopping->product->stock }}</td>
                <td>{{ $shopping->purchased_amount }}</td>
                <td>{{ $shopping->vendor }}</td>
                <td>{{ $shopping->cost }}</td>
                <td>{{ $shopping->created_at }}</td>

            </tr>
        @endforeach

    </tbody>
</table>
