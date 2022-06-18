@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Uredi produktnu liniju</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('productlines.index') }}"> Nazad</a>
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

    <form action="{{ route('productlines.update',$productline->productLine) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naziv:</strong>
                    <input type="text" name="productLine" value="{{ $productline->productLine }}" class="form-control" placeholder="Produktna linija">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Produktna linija:</strong>
                    <input type="text" name="textDescription" value="{{ $productline->textDescription }}" class="form-control" placeholder="Opis">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Potvrdi</button>
            </div>
        </div>

    </form>
@endsection