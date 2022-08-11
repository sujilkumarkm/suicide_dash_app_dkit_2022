<nav class="navbar navbar-expand-xl smart-scroll navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{asset('assets/img/Dkit_logo_small.jpg')}}" class="img-fluid" style="max-height:80px !important;" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                    <a class="nav-link toggle-menu" href="/">Home</a>
                </li>
            <li class="nav-item dropdown ddown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Listings</a>
                    <ul class="dropdown-menu">
                           <li class="ddown">
                                <a class="dropdown-item" href="#">Find My Match</a>
                            </li>
                            <li class="ddown">
                                <a class="dropdown-item" href="#">Featured Profiles</a>
                            </li>
                        </ul>
                    </li>
                <li class="nav-item ">
                    <a class="nav-link toggle-menu" href="/sold-search?property_type_1=1">WEDDING GALLERY</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link toggle-menu" href="/about">about us</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link toggle-menu" href="/contact">contact us</a>
                </li>
                <li class="nav-item dropdown ddown">
                    <a class="nav-link dropdown-toggle drp" href="#" data-toggle="dropdown" aria-expanded="false">Login/Register</a>
                    <ul class="dropdown-menu">
                    <li class="ddown"><a class="dropdown-item" href="/new-listing-alert">Login</a></li>
                    <li class="ddown"><a class="dropdown-item" href="/neighbourhood-alert">Register</a></li>

                        @if($data['sellers'])
                        <li class="ddown"><a class="dropdown-item dropdown-toggle" href="#">Seller's Guide</a>
                            <ul class="submenu dropdown-menu">
                            @foreach($data['blog_data'] as $blog)
                            @if($blog->show_in =="Seller's Guide")
                            <li class="ddown"><a class="dropdown-item" href="{{route('blog.show',$blog->slug)}}"
                                       >{{$blog->title}}</a></li>

                            @endif
                            @endforeach
                            </ul>
                        </li>
                        @endif
                        @if($data['buyers'])
                        <li class="ddown"><a class="dropdown-item dropdown-toggle" href="#">Buyer's Guide</a>
                            <ul class="submenu dropdown-menu">
                            @foreach($data['blog_data'] as $blog)
                            @if($blog->show_in =="Buyer's Guide")
                            <li class="ddown"><a class="dropdown-item" href="{{route('blog.show',$blog->slug)}}"
                                       >{{$blog->title}}</a></li>

                             @endif
                            @endforeach
                            </ul>
                        </li>
                        @endif
                        @if($data['blogs'])
                        <li class="ddown"><a class="dropdown-item dropdown-toggle" href="#">Blogs</a>
                            <ul class="submenu dropdown-menu">
                            @foreach($data['blog_data'] as $blog)
                            @if($blog->show_in =="Blogs")
                            <li class="ddown"><a class="dropdown-item" href="{{route('blog.show',$blog->slug)}}"
                                       >{{$blog->title}}</a></li>

                             @endif
                            @endforeach
                            </ul>
                        </li>
                        @endif
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
