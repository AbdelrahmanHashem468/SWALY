@extends('layouts.app')
@section('content')

    <div class="container py-4">
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
    
@endsection