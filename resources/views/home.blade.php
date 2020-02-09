@extends('layouts.app')

@section('content')
@if (Auth::check())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Կառավարման Վահանակ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{Route('product.create')}}" class="btn btn-success">Ստեղծել ապրանք</a>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="/uploads/product/{{$product->name}}/{{$product->first_image}}" width="64px">
                            <h2>{{$product->name}}</h2>
                            <span style="font-size:20px;">{{$product->price}}</span>$<br>
                            <span>Computers</span><br>
                            <a href="{{route('product.edit',$product->id)}}">Edit</a>
                            <form action="{{route('product.destroy',$product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Ջնջել">
                            </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="card-body">
                <div class="card-header"><h3>Կատեգորիաներ</h3></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <form action="{{Route('category.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputname">Ավելացնել Կատեգորիա</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputname" placeholder="Կատեգորիայի Անուն*">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Ավելացնել Կատեգորիա">
                                </div>
                            </form>
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                         <table class="table">
                        
                        <thead>
                            <tr>    
                                <th scope="col">Անուն</th>
                                <th scope="col">Գործողություններ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($Categorys as $Category)
                            <tr>                       
                            <th scope="row">{{$Category->name}}</th>               
                            <td> 
                            <form action="{{route('category.destroy',$Category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Ջնջել">
                            </form>
                            </td>                                 
                            </tr>
                        @endforeach    
                        </tbody>
                        </table>
                         </div>
                         
                    </div>                              
        </div>
        <hr>
        <div class="card-header"><h3>Պահեստ</h3></div>
        <div class="row">
        
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    
                            <form action="{{Route('storage.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputproduct_name">Ապրանքի անունը*</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputproduct_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputcount_storage">Չափը *</label>
                                    <input type="text" name="count_storage" class="form-control" id="exampleInputcount_storage">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Ավելացնել Պահեստում">
                                </div>
                            </form>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <table class="table">
                        
                            <thead>
                                <tr>    
                                    <th scope="col">Անուն</th>
                                    <th scope="col">Չափ</th>
                                    <th scope="col">Գործողություններ</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($storages as $storage)
                                <tr>                       
                                <th scope="row">{{$storage->product_name}}</th>
                                <td > {{$storage->count_storage}}</td> 
                                <td > 
                                <form action="{{route('storage.destroy',$storage->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Ջնջել">
                                </form>
                                </td>                                 
                                </tr>
                            @endforeach    
                            </tbody>
                            </table>
                               
                                       
                               
                   </div>
            </div>

    </div>
    <hr>
                <div class="card-body">
                <div class="card-header"><h3>Աշխատակիցներ</h3></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            
                            {{csrf_field()}}
                    
                                <div class="form-group">
                                    <a href="{{route('register.newuser')}}" class="btn btn-success" >Ավելացնել Աշխատակից</a>
                                </div>
                            
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                         <table class="table">
                        
                        <thead>
                            <tr>    
                                <th scope="col">Անուն</th>
                                <th scope="col">Էլ–փոստ</th>
                                <th scope="col">Գործողություններ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>                       
                            <th scope="row">{{$user->name}}</th>  
                            <th scope="row">{{$user->email}}</th>             
                            <td> 
                            <form action="{{route('user.destroy',$user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Ջնջել">
                            </form>
                            </td>                                 
                            </tr>
                        @endforeach    
                        </tbody>
                        </table>
                         </div>
                         
                    </div>                              
                    <hr>
        <div class="card-header"><h3>Պահեստ</h3></div>
        <div class="row">
    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table">
                        
                            <thead>
                                <tr>    
                                    <th scope="col">Վաճառված ապրանք</th>
                                    <th scope="col">Գինը</th>
                                    <th scope="col">Գործողություններ</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                            </tbody>
                            </table>
                               
                                       
                               
                   </div>
            </div>

    </div>
        </div>
</div>
@else
<script type="text/javascript">
         window.location.replace("{{url('/')}}");
       </script>
   
@endif
@endsection
