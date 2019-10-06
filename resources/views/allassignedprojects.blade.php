@extends('layouts.app')
@section('content')

<div class="container py-4">

        @foreach ($unread_projects as $projects)
            <div class="row">
                <form class="col-md-8" method="POST" action="/setmodule">
                    <h3 style="color:darksalmon">{{$projects->massage}}</h3>
                    <hr>
                    <h4  style="color:snow">--------------Set Module----------------</h4>
                    <hr>
                    @csrf
                    <div class="form-group">
                        <h4 for="exampleFormControlSelect1">Select TeamLeader</h4>
                        <select class="form-control" name="MTL_id" id="exampleFormControlSelect1">
                            @foreach($teamleader as $index)
                                <option value="{{$index['id']}}">{{$index['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h4 for="exampleFormControlSelect1">Select Trainee</h4>
                        <select class="form-control" name="MTS_id" id="exampleFormControlSelect1">
                            @foreach($trainee as $row)
                                <option value="{{$row['id']}}" >{{$row['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h4 for="exampleFormControlSelect1">Select Deadline</h4>
                        <input type='date' name="Deadline" class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type='hidden' name="project_id" value="{{$projects->attachment}}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Send Module</button>
                    </div>
                </form>
            </div>  
        @endforeach

            <br>

            <h2>All previous Assigned projects</h2>
            <div class="row">
                @foreach ($read_projects as $row)
                    <div class="card col-md-3" style="width: 18rem;">
                        <img src="/images/{{ $row->image_name }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">{{$row->project_name}}</h3>
                            <p class="card-text">{{$row->desc}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
</div>

@endsection