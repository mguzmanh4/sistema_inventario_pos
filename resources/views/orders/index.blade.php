@extends('layouts.app')

@section('styles')
    <!-- Datatables-->
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ordenes</h6>
        </div>

        <div class="card-header py-3">
            <a href="{{ route('orders.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> Agregar
            </a>
            <a href="{{ route('export.orders') }}" class="btn btn-primary">
                <i class="fas fa-file-excel"></i> Exportar
             </a>

        </div>



        <div class="card-body">

            @if (session()->has('success'))
                <script>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Información Guardada!',
                        icon: 'success',
                        timer: 1500
                    })
                </script>
            @endif

            <table id="order-table" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre del Cliente</th>
                        <th>Productos</th>
                        <th>Total</th>
                        <th></th>
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
                                    <span class="badge badge-primary">{{ $item->name }}</span>
                                    @php
                                        $suma += ($item->purchase_price * $item->pivot->amount );

                                    @endphp
                                @endforeach
                            </td>
                            <td>S/ {{$suma }}</td>

                            <td>
                                <a href="/orders/{{ $order->id }}/edit" class="btn btn-info">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <a href="/orders/{{ $order->id }}" class="btn btn-success">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a onclick="deleteRow('{{ route('orders.destroy', $order->id) }}')"
                                    class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
@endsection

@section('scripts')
    <!-- Datatables-->
    <script src="{{ asset('js/datatables/datatables.min.js') }}"></script>


    <script>

        $(document).ready(function() {
            $('#order-table').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });


    </script>

    <script>
        deleteRow = async (url) => {
            console.log(url)


            Swal.fire({
                title: 'Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrar!'
            }).then(async (result) => {
                if (result.isConfirmed) {

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                    const response = await fetch(url, {
                        method: 'DELETE',
                        credentials: "same-origin",
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': csrfToken
                        }
                    });
                    const data = await response.json();

                    setTimeout("location.reload(true);", 2000);


                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })

        }
    </script>
@endsection
