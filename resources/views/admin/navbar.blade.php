<nav class="navbar navbar-expand-lg bg-success p-3">
    <div class="container-fluid">
        <a class="navbar-brand fs-2 text-light" href="{{ url('/') }}">Giftos</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page"
                        href="{{ url('/admin/dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page"
                        href="{{ url('/add_category') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/products') }}">Product</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="btn btn-danger">Logout</button>
            </form>

        </div>
    </div>
</nav>
