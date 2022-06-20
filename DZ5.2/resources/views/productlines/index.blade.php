@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>BIRT PRODUKTNE LINIJE</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('productlines.create') }}"> Dodaj novu produktnu liniju</a>
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
        <th>Naziv</th>
        <th>Opis</th>
        <th width="280px">Opcije</th>
    </tr>
    @foreach ($productlines as $productline)
    <tr>
        <td>{{ $productline->productLine }}</td>
        <td>{{ $productline->textDescription }}</td>
        <td>
            <form action="{{ route('productlines.destroy',$productline->productLine) }}" method="POST">
                <a class="btn btn-info" href="{{ route('productlines.show',$productline->productLine) }}">Detalji</a>
                <a class="btn btn-primary" href="{{ route('productlines.edit',$productline->productLine) }}">Uredi</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Izbriši</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $productlines->links() }}
    
@endsection