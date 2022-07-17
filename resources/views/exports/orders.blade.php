<table id="order-table" class="table" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre de cliente</th>
            <th>Productos</th>
            <th>Cantidad</th>
            {{--  <th>Total</th>  --}}
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->client_name }}</td>
                <td>
                    @php
                        $suma = 0 ;
                    @endphp
                    @foreach ($order->products as $key => $item)
                        <span class="badge badge-primary">{{ $item->name }}  , </span>

                        @php
                            $suma += $item->purchase_price;
                        @endphp
                    @endforeach
                </td>
                <td>
                    @foreach ($order->products as $key => $item)
                        <span class="badge badge-primary">{{ $item->pivot->amount }}  , </span>

                    @endforeach
                </td>

                {{--  <td>S/ {{$suma }}</td>  --}}
                {{--  <td>{{ $order->products }}</td>  --}}
                <td>{{$order->created_at }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
