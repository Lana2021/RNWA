@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Uredi narudžbu</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Nazad</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.update',$order->orderNumber) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Broj narudžbe:</strong>
                    <input type="text" name="orderNumber" value="{{ $order->orderNumber }}" class="form-control" placeholder="Broj narudžbe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Datum narudžbe:</strong>
                    <input type="text" name="orderDate" value="{{ $order->orderDate }}" class="form-control" placeholder="Datum narudžbe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Traženi datum isporuke:</strong>
                    <input type="text" name="requiredDate" value="{{ $order->requiredDate }}" class="form-control" placeholder="Traženi datum">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Datum isporuke:</strong>
                    <input type="text" name="shippedDate" value="{{ $order->shippedDate }}" class="form-control" placeholder="Datum isporuke">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" value="{{ $order->status }}" class="form-control" placeholder="Status">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Broj kupca:</strong>
                    <input type="text" name="customerNumber" value="{{ $order->customerNumber }}" class="form-control" placeholder="Broj kupca">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Potvrdi</button>
            </div>
        </div>

    </form>
@endsection