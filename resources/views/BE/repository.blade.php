@extends('layout.umain')




<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten2')
 
        <!-- Page header with logo and tagline-->
      <!--   <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header> -->

        <!-- Page content-->
        <div class="container">
            <div class="row">
                
                <!-- Side widgets-->
                <div class="col-lg-3">
                    <!-- Search widget-->

                    <div class="card mb-4">
                        <div class="card-header">Cheil Jedang</div>
                        <div class="card-body">
                        <ul id="tree1">
                            @foreach($categories as $category)

                                <li>
                                    {{ $category->name }}
                                   <ul>
                                    @foreach($categories2 as $child)
                                        <li>
                                             {{ $child->name }}
                                             @if((count($child->childs)))

                                                @include('manageChild',['childs' => $child->childs])
                                            @endif
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
              
                        </div>
                    </div>


                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                   
                </div>
                   <div class="col-lg-9">
                      <!-- Featured blog post-->
                          <div class="card mb-4">
                            <div class="card-header">
                    
                    <!-- Fitur Repos -->
                       <div class="btn-group">
  <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Select
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Select</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div> 

<div class="btn-group">
  <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Create ...
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Create ...</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-sm"  aria-haspopup="true" aria-expanded="false">
    Upload
  </button>
</div>

                        </div><div class="container">
                               wdwdw
                             </div>
                             <hr>
                        <div class="card-body">
                             
                            <div class="small text-muted">January 1, 2021</div>
                            <h2 class="card-title">Featured Post Title</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="#!">Read more →</a>
                        </div>

                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
           
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav>
                </div>
        
<!-- //Row -->
            </div>
<!-- conten -->
            </div>


       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>

        @endsection