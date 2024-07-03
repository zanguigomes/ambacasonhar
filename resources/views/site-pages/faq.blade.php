@extends('layouts.master')
@section('title', 'Perguntas Frequentes')
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
                            <li class="breadcrumb-item" aria-current="page">Perguntas Frequentes</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-12">
                            <h1>Perguntas Frequentes</h1>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </header>
        <section class="quick-access our-land" style="padding-top: 0">
                <div class="container" data-aos="fade-up">
                    <div class="row" data-masonry='{"percentPosition": true }'>
                        @foreach ($faq as $item)
                        <div class="col-12 col-md-12 col-lg-6">
                            
                                <div class="access-box container radius10">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon"><i class="fa-regular fa-circle-question"></i></div>
                                        </div>
                                        <div class="col-10">                                            
                                            <h3>{{ $item->question }}</h3>
                                            {!! $item->answer !!}</span>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        @endforeach                        
                    </div>
                </div>
            </section>

    </section>
@endsection
