@include('header')

<div class="sidebar" data-color="azure" data-background-color="white">
    <ul class="sidebar-wrapper ps-container ps-theme-default">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                @if (isset($user))
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#">{{ $user->username }}</a>
                </div>
                @endif
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                @if (isset($user))
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
            <?php foreach ([
                'invoices' => [
                    'icon' => 'description',
                    'title' => 'Фактуры',
                ],
                'contracts' => [
                    'icon' => 'list',
                    'title' => 'Договоры и контракты',
                ],
                'purchases' => [
                    'icon' => 'shopping_cart',
                    'title' => 'Закупки',
                ],
                'articles' => [
                    'icon' => 'group_work',
                    'title' => 'Товары',
                ],
                'clients' => [
                    'icon' => 'supervisor_account',
                    'title' => 'Клиенты',
                ],
                'bills' => [
                    'icon' => 'credit_card',
                    'title' => 'Платежи',
                ],
            ] as $action => $options) { ?>
                <li class="nav-item <?=$pageAction===$action ? 'active' : ''?>">
                    <a class="nav-link" href="/<?=$action?>/list">
                        <i class="material-icons"><?=$options['icon']?></i>
                        <p><?=$options['title']?></p>
                    </a>
                </li>
            <?php }?>
        </ul>
    </ul>
</div>

<div class="main-panel">
    <div class="content">
        <div id="app"></div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </div>
</div>

@include('footer')
