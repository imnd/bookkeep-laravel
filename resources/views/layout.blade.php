@include('header')

<div class="sidebar" data-color="azure" data-background-color="white">
    <ul class="sidebar-wrapper ps-container ps-theme-default">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#">{{ $user->username }}</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                @if (isset($user) && $user->isAdmin())
                                    <a class="dropdown-item" href="/settings">Администрирование</a>
                                    <div class="dropdown-divider"></div>
                                @endif
                                <a class="dropdown-item" href="/logout">Выйти</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="/invoices/list">
                    <i class="material-icons">description</i>
                    <p>Фактуры</p>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/contracts/list">
                    <i class="material-icons">list</i>
                    <p>Договоры и контракты</p>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/purchases/list">
                    <i class="material-icons">shopping_cart</i>
                    <p>Закупки</p>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/articles/list">
                    <i class="material-icons">group_work</i>
                    <p>Товары</p>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/clients/list">
                    <i class="material-icons">supervisor_account</i>
                    <p>Клиенты</p>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/bills/list">
                    <i class="material-icons">credit_card</i>
                    <p>Платежи</p>
                </a>
            </li>
        </ul>
    </ul>
</div>

<div class="main-panel">
    <!-- End Navbar -->
    <div class="content">
        <div id="app"></div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </div>
</div>

@include('footer')

