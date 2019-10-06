@extends('layouts.app')
@section('content')
<div class="container">
    <br>
        <h2>Project Module</h2>
        <div class="row">
@foreach ($project as $row)
        <div class="card col-md-4"  style="width: 18rem;">
            <img src="/images/{{$row->pimage}}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Project Name:<br> {{$row->pname}}</h5>
            <p class="card-text">Project Descreption: {{$row->pdesc}}</p>
            </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">MD: <strong>{{$row->mdName}}</strong></li>
                    <li class="list-group-item">MTL: <strong>{{$row->mtlName}}</strong></li>
                    <li class="list-group-item">MTS: <strong>{{$row->trainName}}</strong></li>
                </ul>

        </div>
    @endforeach
</div>
</div>
@endsection