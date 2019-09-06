@extends('layouts.app')
@section('content')

<div class="container ">
    <div class="row">
        <div class="col-md-9">
            <form>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Project Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>                
                </div>
                

                <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Photo</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            
            </form>
<hr>
            <div class="row">
                    <div class="card col-md-4" style="width: 18rem;">
                            <img src={{ URL::asset('public/asd.jpg')}} class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>
            
                          <div class="card col-md-4" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                              </div>
            
                              <div class="card col-md-4" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                  </div>
            </div>

        </div> 
        <div class="col-md-3 side-bar">
            test
        </div>  
    </div>


</div>

@endsection
