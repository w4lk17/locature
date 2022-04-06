@extends('layouts.user_master')

@section('content')
                <!-- Hero -->
                <div class="bg-image" style="background-image: url('assets/media/photos/photo36@2x.jpg');">
                    <div class="hero bg-black-75 overflow-hidden">
                        <div class="hero-inner">
                            <div class="content content-full text-center">
                                <div class="mb-5 invisible" data-toggle="appear" data-class="animated fadeInDown">
                                    <i class="fa fa-circle-notch fa-3x text-primary"></i>
                                </div>
                                <h1 class="display-4 font-w600 mb-3 text-white invisible" data-toggle="appear" data-class="animated fadeInDown">
                                    LOCATURE <hr> <span class="font-w300"></span>
                                </h1>
                                <h2 class="h3 font-w400 text-white-50 mb-5 invisible" data-toggle="appear" data-class="animated fadeInDown" data-timeout="300">
                                    Votre confort notre soucis
                                </h2>
                                <span class="m-2 d-inline-block invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="600">
                                    <a class="btn btn-success px-4 py-2" data-toggle="click-ripple" href="#">
                                        <i class="fa fa-fw fa-shopping-cart mr-1"></i> Purchase
                                    </a>
                                </span>
                                <span class="m-2 d-inline-block invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="600">
                                    <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="/login">
                                        <i class="fa fa-fw fa-rocket mr-1"></i> Connexion
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="hero-meta">
                            <div class="js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="450">
                                <span class="d-inline-block animated slideInDown infinite">
                                    <i class="fa fa-angle-down text-white-50 fa-2x"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Versions -->
                <div id="one-versions" class="bg-light">
                    <div class="content content-full">
                        <div class="py-5 text-center">
                            <h2 class="h1 mb-2">
                                OneUI 4.3 Versions
                            </h2>
                            <h3 class="font-w400 text-muted mb-5">
                                Inside the package you will find an HTML version, a PHP version and a Laravel Starter Kit.
                            </h3>
                            <div class="row">
                                <div class="col-lg-4 invisible" data-toggle="appear">
                                    <!-- HTML Version -->
                                    <div class="block block-rounded block-fx-pop">
                                        <div class="block-content block-content-full">
                                            <div class="my-4">
                                                <i class="fa fa-5x fa-car text-city"></i>
                                            </div>
                                            <h4 class="mb-2">Des voitures propres. Des réservations flexibles.</h4>
                                            <p class="font-size-sm text-muted text-left">
                                                Nous travaillons avec nos partenaires pour assurer votre sécurité au volant.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- END HTML Version -->
                                </div>
                                <div class="col-lg-4 invisible" data-toggle="appear">
                                    <!-- PHP Version -->
                                    <div class="block block-rounded block-fx-pop">
                                        <div class="block-content block-content-full">
                                            <div class="my-4">
                                                <i class="far fa-5x fa-calendar-alt text-amethyst"></i>
                                            </div>
                                            <h4 class="mb-2">Locations flexibles</h4>
                                            <p class="font-size-sm text-muted text-left">
                                                Vous pouvez annuler ou modifier la plupart des réservations gratuitement jusqu’à 48 heures avant la prise en charge du véhicule.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- END PHP Version -->
                                </div>
                                <div class="col-lg-4 invisible" data-toggle="appear">
                                    <!-- Laravel Starter Kit -->
                                    <div class="block block-rounded block-fx-pop">
                                        <div class="block-content block-content-full">
                                            <div class="my-4">
                                                <i class="fab fa-5x fa-laravel text-flat"></i>
                                            </div>
                                            <h4 class="mb-2">Laravel Starter Kit</h4>
                                            <p class="font-size-sm text-muted text-left">
                                                It features a clean Laravel installation with all OneUI assets ready to work with Laravel Mix and a few example pages to get you started.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- END Laravel Starter Kit -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Versions -->

                <!-- Remastered -->
                <div id="one-remastered" class="bg-white">
                    <div class="content content-full">
                        <div class="py-5 text-center">
                            <h2 class="h1 mb-2">
                                Nouvelles Arrivées
                            </h2>
                            <h3 class="font-w400 text-muted mb-5">
                                OneUI 4.3 was carefully crafted for your new projects using the latest tech.
                            </h3>
                            <div class="js-slider text-center" data-autoplay="true" data-dots="true" data-arrows="true" data-slides-to-show="4">
                                @foreach ($voitures as $voiture)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="block">
                                        <div class="options-container">
                                            <img class="img-fluid options-item" src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}">
                                            <div class="options-overlay bg-black-75">
                                                <div class="options-overlay-content">
                                                    <a class="btn btn-sm btn-light" href="/client/bookings/create/{{ $voiture->id }}"">
                                                        Voir
                                                    </a>
                                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                                        <i class="fa fa-plus text-success mr-1"></i> Add to cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <div class="mb-2">
                                                <div class="h4 font-w600 text-success float-right ml-1">{{ $voiture->prix }} CFA</div>
                                                <a class="h4" href="">{{ $voiture->marque }} {{ $voiture->modele }} </a>
                                            </div>
                                            <p class="font-size-sm text-muted">Beautifully crafted icon set</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-right">
                                <a class="font-size-sm font-w600 link-fx" href="#">View More New Arrivals..</a>
                            </div>
                            <!-- END New Arrivals -->
                        </div>
                    </div>
                </div>
                <!-- END Remastered -->

                <!-- Reviews -->
                <div id="one-reviews" class="bg-image" style="background-image: url('assets/media/photos/photo36@2x.jpg');">
                    <div class="bg-black-75">
                        <div class="content content-full">
                            <div class="py-5">
                                <h2 class="h1 text-white mb-2 text-center">
                                    Avis des clients
                                </h2>
                                <h3 class="font-w400 text-white-50 mb-5 text-center">
                                    Découvrez ce que nos clients ont écrit sur locature, <br> la  meilleure agence de reservation de voiture en ligne.
                                </h3>
                                <div class="row items-push-2x">
                                    <div class="col-md-4 invisible" data-toggle="appear">
                                        <div class="text-warning my-3">
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                        </div>
                                        <div class="font-size-h5 text-white-50 mb-2">A combination of flexibility and ease of uses. The design is beautiful, but I really value the ease in which I was able to integrate this into my development workflow and platform.</div>
                                        <div class="font-size-h6 text-white-75">For Other by <em>appeality</em></div>
                                    </div>
                                    <div class="col-md-4 invisible" data-toggle="appear" data-timeout="150">
                                        <div class="text-warning my-3">
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                        </div>
                                        <div class="font-size-h5 text-white-50 mb-2">While reading the docs i can feel that you literally gave your heart to create this project. It is a high quality piece of work, thanks for sharing it!</div>
                                        <div class="font-size-h6 text-white-75">For Code Quality by <em>msagi</em></div>
                                    </div>
                                    <div class="col-md-4 invisible" data-toggle="appear" data-timeout="300">
                                        <div class="text-warning my-3">
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                        </div>
                                        <div class="font-size-h5 text-white-50 mb-2">This is my first purchase on Themeforest and I am delighted. Everything from the design to the code is beautifully crafted and the customer support is great also. Congratulations pixelcave.</div>
                                        <div class="font-size-h6 text-white-75">For Customizability by <em>CaravelaThemes</em></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Reviews -->

                <!-- Call To Action -->
                <div id="one-call-to-action" class="bg-light">
                    <div class="content content-full">
                        <div class="py-3 py-md-6 text-center">
                            <h2 class="hq mb-2 invisible" data-toggle="appear" data-class="animated fadeInDown">
                                Souscrivez à notre newsletter pour des promotions et des offres exclusives !
                            </h2>
                            <h3 class="font-w400 text-muted mb-4 invisible" data-toggle="appear" data-class="animated fadeInDown" data-timeout="300">
                                Ne vous inquiétez pas, nous détestons le spam.
                            </h3>
                            <form class="push" action="#" method="POST" onsubmit="return false;">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10 col-xl-6">
                                        <div class="input-group mb-2">
                                            <input type="email" class="form-control border-0" placeholder="Addresse email..">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Souscrire</button>
                                            </div>
                                        </div>
                                        <!--<div class="font-size-sm text-muted-50">
                                            dontt worry, we hate spam.
                                        </div>-->
                                    </div>
                                </div>
                            </form>
                            <!--<span class="m-2 d-inline-block invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="600">
                                <a class="btn btn-success px-4 py-2" data-toggle="click-ripple" href="https://1.envato.market/xWy">
                                    <i class="fa fa-fw fa-shopping-cart mr-1"></i> Purchase
                                </a>
                            </span>
                            <span class="m-2 d-inline-block invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="600">
                                <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="/login">
                                    <i class="fa fa-fw fa-rocket mr-1"></i> Connexion
                                </a>
                            </span>-->
                        </div>
                    </div>
                </div>
                <!-- END Call To Action -->
                <!-- Footer -->
                <footer id="page-footer" class="bg-white">
                    <div class="content py-5">
                        <div class="row font-size-sm">
                            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                                by <a class="font-w600" href="#" target="_blank">3kTechnologies</a>
                            </div>
                            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                                <a class="font-w600" href="#" target="_blank">LOCATURE 1.0</a> &copy; <span data-toggle="year-copy"></span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- END Footer -->
@endsection

