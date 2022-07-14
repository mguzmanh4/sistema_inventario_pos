<table id="product-table" class="table" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Sku</th>
            <th>Name</th>
            <th>Description</th>
            <th>Categories</th>
            <th>Purchase Price per Uni</th>
            <th>Selling Price per Unit</th>
            <th>Utility</th>
            <th>Stock</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>

                <td>
                    @foreach($product->categories as $key => $item)
                        <span class="badge badge-primary">{{ $item->name }}  , </span>
                    @endforeach
                </td>
                <td>{{ $product->purchase_price }}</td>
                <td>{{ $product->selling_price }}</td>
                <td>{{ $product->utility }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->created_at }}</td>

            </tr>
        @endforeach

    </tbody>
</table>
