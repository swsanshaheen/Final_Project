<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="index.blade.php" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('categories')}}" class="nav-item nav-link">categories</a>
{{--                <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>--}}
                @guest()
                <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                @endguest
                @auth()
                <a href="{{route('admin.admin')}}" class="nav-item nav-link">Dashbord</a>
                <a href="{{route('logout')}}" class="nav-item nav-link">Logout</a>
                @endauth
            </div>
            <form method="post" action="{{route('sarch')}}">
                @csrf
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Keyword" name="sarch">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3" name="submit"><i
                                class="fa fa-search" ></i></button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</div>
<!-- Navbar End -->
