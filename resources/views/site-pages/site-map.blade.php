@extends('layouts.master')
@section('title', 'Mapa do Site')
@section('content')

    <!-- Single Page Block -->
    <section class="single-post" data-aos="fade-up">

        <!--- Single Post header-->
        <header class="single-post-header blog-header container">
            <div class="row">
                <div class="col-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Início</a></li>
                            <li class="breadcrumb-item" aria-current="page">Mapa do Site</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-12">
                            <h1>Mapa do Site</h1>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </header>
        <!-- Separador -->
        <div class="block-divider">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-12">


                    </div>
                </div>
            </div>
        </div>

            <section class="quick-access our-land" style="padding-top: 0">
                <div class="container" data-aos="fade-up">
                    <div class="row" data-masonry='{"percentPosition": true }'>


                        @foreach ($pages as $item)
                        <div class="col-6 col-md-6 col-lg-4">
                            <a href="{{ route('site.pages.page', $item->key) }}">
                                <div class="access-box container radius10">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon"><i class="fa-solid fa-file-lines"></i></div>
                                        </div>
                                        <div class="col-10">
                                            <span>{{ $item->type }}</span>
                                            <h3>{{ $item->title }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach ($blog as $item)
                        <div class="col-6 col-md-6 col-lg-4">
                            <a href="{{ route('site.pages.post', $item->slug) }}">
                                <div class="access-box container radius10">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon"><i class="fa-regular fa-newspaper"></i></div>
                                        </div>
                                        <div class="col-10">
                                            <span>{{ $item->type }}</span>
                                            <h3>{{ $item->title }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach´

                        {{-- @foreach ($organisms as $item)
                        <div class="col-12 col-md-12 col-lg-6">
                            <a href="{{ route('site.pages.service', $item->slug) }}">
                                <div class="access-box container radius10">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon"><i class="fa-solid fa-file-lines"></i></div>
                                        </div>
                                        <div class="col-10">
                                            <span>{{ $item->type }}</span>
                                            <h3>{{ $item->title }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach ($projects as $item)
                        <div class="col-12 col-md-12 col-lg-6">
                            <a href="{{ route('site.pages.project', $item->slug) }}">
                                <div class="access-box container radius10">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
                                        </div>
                                        <div class="col-10">
                                            <span>{{ $item->type }}</span>
                                            <h3>{{ $item->title }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach --}}
                    </div>
                </div>
            </section>

    </section>
@endsection

