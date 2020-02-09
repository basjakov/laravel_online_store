@extends('layouts.shop')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <h1>{{$product->name}}</h1>
                    @if(strlen($product->sale)>0)
                        <del><h2>{{$product->price}}$</h2></del>
                        <h3>{{$product->sale}}$</h2>
                    @else
                    <h3>{{$product->price}} $</h2>
                    @endif    
                    <img src="/uploads/product/{{$product->name}}/{{$product->first_image}}" class="rounded" style="max-width:350px;" alt="{{$product->name}}">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <span>Distributor:{{$product->distributor}}</span></br>
                        <span>Category:{{$product->category_id}} </span></br>
                        <span>Weight:{{$product->weight}}</span></br>
                        <span><p>{{$product->short_desc}}</p></span></br>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                @foreach($ProductImages  as $ProductImage)
                     <img src="/uploads/product/{{$product->name}}/{{$ProductImage->filename}}"  class="rounded" style="max-width:200px;" alt="{{$product->name}}">
                @endforeach
              
                <p>{{$product->large_desc}}</p>
        </div>
        </div>
    </div>

@endsection