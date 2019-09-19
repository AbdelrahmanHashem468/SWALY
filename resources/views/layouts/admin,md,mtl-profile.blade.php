@extends('layouts.app')
@section('content')

<div class="container py-4">
    <div class="row">
        <div class="col-md-3 side-bar">
            @include("includes.navi")
    
        </div>
        
        <div class="col-md-9">
                <div style="text-align:center;">
                    <img src={{ URL::asset('public/asd.jpg')}} class="card-img-top photto" alt="...">
                    <br/>
                    <br/>
                    <h2>{{Auth::User()->name}}</h2>
                    <h4>{{Auth::User()->email}}</h4>
                    <h4>{{Auth::User()->phonenumber}}</h4>
                    <h4>
                      @if( Auth::User()->role == 0) Admin @endif
                      @if( Auth::User()->role == 2) Marketing Directors @endif
                      @if( Auth::User()->role == 3) Marketing Team Leaders @endif
                    </h4>
                </div>
                <hr>

                <h2>All Current projects</h2>

                <div class="row">
                    @foreach ($projects as $row)
                        
                        <div class="card col-md-3" style="width: 18rem;">
                                <img src="/images/{{ $row->image_name }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h3 class="card-title">{{$row->name}}</h3>
                                <p class="card-text">{{$row->desc}}</p>
                                @if(Auth::User()->role ==2)
                                  <a href="#" class="btn btn-primary">Send Request</a>
                                @endif
                                </div>
                              </div>
                    @endforeach
  
                </div>


        
        </div> 

    </div>

</div>

@endsection
