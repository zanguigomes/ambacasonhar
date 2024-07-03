@extends('layouts.master')
@section('title', $gallery->title)
@section('content')

    <!-- Single Post Block -->
    <section class="single-post" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--- Single Post header-->
                    <header class="single-post-header">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Início</a></li>
                                <li class="breadcrumb-item " aria-current="page"><a href="{{ route('site.galleries') }}">Banco de Imagens</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $gallery->title }}</li>
                            </ol>
                        </nav>
                        <h1>{{ $gallery->title }}</h1>

                        <div class="post-date-pub-category">
                            <div class="container">
                                <div class="row">

                                    <div class="col-12">
                                        <span class="icon radius100"><i class="fa-regular fa-calendar"></i></span>
                                        <span class="date-pub">
                                        {{-- {{ $single->published_at->locale('PT')->diffForHumans() }} --}}

                                        {{ date('d M Y', strtotime($gallery->created_at)) }}
                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="icon radius100"><i class="fa-regular fa-clock"></i></span>
                                        <span class="date-pub">{{ date('d M Y H:s', strtotime($gallery->updated_at)) }}</span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon radius100"><i class="fa-regular fa-images"></i></span> {{ count($gallery->images) }} fotos
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="badge post-category-badge text-uppercase radius30">
                                            {{ $gallery->category }}</span>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                    </header>
                    <!--- Single Post header-->
                    <div class=" radius10 single-gallery">
                        <div class="lead ">
                            <!-- Lead Content -->
                            {!! $gallery->description !!}
                        </div>
                        <div class="main-content row row-cols-1 row-cols-md-2 g-4"
                            data-masonry='{"percentPosition": true }'>

                            @foreach ($gallery->images as $image)
                                <div class="col-12 col-md-4 " data-aos="fade-up">
                                    <div class="card ">
                                        <a data-fancybox="gallery" data-src="{{ url("storage/{$image}") }}" data-caption="">
                                            <img src="{{ url("storage/{$image}") }}" style="width: 100%" />
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <br><br>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
