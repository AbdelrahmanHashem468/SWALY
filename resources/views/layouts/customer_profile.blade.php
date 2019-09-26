@extends('layouts.app')
@section('content')

<div class="back">
        <a href="/request" class="btn btn-light btn-lg btttn adm" role="button">All Rquest</a>
        <a href="/edit" class="btn btn-dark btn-lg active adm" role="button" aria-pressed="true">Edite Profile</a>
        <a href="allcurrentproject" class="btn btn-primary btn-lg active adm" role="button" aria-pressed="true">All Current projects</a>
        <a href="allassignedproject" class="btn btn-secondary btn-lg active adm" role="button" aria-pressed="true">All Assigned projects</a>
    </div>
<div class="container ">
    <div class="row">
 
        <div class="col-4">
                <div style="text-align:center;">
                        <img src={{ URL::asset('public/asd.jpg')}} class="card-img-top photto" alt="...">
                        <br/>
                        <br/>
                        <h2>{{Auth::User()->name}}</h2>
                    <h4>{{Auth::User()->email}}</h4>
                    <h4>{{Auth::User()->phonenumber}}</h4>
                    <h4>
                    @if( Auth::User()->role == 1)Customer @endif
                    @if( Auth::User()->role == 4) Marketing Terainees @endif
                    </h4>
                </div>
        </div>

        <div class="col-8">
                <h2>All Current projects</h2>
                <div class="row">
                        @foreach ($projects as $row)
                            
                            <div class="card col-md-3" style="width: 18rem;">
                                    <img src="/images/{{ $row->image_name }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h3 class="card-title">{{$row->project_name}}</h3>
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