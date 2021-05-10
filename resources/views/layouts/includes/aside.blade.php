<!-- Side Overlay-->
            <aside id="side-overlay" class="font-size-sm">
                <!-- Side Header -->
                <div class="content-header border-bottom">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32"  src="{{ asset('assets/media/avatars/avatar10.jpg')}}" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="link-fx text-dark font-w600" href="javascript:void(0)">Adam McCoy</a>
                    </div>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="ml-auto btn btn-sm btn-dual" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
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
                    <a class="font-w600 text-dual" href="/">
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
                            <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="si si-drop"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                                <!-- Color Themes -->
                                <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="default" href="#">
                                    <span>Default</span>
                                    <i class="fa fa-circle text-default"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset ('assets/css/themes/amethyst.min.css') }}" href="#">
                                    <span>Amethyst</span>
                                    <i class="fa fa-circle text-amethyst"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset ('assets/css/themes/city.min.css') }}" href="#">
                                    <span>City</span>
                                    <i class="fa fa-circle text-city"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset ('assets/css/themes/flat.min.css') }}" href="#">
                                    <span>Flat</span>
                                    <i class="fa fa-circle text-flat"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset ('assets/css/themes/modern.min.css') }}" href="#">
                                    <span>Modern</span>
                                    <i class="fa fa-circle text-modern"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset ('assets/css/themes/smooth.min.css') }}" href="#">
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
                        <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
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
                                <a class="nav-main-link active" href="/admin/users">
                                    <i class="nav-main-link-icon si si-speedometer"></i>
                                    <span class="nav-main-link-name">Tableau de bord</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Gestion des utilisateurs</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link " href="/admin/managers">
                                    <i class="nav-main-link-icon si si-list"></i>
                                    <span class="nav-main-link-name">Listes des managers</span>
                                </a>
                            </li>
                            <li class="nav-main-item ">
                                <a class="nav-main-link " href="/admin/clients">
                                    <i class="nav-main-link-icon si si-list"></i>
                                    <span class="nav-main-link-name">Listes des clients</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Gestion compte</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="/admin/users/create">
                                    <span class="nav-main-link-name">Ajouter</span>
                                </a>
                            </li>
                        @elseif(Sentinel::check() && Sentinel::getUser()->inRole('manager'))
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="/manager/dashboard">
                                    <i class="nav-main-link-icon si si-speedometer"></i>
                                    <span class="nav-main-link-name">Tableau de bord</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Gestion des Voitures</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="/manager/voitures">
                                    <i class="nav-main-link-icon si si-list"></i>
                                    <span class="nav-main-link-name">Voitures</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="/manager/reservations">
                                    <i class="nav-main-link-icon si si-speedometer"></i>
                                    <span class="nav-main-link-name">Reservations</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link active" data-toggle="modal" data-target="#modal-block-fadein" data-backdrop="static" data-keyboard="false" href="#">
                                    <i class="nav-main-link-icon si si-pencil"></i>
                                    <span class="nav-main-link-name">Ajout Voitures</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="#">
                                    <i class="nav-main-link-icon si si-energy"></i>
                                    <span class="nav-main-link-name">Statistiques</span>
                                </a>
                            </li>
                        @else
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="/client/dashboard">
                                <i class="nav-main-link-icon si si-speedometer"></i>
                                <span class="nav-main-link-name">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="/client/voitures">
                                <i class="nav-main-link-icon si si-note"></i>
                                <span class="nav-main-link-name">Reservations</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="/client/bookings">
                                <i class="nav-main-link-icon si si-layers"></i>
                                <span class="nav-main-link-name">Mes reservations</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="/account/settings">
                                <i class="nav-main-link-icon si si-user"></i>
                                <span class="nav-main-link-name">Mon compte</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
<!-- END Sidebar -->
