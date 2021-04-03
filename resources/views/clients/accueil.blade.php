@extends('layouts.master')
@section('content')
    <div class="content content-boxed">
        <div class="row">
            <!-- Loop through hotels returned from controller -->
            @foreach ($voitures as $voiture)
            <div class="col-sm-4">
                <div class="card mb-3">

                    <div class="card-body">
                        <div class="mr-3 ">
                            <img src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" alt=" wezeee">
                        </div>
                        <h5 class="card-title">{{ $voiture->marque }}</h5>
                        <small class="text-muted">{{ $voiture->moteur }}</small>
                        <p class="card-text">{{ $voiture->modele }}</p>
                        <a href="/bookings/create/{{ $voiture->id }}" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    <!-- Story -->
                                <div class="block">
                                    <div class="block-content">
                                        <div class="row items-push">
                                            <div class="col-md-4 col-lg-5">
                                                <a href="be_pages_blog_story.html">
                                                    <img class="img-fluid" src="assets/media/photos/photo22.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="col-md-8 col-lg-7">
                                                <h4 class="h3 mb-1">
                                                    <a class="text-primary-dark" href="be_pages_blog_story.html">Follow Your Dreams</a>
                                                </h4>
                                                <div class="font-size-sm mb-3">
                                                    <a href="be_pages_generic_profile.html">Susan Day</a> on July 13, 2019 · <em class="text-muted">15 min</em>
                                                </div>
                                                <p class="font-size-sm">
                                                    mperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh..
                                                </p>
                                                <a class="btn btn-sm btn-light" href="be_pages_blog_story.html">Continue Reading..</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Story -->
    </div>
@endsection
