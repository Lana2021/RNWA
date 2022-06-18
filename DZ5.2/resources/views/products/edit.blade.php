@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Uredi produkt</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Nazad</a>
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

    <form action="{{ route('products.update',$product->productCode) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naziv:</strong>
                    <input type="text" name="productName" value="{{ $product->productName }}" class="form-control" placeholder="Naziv">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Produktna linija:</strong>
                    <input type="text" name="productLine" value="{{ $product->productLine }}" class="form-control" placeholder="Produktna linija">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Produktna skala:</strong>
                    <input type="text" name="productScale" value="{{ $product->productScale }}" class="form-control" placeholder="Produktna skala">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prodavač:</strong>
                    <input type="text" name="productVendor" value="{{ $product->productVendor }}" class="form-control" placeholder="Prodavač">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Količina na stanju:</strong>
                    <input type="text" name="quantityInStock" value="{{ $product->quantityInStock }}" class="form-control" placeholder="Količina na stanju">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prodajna cijena:</strong>
                    <input type="text" name="buyPrice" value="{{ $product->buyPrice }}" class="form-control" placeholder="Prodajna cijena">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>MSRP:</strong>
                    <input type="text" name="MSRP" value="{{ $product->MSRP }}" class="form-control" placeholder="MSRP">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Potvrdi</button>
            </div>
        </div>

    </form>
@endsection