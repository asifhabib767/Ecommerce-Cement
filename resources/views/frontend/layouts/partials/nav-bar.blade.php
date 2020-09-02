   <!-- Navigation Area Start -->
   @php
    if(Auth::check()){
        $user=Auth::user();
    }
   @endphp
   <div class="NavigationWrapper" id="myHeader">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="Navigation">
                      <nav class="navbar navbar-expand-lg navbar-light">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                           <div class="navbar-collapse collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav mr-auto">

                                  <li class="nav-item"> <a class="nav-link activemenu" href="https://www.akijcement.com/">Home <span class="sr-only">(current)</span></a>  </li>
                                  <li class="nav-item"> <a class="nav-link" href="https://www.akijcement.com/about-group/">Company </a>  </li>
                                  <li class="nav-item"> <a class="nav-link" href="https://www.akijcement.com/products/"> Products</a>  </li>
                                   <li class="nav-item"> <a class="nav-link" href="https://www.akijcement.com/100-years-assurance/"> Why Akij Cement</a>  </li>
                                   <li class="nav-item"> <a class="nav-link" href="https://www.akijcement.com/news-events/#1535523774931-627c7ff5-9d54"> Media</a>  </li>
                                   <li class="nav-item"> <a class="nav-link" href="{{ route('index') }}"> Order Now</a>  </li>
                                  <li class="nav-item"> <a class="nav-link" href="https://www.akijcement.com/contact-us/"> Contact Us </a>  </li>
                                  <li class="nav-item"> <a class="nav-link" target="_blanck" href="https://bandhan.akij.net/"> Bandhan Magazine</a>  </li>
                                  @if(auth()->check())
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}">{{ $user->first_name }}</a>  </li>
                                    @else 
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Sign In</a>  </li>
                                    @endif
                                </ul>
                          </div>
                      </nav>
                  </div>
              </div>
             
             
          </div>
      </div>
  </div>
  <!-- Navigation Area End -->