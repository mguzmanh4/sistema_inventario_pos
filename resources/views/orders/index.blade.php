@extends('layouts.app')

{{--  @section('styles')
    <!-- Datatables-->
    <link href="{{ asset('css/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection  --}}

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
        </div>

        <div class="card-header py-3">
            <a href="{{ route('orders.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>


        <div class="card-body">


            <table id="order-table" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Products</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>
                                @foreach($order->products as $key => $item)
                                    <span class="badge badge-primary">{{ $item->name }}</span>
                                @endforeach
                            </td>

                            <td>
                                <form action="{{ route('orders.destroy', $order->id ) }}" method="post">
                                    <a href="/orders/{{ $order->id }}/edit" class="btn btn-info">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <a href="/orders/{{ $order->id }}" class="btn btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>




                                    {{--  <button type="submit" class="btn btn-success">
                                        <i class="fas fa-eye"></i>
                                    </button>  --}}
                                </form>
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
                order: [[0, 'desc']],
            });
        });
    </script>
@endsection
