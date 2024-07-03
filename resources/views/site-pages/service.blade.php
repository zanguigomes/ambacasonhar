@extends('layouts.master')
@section('title', $single->title)
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

                                    <li class="breadcrumb-item"><a href="{{ route('site.pages.projects') }}">Projectos</a></li>

                                    <li class="breadcrumb-item " aria-current="page">{{ $single->title }}</li>
                            </ol>
                        </nav>

                        <h1>{{ $single->title }}</h1>
                        <hr>
                    </header>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">

                    <aside class="sticky-top">

                        <div class="single-post-sidebar entities-sidebar">

                            <div class="manager-avatar">
                                <header class="last-posts-list">

                                @if($single->avatar)<img src="{{ url("storage/{$single->avatar}") }}" class="radius100 float-start"
                                    alt="{{ $single->manager }}">@endif
                                @if($single->type == 'Administração')<span>Administrador</span>
                                @elseif($single->type == 'Delegação')<span>Delegado</span>
                                @elseif($single->type == 'Secretaria')<span>Secretário</span> @endif <br>
                                    <h3>{{ $single->manager }}</h3>
                                </header>

                                <div class="body">
                                    {!! $single->head_line !!}
                                    <hr>
                                    <ul>
                                        <li>
                                            <span class="icon"><i class="fa-solid fa-phone-volume"></i></span> <span class="info">(244) {{ $single->phone }}</span>
                                        </li>
                                        <li>
                                            <span class="icon"><i class="fa-regular fa-envelope"></i></span> <span class="info">{{ $single->email }}</span>
                                        </li>
                                        <li>
                                            <span class="icon"><i class="fa-regular fa-clock"></i></span> <span class="info">{{ $single->time_table }}</span>
                                        </li>
                                        <li>
                                            <span class="icon"><i class="fa-solid fa-location-dot"></i></span> <span class="info">{{ $single->location }}</span>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </aside>
                </aside>
                </div>
                <div class="col-12 col-md-8">
                    <div class="single-post-">

                        <!--- Single Post header-->
                        <div class="single-post-content radius10">
                           {{--  <div class="lead">
                               
                            </div> --}}
                            <div class="main-content"><br><br>
                                <div class="header-content">
                                    {!! $single->content !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            {{-- <div class="row">
                <div class="col-12"><hr></div>
            </div>--}}
        </div>
    </section>
    {{-- <section class="section-padding next-prev-section">
        <div class="container">
            <div class="row">

                @if($prevPost)

                <div class="col-12 col-md-6 news-block ">
                    <h6><a href="{{ route('site.pages.post', $prevPost->slug) }}" class="news-block-title-link"><i class="fa-solid fa-arrow-left"></i> Anterior</a></h6>
                    <div class="news-block-info">

                        <div class="news-block-title mb-2">
                            <h4><a href="{{ route('site.pages.post', $prevPost->slug) }}" class="news-block-title-link">{{ $prevPost->title }}</a></h4>
                        </div>

                        <div class="news-block-body">
                            <p>{{ $prevPost->head_line }}</p>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-12 col-md-6 news-block ">
                <div class="news-block-info">
                    <div class="news-block-title mb-2"></div>
                    <div class="news-block-body"></div>
                </div>
            </div>
            @endif
            @if($nextPost)
                <div class="col-12 col-md-6 news-block text-right">
                    <h6 class="text-right"><a href="{{ route('site.pages.post', $nextPost->slug) }}" class="news-block-title-link">Próximo <i class="fa-solid fa-arrow-right"></i></a></h6>
                    <div class="news-block-info">

                        <div class="news-block-title mb-2">
                            <h4><a href="{{ route('site.pages.post', $nextPost->slug) }}" class="news-block-title-link">{{ $nextPost->title }}</a></h4>
                        </div>

                        <div class="news-block-body">
                            <p>{{ $nextPost->head_line }}</p>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section> --}}

@endsection
