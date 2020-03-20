<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item mt-lg-5">
                <a class="nav-link active" href="{{ action('Admin\AdminController@panel') }}">
                    <span class="fa fa-home"></span>
                    Panel
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ action('Admin\Categories\CategoryController@items') }}">
                    <span class="fa fa-tags"></span>
                    Kategorie
                </a>
            </li>
        </ul>
    </div>
</nav>
