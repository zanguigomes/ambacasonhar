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

                        <div class="post-date-pub-category">
                            <div class="container">
                                <div class="row">

                                    <div class="col-12">
                                        <span class="icon radius100"><i class="fa-regular fa-calendar"></i></span>

                                        <span class="date-pub">

                                            {{-- {{ $single->published_at->locale('PT')->diffForHumans() }} --}}

                                           {{ date('d M Y', strtotime($single->created_at)) }}

                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="icon radius100"><i class="fa-regular fa-clock"></i></span>
                                        <span class="date-pub">

                                            {{-- {{ $single->published_at->locale('PT')->diffForHumans() }} --}}

                                           {{ date('d M Y H:s', strtotime($single->updated_at)) }}

                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon radius100"><i class="fa-regular fa-user"></i></span> Administração Municipal de Ambaca
                                    </div>
                                </div>
                            </div>


                        </div>

                    </header>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="single-post-body">

                        <!--- Single Post header-->
                        <div class="single-post-content radius10">
                            <div class="lead">
                                <!-- Lead Content -->
                                {!! $single->head_line !!}
                            </div>
                            <figure>
                                <!-- Single post image -->
                                <img src="{{ url("storage/{$single->thumb}") }}" alt="{{ $single->title }}">
                                @if($single->thumb_legend)
                                <figcaption>{{ $single->thumb_legend }}</figcaption>
                                @endif
                            </figure>
                            <div class="main-content">
                                <!-- The main content -->

                                <div class="header-content">
                                    {!! $single->content !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="single-post-sidebar single-project-sidebar">

                        @include('page-sections.project-sidebar')

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
