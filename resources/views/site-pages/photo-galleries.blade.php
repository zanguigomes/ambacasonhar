@extends('layouts.master')
@section('title', 'Banco de Imagens')
@section('content')

    <section class="galleries-list photo-galleries block-posts ">
        <header class="single-post-header container">
            <div class="row">
              <div class="col-12">
                  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                  aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Início</a></li>
                      <li class="breadcrumb-item " aria-current="page">Banco de Imagens</li>
                  </ol>
              </nav>
              <h1>Banco de Imagens</h1>
              </div>
            </div>
          </header>
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-12 col-md-6">
                    <a href="{{ route('site.gallery', $lastGalery->slug) }}" class="link-access">
                        <figure class="lead">
                            <div class="cover-radius"></div>
                            <img src="{{ url("storage/{$lastGalery->thumbnail}") }}" class="radius5"
                                alt="{{ $lastGalery->title }}">
                            <figcaption>
                                <p><span class="icon radius100"><i class="fa-regular fa-calendar"></i></span> {{ date('d M Y', strtotime($lastGalery->created_at)) }} &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                    <i class="fa-regular fa-images"></i> {{ count($lastGalery->images) }} fotos</p>
                                <h2>{{ $lastGalery->title }}</h2>
                            </figcaption>
                        </figure>
                    </a>
                </div>

                <div class="col-12 col-md-6">
                    <a href="{{ route('site.gallery', $afterLastGalery->slug) }}" class="link-access">
                        <figure class="lead">
                            <div class="cover-radius"></div>
                            <img src="{{ url("storage/{$afterLastGalery->thumbnail}") }}" class="radius5"
                                alt="{{ $afterLastGalery->title }}">
                            <figcaption>
                                <p><span class="icon radius100"><i class="fa-regular fa-calendar"></i></span> {{ date('d M Y', strtotime($afterLastGalery->created_at)) }} &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                    <i class="fa-regular fa-images"></i> {{ count($afterLastGalery->images) }} fotos</p>
                                <h2>{{ $afterLastGalery->title }}</h2>
                            </figcaption>
                        </figure>
                    </a>
                </div>

            </div>
            <div class="row">
                @foreach ($galleryList as $feat)
                <div class="col-12 col-md-6 col-lg-4" style="margin-bottom: 20px">
                    <a href="{{ route('site.gallery', $feat->slug) }}" class="link-news">
                        <div class="card">
                            <div class="img-box">
                                <img src="{{ url("storage/{$feat->thumbnail}") }}" class="radius5"
                                    alt="{{ $feat->title }}">
                            </div>
                            <div class="card-body">
                                <p><span class="icon radius100"><i class="fa-regular fa-calendar"></i></span> {{ date('d M Y', strtotime($feat->created_at)) }} &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                    <i class="fa-regular fa-images"></i> {{ count($feat->images) }} fotos</p>
                                <h2 class="card-text">{{ $feat->title }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection
