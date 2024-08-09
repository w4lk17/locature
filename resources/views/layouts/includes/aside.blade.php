<!-- Side Overlay-->
<aside id="side-overlay" class="font-size-sm">
    <!-- Side Header -->
    <div class="content-header border-bottom">
        <!-- User Avatar -->
        <a class="img-link mr-1" href="javascript:void(0)">
            <img class="img-avatar img-avatar32" src="{{ asset('assets/media/avatars/avatar10.jpg')}}" alt="">
        </a>
        <!-- END User Avatar -->

        <!-- User Info -->
        <div class="ml-2">
            <a class="link-fx text-dark font-w600" href="javascript:void(0)">Adam McCoy</a>
        </div>
        <!-- END User Info -->

        <!-- Close Side Overlay -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <a class="ml-auto btn btn-sm btn-dual" href="javascript:void(0)" data-toggle="layout"
            data-action="side_overlay_close">
            <i class="fa fa-fw fa-times text-danger"></i>
        </a>
        <!-- END Close Side Overlay -->
    </div>
    <!-- END Side Header -->
</aside>
<!-- END Side Overlay -->

<!-- Sidebar -->
<!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="/welcome">
            <i class="fa fa-circle-notch text-primary"></i>
            <span class="smini-hide">
                <span class="font-w700 font-size-h5">LOCATURE</span>
            </span>
        </a>
        <!-- END Logo -->

        <!-- Options -->
        <div>
            <!-- Color Variations -->
            <div class="dropdown d-inline-block ml-3">
                <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="si si-drop"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0"
                    aria-labelledby="sidebar-themes-dropdown">
                    <!-- Color Themes -->
                    <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme"
                        data-theme="default" href="#">
                        <span>Default</span>
                        <i class="fa fa-circle text-default"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme"
                        data-theme="{{ asset ('assets/css/themes/amethyst.min.css') }}" href="#">
                        <span>Amethyst</span>
                        <i class="fa fa-circle text-amethyst"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme"
                        data-theme="{{ asset ('assets/css/themes/city.min.css') }}" href="#">
                        <span>City</span>
                        <i class="fa fa-circle text-city"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme"
                        data-theme="{{ asset ('assets/css/themes/flat.min.css') }}" href="#">
                        <span>Flat</span>
                        <i class="fa fa-circle text-flat"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme"
                        data-theme="{{ asset ('assets/css/themes/modern.min.css') }}" href="#">
                        <span>Modern</span>
                        <i class="fa fa-circle text-modern"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme"
                        data-theme="{{ asset ('assets/css/themes/smooth.min.css') }}" href="#">
                        <span>Smooth</span>
                        <i class="fa fa-circle text-smooth"></i>
                    </a>
                    <!-- END Color Themes -->

                    <div class="dropdown-divider"></div>

                    <!-- Sidebar Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light" href="#">
                        <span>Sidebar Light</span>
                    </a>
                    <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                        <span>Sidebar Dark</span>
                    </a>
                    <!-- Sidebar Styles -->

                    <div class="dropdown-divider"></div>

                    <!-- Header Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item" data-toggle="layout" data-action="header_style_light" href="#">
                        <span>Header Light</span>
                    </a>
                    <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark" href="#">
                        <span>Header Dark</span>
                    </a>
                    <!-- Header Styles -->
                </div>
            </div>
            <!-- END Themes -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            @if (Sentinel::check() && Sentinel::getUser()->inRole('admin'))
            <li class="nav-main-item ">
                <a class="nav-main-link {{ set_active('admin/dashboard') }}" href="/admin/dashboard">
                    <i class="nav-main-link-icon si si-speedometer"></i>
                    <span class="nav-main-link-name">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                    aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">Utilisateurs</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ set_active('admin/*/#') }}" data-toggle="modal"
                            data-target="#modal-block-fadeinU" data-backdrop="static" data-keyboard="false" href="#">
                            <span class="nav-main-link-name">Nouvel Utilisateur</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ set_active('admin/users') }}" href="/admin/users">
                            <span class="nav-main-link-name">Utilisateurs</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                    aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-car"></i>
                    <span class="nav-main-link-name">Voitures</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ set_active('') }}" data-toggle="modal"
                            data-target="#modal-block-fadeinA" data-backdrop="static" data-keyboard="false" href="#">
                            <span class="nav-main-link-name">Ajouter voiture</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ set_active('admin/cars') }}" href="/admin/cars">
                            <span class="nav-main-link-name">Voitures</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item ">
                <a class="nav-main-link {{ set_active('admin/reservations') }}" href="/admin/reservations">
                    <i class="nav-main-link-icon si si-list"></i>
                    <span class="nav-main-link-name">Listes des reservations</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('admin/managers') }}" href="/admin/managers">
                    <i class="nav-main-link-icon si si-list"></i>
                    <span class="nav-main-link-name">Listes des managers</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('admin/clients') }}" href="/admin/clients">
                    <i class="nav-main-link-icon si si-list"></i>
                    <span class="nav-main-link-name">Listes des clients</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('admin/statistic') }}" href="/admin/statistic">
                    <i class="nav-main-link-icon fa fa-chart-bar"></i>
                    <span class="nav-main-link-name">Statistique</span>
                </a>
            </li>
            {{-- <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('') }}" data-toggle="modal" data-target="#modal-block-fadeinU"
                    data-backdrop="static" data-keyboard="false" href="#">
                    <i class="nav-main-link-icon si si-pencil"></i>
                    <span class="nav-main-link-name">Ajouter Utilisateur</span>
                </a>
            </li> --}}
            @elseif(Sentinel::check() && Sentinel::getUser()->inRole('manager'))
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('manager/dashboard') }}" href="/manager/dashboard">
                    <i class="nav-main-link-icon si si-speedometer"></i>
                    <span class="nav-main-link-name">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-main-item {{ set_active(['manager/reservations/create','manager/reservations'])}}">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                    aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-calendar"></i>
                    <span class="nav-main-link-name">Reservations</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ set_active('manager/reservations/create') }}"
                            href="/manager/reservations/create">
                            <span class="nav-main-link-name"> Nouvelle reservation</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ set_active('manager/reservations') }}" href="/manager/reservations">
                            <span class="nav-main-link-name">Listes des reservations</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('manager/voitures') }}" href="/manager/voitures">
                    <i class="nav-main-link-icon si si-list"></i>
                    <span class="nav-main-link-name">Voitures</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('') }}" data-toggle="modal" data-target="#modal-block-fadein"
                    data-backdrop="static" data-keyboard="false" href="#">
                    <i class="nav-main-link-icon si si-pencil"></i>
                    <span class="nav-main-link-name">Ajout Voitures</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                    aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-file-invoice"></i>
                    <span class="nav-main-link-name">Factures</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ set_active('manager/invoices/create') }}"
                            href="/manager/invoices/create">
                            <span class="nav-main-link-name"> Nouvelle facture</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ set_active('manager/invoices') }}" href="/manager/invoices">
                            <span class="nav-main-link-name">Listes des factures</span>
                        </a>
                    </li>
                </ul>
            </li>
            @else
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('client/dashboard') }}" href="/client/dashboard">
                    <i class="nav-main-link-icon si si-speedometer"></i>
                    <span class="nav-main-link-name">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('client/voitures') }}" href="/client/voitures">
                    <i class="nav-main-link-icon si si-note"></i>
                    <span class="nav-main-link-name">Reservations</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('client/bookings') }}" href="/client/bookings">
                    <i class="nav-main-link-icon si si-layers"></i>
                    <span class="nav-main-link-name">Mes reservations</span>
                </a>
            </li>
            @endif
            <li class="nav-main-item">
                <a class="nav-main-link {{ set_active('account/settings') }}" href="/account/settings">
                    <i class="nav-main-link-icon si si-user"></i>
                    <span class="nav-main-link-name">Mon compte</span>
                </a>
            </li>
            <li class="nav-main-item">
                <form action="/logout" method="post" id="logout_form">
                    @csrf
                    <a class="nav-main-link {{ set_active('') }}" href="#"
                        onclick="document.getElementById('logout_form').submit()">
                        <i class="nav-main-link-icon si si-logout"></i>
                        <span class="nav-main-link-name">Deconnexion</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->