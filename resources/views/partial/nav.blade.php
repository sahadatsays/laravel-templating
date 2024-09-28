<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('index') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('about') ? 'active' : '' }}" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('services') ? 'active' : '' }}" href="#">Services </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('blog') ? 'active' : '' }}" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('shop') ? 'active' : '' }}" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}" href="contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('posts.*') ? 'active' : '' }}" href="{{ route('posts.index') }}">Posts</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
