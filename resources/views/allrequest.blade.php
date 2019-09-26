@extends('layouts.app')
@section('content')
<div class="container">
    <?php $state = 0; ?>
    @foreach($fetchedData as $data)
    <?php $row = get_object_vars($data);?>
    @if($state!= $row['project_id'])
        @if($state!=0)
        </div>
        @endif
        <?php $state = $row['project_id'];
        ?>
        <div class="row">
                <div class="alert alert-dark margin_auto" role="alert">
                    <h3>Recived Requests for project : <a href="" class="btn btn-dark">
                        {{$row['project_name']}}</a></h3>
                </div>
        </div>
        <div class="row">
    @endif
    
        <div class="col-md-3">
            <div class="card card_min" style="width: 15rem;">
                <img src="/images/1568674816.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ $row['name'] }}</h3>
                    <p class="card-text">{{ $row['email'] }}</p>
                    <p class="card-text">{{ $row['phonenumber']}} </p>
                    <form action="/acceptrequest" method="post">
                    @csrf
                        <input type="hidden" value="{{$row['project_id']}}" name="project_id" class="form-control-file" >
                        <input type="hidden" value="{{$row['MD_id']}}" name="MD_id" class="form-control-file" >
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
                    
                </div>
            </div>
        </div>
    
    @endforeach    

</div>
@endsection
