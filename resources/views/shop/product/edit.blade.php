@extends('layouts.app')
@section('content')
@if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h3>Փոխել Ապրանքի տվյալները</h3>
                <form  method="POST" action="{{route('product.update',$myproduct->id)}}" enctype="multipart/form-data">
                    
                         {{csrf_field()}}
                        {{method_field('put')}}
                       
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname">Անուն *</label>
                            <input type="text" name="name" class="form-control" id="exampleInputname" value="{{$myproduct->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputdistibutor">Արտադրող*</label>
                            <input type="text" name="distributor" class="form-control" id="exampleInputdistibutor" value="{{$myproduct->distributor}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputprice">Գին *</label>
                            <input type="number" name="price" class="form-control" id="exampleInputprice" value="{{$myproduct->price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputsale">Գինը Ակցիայով</label>
                            <input type="number" name="sale" class="form-control" id="exampleInputsale" value="{{$myproduct->sale}}">
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label >Գլխավոր նկար</label>
                              <input type="file" name="first_image" class="form-control" multiple>
                          </div>
                          </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label >Այլ նկարներ</label>
                                    <input type="file" name="files[]" class="form-control" multiple>
                                </div>
                            </div>
                       
                    
                    <div class="form-group">
                            <label for="exampleInputitemvideo">Տեսանյութ </label>
                            <input type="text" name="itemvideo" class="form-control" id="exampleInputitemvideo" value="{{$myproduct->itemvideo}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlshort_desc">Փոքր նկարագրություն *</label>
                        <textarea name="short_desc" class="form-control rounded-0" id="exampleFormControlshort_desc" rows="5" >{{$myproduct->short_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlshort_desc">Մեծ Նկարագրություն</label>
                        <textarea name="large_desc" class="form-control rounded-0" id="exampleFormControllarge_desc" rows="10">{{$myproduct->large_desc}}</textarea>
                    </div>
                    <div class="form-group">
                            <label for="exampleInputweight">Քաշ</label>
                            <input type="number" name="weight" class="form-control" id="exampleInputweight" value="{{$myproduct->weight}}">
                    </div>
                    <div class="form-group">
                           <input type="submit" class="btn btn-success" value="Ավելացնել ապրանք">
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
        </div>
    </div>
    @else
<script type="text/javascript">
         window.location.replace("{{url('/')}}");
       </script>
   
@endif
@endsection