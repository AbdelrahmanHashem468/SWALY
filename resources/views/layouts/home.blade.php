@extends('layouts.app')
@section('content')

<div class="container py-4">
    <div class="row">
    
            <div class="col-md-9">
                @if(Auth::User()->role ==1)
                  <form enctype="multipart/form-data" action="/project/add" method="post" class="col-md-8" >
                    @if(session('iscreated'))
                    <div class="alert alert-success" role="alert">
                        A simple success alert—check it out!
                      </div>
                    @endif
                    @csrf
                      <div class="form-group">
                          <label for="exampleInputEmail1">Project Name</label>
                          <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Project Name">
                      </div>

                      <div class="form-group">
                          <label for="exampleInputPassword1">Description</label>
                          <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>                
                      </div>
                      

                      <div class="form-group col-md-6">
                              <label for="exampleFormControlFile1">Upload Photo</label>
                              <input type="file"  name="input_img" class="form-control-file" id="exampleFormControlFile1">
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                  
                  </form>
                @endif
                <hr>

                <h2>All Current projects</h2>

                <div class="row">
                  @foreach ($projects as $row)
                      
                      <div class="card col-md-3" style="width: 18rem;">
                              <img src="/images/{{ $row->image_name }}" class="card-img-top" alt="...">
                              <div class="card-body">
                              <h3 class="card-title">{{$row->project_name}}</h3>
                              <p class="card-text">{{$row->desc}}</p>
                              @if(Auth::User()->role ==2)
                                <form action="/request" method="post">
                                  @csrf
                                <input type="hidden" value="{{$row->id}}" name="id" class="form-control-file" >
                                <button type="submit" class="btn btn-primary">Send Request</button>
                                </form>
                              @endif
                              </div>
                            </div>
                        
                  @endforeach

                </div>

                <hr>

                <h2>All previous Assigned projects</h2>

                <div class="row">
                    @foreach ($assigned_projects as $row)
                      
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

            <div class="col-md-3 side-bar">
                @include("includes.navi")

            </div>  

    </div>

</div>

@endsection
