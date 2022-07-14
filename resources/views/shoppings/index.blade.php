@extends('layouts.app')

{{-- @section('styles')
    <!-- Datatables-->
    <link href="{{ asset('css/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection --}}

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Shoppings</h6>
        </div>

        <div class="card-header py-3">
            <a href="{{ route('shoppings.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> Add New
            </a>

            <a href="{{ route('export.shoppings') }}" class="btn btn-primary">
                <i class="fas fa-file-excel"></i> Export
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
                        <th>Product</th>
                        <th>Sku</th>
                        <th>Stock</th>
                        <th>Purchased Amount</th>
                        <th>Vendor</th>
                        <th>Cost</th>
                        <th></th>
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
                            <td>
                                <a href="/shoppings/{{ $shopping->id }}/edit" class="btn btn-info">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a onclick="deleteRow('{{ route('shoppings.destroy', $shopping->id) }}')"
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
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
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
