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
                    <h2>Shika</h2>
                    <h4>Shika@gmail.com</h4>
                    <h4>01140073150</h4>
                    <h4>Marketing Director</h4>
                </div>
                <hr>

                <h2>All Current projects</h2>

                <div class="row">
                      <div class="card col-md-3" style="width: 18rem;">
                              <img src={{ URL::asset('public/asd.jpg')}} class="card-img-top" alt="...">
                              <div class="card-body">
                                <h3 class="card-title">Card title</h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Send Request</a>
                              </div>
                            </div>

                            <div class="card col-md-3" style="width: 18rem;">
                                <img src={{ URL::asset('public/asd.jpg')}} class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h3 class="card-title">Card title</h3>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Send Request</a>
                                </div>
                              </div>

                              <div class="card col-md-3" style="width: 18rem;">
                                  <img src={{ URL::asset('public/asd.jpg')}} class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h3 class="card-title">Card title</h3>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Send Request</a>
                                  </div>
                                </div>
                </div>

                <hr>

                <h2>All previous Assigned projects</h2>

                <div class="row">
                    <div class="card col-md-3" style="width: 18rem;">
                            <img src={{ URL::asset('public/asd.jpg')}} class="card-img-top" alt="...">
                            <div class="card-body">
                              <h3 class="card-title">Card title</h3>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="btn btn-primary">Send Request</a>
                            </div>
                          </div>

                          <div class="card col-md-3" style="width: 18rem;">
                              <img src={{ URL::asset('public/asd.jpg')}} class="card-img-top" alt="...">
                              <div class="card-body">
                                <h3 class="card-title">Card title</h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Send Request</a>
                              </div>
                            </div>

                            <div class="card col-md-3" style="width: 18rem;">
                                <img src={{ URL::asset('public/asd.jpg')}} class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h3 class="card-title">Card title</h3>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Send Request</a>
                                </div>
                              </div>
                </div>
        
        </div> 

    </div>

</div>

@endsection
