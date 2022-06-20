@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>BIRT NARUDŽBE</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('orders.create') }}"> Dodaj novu narudžbu</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Broj narudžbe</th>
        <th>Datum narudžbe</th>
        <th>Traženi datum</th>
        <th>Datum isporuke</th>
        <th>Status</th>
        <th>Broj kupca</th>
        <th width="280px">Opcije</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
        <td>{{ $order->orderNumber }}</td>
        <td>{{ $order->orderDate }}</td>
        <td>{{ $order->requiredDate }}</td>
        <td>{{ $order->shippedDate }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->customerNumber }}</td>
        <td>
            <form action="{{ route('orders.destroy',$order->orderNumber) }}" method="POST">
                <a class="btn btn-info" href="{{ route('orders.show',$order->orderNumber) }}">Detalji</a>
                <a class="btn btn-primary" href="{{ route('orders.edit',$order->orderNumber) }}">Uredi</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Izbriši</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $orders->links() }}
    
@endsection