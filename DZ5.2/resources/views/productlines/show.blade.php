@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Prkaži produktne linije</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('productlines.index') }}"> Nazad</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Naziv:</strong>
                {{ $productline->productLine }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opis:</strong>
                {{ $productline->textDescription }}
            </div>
        </div>
    </div>
@endsection