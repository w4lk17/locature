@extends('layouts.master')

@section('content')
    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url({{ URL::asset('assets/media/photos/photo3@2x.jpg') }});">
                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Tableau de bord</h1>
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome  {{ Sentinel::getUser()->last_name}}</h2>
                                </div>
                                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                                    <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                                        <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="/admin/users/create">
                                            <i class="fa fa-plus mr-1"></i> Creer manager
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- END Hero -->
    <!-- Page Content -->
                <div class="content">
                     <!-- Stats -->
                    <div class="row">
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Visitors</div>
                                    <div class="font-size-h2 font-w400 text-dark">120,580</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Sales</div>
                                    <div class="font-size-h2 font-w400 text-dark">150</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Earnings</div>
                                    <div class="font-size-h2 font-w400 text-dark">$3,200</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Avg Sale</div>
                                    <div class="font-size-h2 font-w400 text-dark">$21</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->

                    <!-- Dashboard Charts -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="block block-rounded block-mode-loading-oneui">
                                <div class="block-header">
                                    <h3 class="block-title">Earnings in $</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content p-0 bg-body-light text-center">
                                    <!-- Chart.js is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js) -->
                                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                    <div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-earnings"></canvas></div>
                                </div>
                                <div class="block-content">
                                    {{-- <div class="row items-push text-center py-3">
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-wallet fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">$148,000</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-angle-double-up fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+9% Earnings</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-ticket-alt fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+20% Tickets</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-users fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+46% Clients</div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="block block-rounded block-mode-loading-oneui">
                                <div class="block-header">
                                    <h3 class="block-title">Sales</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content p-0 bg-body-light text-center">
                                    <!-- Chart.js is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js) -->
                                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                    <div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-sales"></canvas></div>
                                </div>
                                <div class="block-content">
                                    {{-- <div class="row items-push text-center py-3">
                                        <div class="col-6 col-xl-3">
                                            <i class="fab fa-wordpress fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+20% Themes</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-font fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+25% Fonts</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-archive fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">-10% Icons</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-paint-brush fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+8% Graphics</div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Dashboard Charts -->

                    <!-- Customers and Latest Orders -->
                    <div class="row">
                        <!-- Latest Customers -->
                        <div class="col-lg-12">
                            <div class="block block-mode-loading-oneui">
                                <div class="block-header border-bottom">
                                    <h3 class="block-title">Listes des utilisateurs</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                        <thead class="thead-dark">
                                            <tr class="text-uppercase">
                                                <th class="font-w700" style="width: 80px;">ID</th>
                                                <th class="font-w700">Name</th>
                                                <th class="d-none d-sm-table-cell font-w700 " style="width: 30%;">Email</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Access</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Registered</th>
                                                <th class="font-w700 text-center" style="width: 10%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <span class="font-w600">{{ $user->id }}</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="#">{{ $user->last_name }} {{ $user->first_name }}</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell ">
                                                     {{ $user->email }}
                                                </td>
                                                @foreach ($user->roles as $role)
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <span class="link-fx font-w600 badge badge-danger">{{ $role->name }}</span>
                                                </td>
                                                @endforeach
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a class="link-fx font-w600" href="#">{{ $user->created_at }}</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Edit">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>  
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Latest Customers -->

                       
                    </div>
                    <!-- END Customers and Latest Orders -->
                    
                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block  block-mode-loading-oneui">
                        <div class="block-header">
                            <h3 class="block-title">Listes des utilisateurs</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 80px;">ID</th>
                                        <th>Name</th>
                                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                                        <th style="width: 15%;">Registered</th>
                                        <th class="d-none d-md-table-cell text-center" style="width: 10px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center font-size-sm">{{ $user->id }}</td>
                                        <td class="font-w600 font-size-sm">
                                            <a href="#">{{ $user->last_name }} {{ $user->first_name }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell font-size-sm">
                                            {{ $user->email }}
                                        </td>
                                        @foreach ($user->roles as $role)
                                            <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-success">{{ $role->name }}</span>
                                        </td>
                                        @endforeach
                                        
                                        <td>
                                            <em class="text-muted font-size-sm">{{ $user->created_at }}</em>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Detail">
                                                    <a href="/admin/users/{{ $user->id }}"><i class="fa fa-fw fa-eye"></i></a>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Modifier">
                                                    <a href="/admin/users/{{ $user->id }}/edit"><i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                            </div>
                                        </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table with Export Buttons -->
                </div>
    <!-- END Page Content -->
    
@endsection