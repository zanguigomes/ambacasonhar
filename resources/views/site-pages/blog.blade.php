@extends('layouts.master')
@section('title', 'Blog')
@section('content')

    <!-- Single Page Block -->
    <section class="single-post">

        <!--- Single Post header-->
        <header class="single-post-header blog-header container">
            <div class="row">
                <div class="col-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Início</a></li>
                            <li class="breadcrumb-item" aria-current="page">Artigos e Notícias</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h1>Artigos e Notícias</h1>
                        </div>
                        <div class="col-12 col-md-4">
                        </div>

                    </div>

                </div>
            </div>
            <hr>
        </header>
        <!-- Separador -->
        <div class="block-divider text-uppercase">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-12">
                        <h5><strong>Destaque</strong></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- News Block 1 -->
        <section class="block-posts blog-page">
            <div class="container" data-aos="fade-up">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-6">
                        {{-- Entrada principal --}}
                        <a href="{{ route('site.pages.post', $blogHeading->slug) }}" class="">
                            <figure class="lead">
                                <div class="cover-radius"></div>
                                <img src="{{ url("storage/{$blogHeading->thumb}") }}" class="radius5"
                                    alt="{{ $blogHeading->title }}">
                                <figcaption>
                                    <h2>{{ $blogHeading->title }}</h2>
                                    {!! \Illuminate\Support\Str::limit($blogHeading->head_line, 130, $end = '...') !!}
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    {{-- Entrada secundaria --}}
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{ route('site.pages.post', $blogSecondaryEntry->slug) }}" class="link-news">
                            <div class="card">
                                <div class="img-box">
                                    <img src="{{ url("storage/{$blogSecondaryEntry->thumb}") }}" class="radius5"
                                        alt="{{ $blogSecondaryEntry->title }}">
                                </div>
                                <div class="card-body">
                                    <h2 class="card-text">{{ $blogSecondaryEntry->title }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Entrada terciária --}}
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{ route('site.pages.post', $blogThirdEntry->slug) }}" class="link-news">
                            <div class="card">
                                <div class="img-box">
                                    <img src="{{ url("storage/{$blogThirdEntry->thumb}") }}" class="radius5"
                                        alt="{{ $blogThirdEntry->title }}">
                                </div>
                                <div class="card-body">
                                    <h2 class="card-text">{{ $blogThirdEntry->title }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bloco Notícias -->
        <section class="block-posts home-block-posts">
            <div class="container" data-aos="fade-up">
                <div class="row blog-link">
                    <div class="col-6">
                        <h2>Outras notícias</h2>
                        <h5>Encontradas <strong>{{ count($blog) }}</strong> outras Notícias</h5>
                    </div>
                </div>

                <div class="row">
                    @foreach ($blog as $list)
                        <div class="col-12 col-md-12 col-lg-6 blog-list">

                            <a href="{{ route('site.pages.post', $list->slug) }}" class="link-news">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="img-box">
                                                <img src="{{ url("storage/{$list->thumb}") }}" class="img-fluid rounded"
                                                    alt="{{ $list->title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $list->title }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="page-navigation">

                            {{ $blog->onEachSide(1)->links('pagination::bootstrap-5') }}

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </section>
@endsection
