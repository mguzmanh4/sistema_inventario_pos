<table id="product-table" class="table" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Sku</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Categorias</th>
            <th>Precio de compra por unidad</th>
            <th>Precio de venta por unidad</th>
            <th>Utilidad</th>
            <th>Stock</th>
            <th>Fecha de creación</th>
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
