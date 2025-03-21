<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout"
                data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Toggle Mini Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout"
                data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!-- END Toggle Mini Sidebar -->

            <!-- Apps Modal -->
            <!-- Opens the Apps modal found at the bottom of the page, after footer’s markup -->
            <button type="button" class="btn btn-sm btn-dual mr-2" data-toggle="modal" data-target="#one-modal-apps">
                <i class="si si-grid"></i>
            </button>
            <!-- END Apps Modal -->

            <!-- Open Search Section (visible on smaller screens) -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-dual d-sm-none" data-toggle="layout"
                data-action="header_search_on">
                <i class="si si-magnifier"></i>
            </button>
            <!-- END Open Search Section -->

            <!-- Search Form (visible on larger screens) -->
            <form class="d-none d-sm-inline-block" action="#" method="">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control form-control-alt" placeholder="Search.."
                        id="page-header-search-input2" name="page-header-search-input2">
                    <div class="input-group-append">
                        <span class="input-group-text bg-body border-0">
                            <i class="si si-magnifier"></i>
                        </span>
                    </div>
                </div>
            </form>
            <!-- END Search Form -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img class="rounded" src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="Header Avatar"
                        style="width: 18px;">
                    <span class="d-none d-sm-inline-block ml-1"> {{ Sentinel::getUser()->first_name}}</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-primary">
                        <img class="img-avatar img-avatar48 img-avatar-thumb"
                            src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="">
                    </div>
                    <div class="p-2">
                        <h5 class="dropdown-header text-uppercase">Options Utilisateur</h5>
                        <a class="dropdown-item d-flex align-items-center justify-content-between disabled"
                            href="javascript:void(0)">
                            <span>Inbox</span>
                            <span>
                                <span class="badge badge-pill badge-primary">{{-- 3 --}}</span>
                                <i class="si si-envelope-open ml-1"></i>
                            </span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="/account/profil">
                            <span>Profile</span>
                            <span>
                                <i class="si si-user ml-1"></i>
                            </span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="/account/settings">
                            <span>Mon Compte</span>
                            <i class="si si-settings"></i>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <h5 class="dropdown-header text-uppercase">Actions</h5>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="/account/lock">
                            <span>Vérouiller écran</span>
                            <i class="si si-lock ml-1"></i>
                        </a>
                        <form action="/logout" method="GET" id="logout_form">
                            @csrf
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)" onclick="document.getElementById('logout_form').submit()">
                                <span>Déconnexion</span>
                                <i class="si si-logout ml-1"></i>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->

            <!-- Notifications Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="si si-bell"></i>
                    <!-- Nombre de Notifications  -->
                    <span
                        class="badge badge-primary badge-pill">{{Sentinel::getUser()->unreadNotifications->count()}}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-2 bg-primary text-center">
                        <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                    </div>
                    <ul class="nav-items mb-0">
                        @forelse ( Sentinel::getUser()->unreadNotifications as $notifications)
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-plus-circle text-info"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">Nouvelle reservation,N*{{ $notifications->data['reservation']
                                        }} </br> de {{ $notifications->data['name'] }}</div>
                                    <small class="text-muted">{{ $notifications->created_at->diffForHumans() }}</small>
                                </div>
                            </a>
                        </li>
                        @empty
                        <div class="media-body pr-2">
                            <div class="font-w600">Pas de nouvelles notifications</div>
                        </div>
                        @endforelse
                    </ul>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-light btn-block text-center" href="/activities">
                            <i class="fa fa-fw fa-arrow-down mr-1"></i> Charger plus..
                        </a>
                    </div>
                </div>
            </div>
            <!-- END Notifications Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-white">
        <div class="content-header">
            <form class="w-100" action="#" method="">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-danger" data-toggle="layout"
                            data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.."
                        id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->