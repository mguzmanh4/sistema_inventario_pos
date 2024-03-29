@extends('layouts.app')

{{--  @section('styles')
    <!-- Datatables-->
    <link href="{{ asset('css/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection  --}}

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
        </div>

        <div class="card-header py-3">
            <a href="{{ route('products.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> Agregar
            </a>

            <a href="{{ route('export.products') }}" class="btn btn-primary">
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

            <table id="product-table" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Sku</th>
                        <th>Nombre</th>
                        <th>Categorias</th>
                        <th>Precio de compra por unidad</th>
                        <th>Precio de venta por unidad</th>
                        <th>Utilidad</th>
                        <th>Stock</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @foreach($product->categories as $key => $item)
                                    <span class="badge badge-primary">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $product->purchase_price }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->utility }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="/products/{{ $product->id }}/edit" class="btn btn-info">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a onclick="deleteRow('{{ route('products.destroy', $product->id) }}')"
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
            $('#product-table').DataTable({
                order: [[0, 'desc']],
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
