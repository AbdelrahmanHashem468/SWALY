@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
                <div style="text-align:center;">
                        <img src="/images/{{ Auth::User()->image_name }}" class="card-img-top photto" alt="...">
                        <br/>
                        <br/>
                        <h2>{{Auth::User()->name}}</h2>
                        <h4>{{str_limit(Auth::User()->email, 23, '....')}}</h4>
                        <h4>{{Auth::User()->phonenumber}}</h4>
                        <h4>
                        @if( Auth::User()->role == 0) Admin @endif
                        @if( Auth::User()->role == 2) Marketing Directors @endif
                        @if( Auth::User()->role == 3) Marketing Team Leaders @endif
                        @if( Auth::User()->role == 1)Customer @endif
                        @if( Auth::User()->role == 4) Marketing Terainees @endif
                        </h4>
                    </div>
        </div>
        <div class="col-9">
            <form enctype="multipart/form-data" action="/update" method="post" class="col-8">
                    @csrf
                    <br/>
                    <br/>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $user->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="text" class="form-control" name="email" value="{{old('email') ?? $user->email}}" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>

                <div class="form-group">
                        <label >PhoneNumber</label>
                        <input type="text" class="form-control" name="phonenumber" value="{{old('phonenumber') ?? $user->phonenumber}}" id="exampleFormControlInput1" placeholder="PhoneNumber">
                    </div> 

                <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" autocomplete="off" readonly 
                        onfocus="this.removeAttribute('readonly');" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Upload Photo</label>
                        <input type="file" value="{{old('image_name') ?? $user->image_name}}" name="input_img" class="form-control-file" id="exampleFormControlFile1">
                </div>  
                <button type="submit" class="btn btn-primary">Save</button>        
            </form>
            <br/>
            <br/>
        </div>
    </div>
</div>
  @endsection