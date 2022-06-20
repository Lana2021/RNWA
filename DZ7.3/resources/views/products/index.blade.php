@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>BIRT PRODUKTI</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Dodaj novi produkt</a>
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
        <th>ID</th>
        <th>Naziv</th>
        <th>Produktna linija</th>
        <th>Produktna skala</th>
        <th>Prodavač</th>
        <th>Količina na stanju</th>
        <th>Prodajna cijena</th>
        <th>MSRP</th>
        <th width="280px">Opcije</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->productCode }}</td>
        <td>{{ $product->productName }}</td>
        <td>{{ $product->productLine }}</td>
        <td>{{ $product->productScale }}</td>
        <td>{{ $product->productVendor }}</td>
        <td>{{ $product->quantityInStock }}</td>
        <td>{{ $product->buyPrice }}</td>
        <td>{{ $product->MSRP }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->productCode) }}" method="POST">
                <a class="btn btn-info" href="{{ route('products.show',$product->productCode) }}">Detalji</a>
                <a class="btn btn-primary" href="{{ route('products.edit',$product->productCode) }}">Uredi</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Izbriši</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $products->links() }}
    
@endsection