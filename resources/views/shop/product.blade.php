@extends('layouts.shop')
@section('content')
    <div class="container">
        <div class="row">
        @foreach($products as $product)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
           
                <img src="/uploads/product/{{$product->name}}/{{$product->first_image}}" width="128px">
                <h2>{{$product->name}}</h2>
                <span style="font-size:30px;">{{$product->price}}</span>$<br>
                <span>Computers</span><br>
                <a href="{{route('product.show',$product->id)}}" class="button2 b-green rot-135">Դիտել Ավելին</a></br>
                <a href="#" class="button2 b-blue rot-135 " onclick="AddToCart('{{$product->id}}','{{$product->name}}','{{$product->price}}','{{$product->first_image}}','{{$product->weight}}')">Ավելացնել Զամբյուղում</a></br>
            </div>
          
         @endforeach 
        
        </div>
        <script type="text/javascript">
                        function AddToCart(id,name,price,first_image,weight){
                                let data = {
                                   name,
                                   price,
                                   first_image,
                                   weight

                                }
                                    
                                    localStorage.setItem(id, JSON.stringify(data));
                                
                            }
        </script>  
    </div>
@endsection