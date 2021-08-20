<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid row">
        <a class="navbar-brand col-4" href="#">
            {{ env('APP_NAME') }}
        </a>

        <div class="d-flex col-8" id="navbarNav">
            <div class="col-md-6">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        @if (auth()->user() && auth()->user()->user_type === 'ADMIN')
                            <a class="nav-link" aria-current="page" href={{ route('category.index') }}>Categories</a>
                        @else
                            <a class="nav-link" aria-current="page" href={{ route('all-categories') }}>Categories</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (auth()->user() && auth()->user()->user_type === 'ADMIN')
                            <a class="nav-link" href={{ route('products.index') }}>Products</a>
                        @else
                            <a class="nav-link" href={{ route('all-products') }}>Products</a>
                        @endif
                    </li>

                </ul>
            </div>

            <div class="col-md-61">


                <ul class="navbar-nav ">
                    @if (auth()->user())
                        <li class="nav-item">
                            <a class="nav-link  " href="#">Welcome {{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/logout">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('login') }}>Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('register') }}>Register</a>
                        </li>
                    @endif


                </ul>
            </div>
        </div>
    </div>
</nav>
