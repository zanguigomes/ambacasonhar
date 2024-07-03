@extends('layouts.master')
@section('title', 'Projectos e Acções')
@section('content')

<!-- Single Page Block -->
<section class="single-post">

    <!--- Single Post header-->
    <header class="single-post-header blog-header container" >
      <div class="row">
        <div class="col-12">
          <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Início</a></li>
              <li class="breadcrumb-item" aria-current="page">Projectos e Acções</li>
            </ol>
          </nav>
          <div class="row">
            <div class="col-12 col-md-6">
              <h1>Projectos e Acções</h1>
            </div>
            <div class="col-12 col-md-4">
              <!-- Posts Search Form
              <form class="posts-search-box" method="GET" action="search.html">
                <div class="input-group ">
                  <input type="search" class="form-control radius30" placeholder="Procurar" name="s_posts" />
                  <span><i class="bi bi-search"></i></span>
                </div>
              </form>-->
            </div>
            <div class="col-12 col-md-2">

              <!-- Categories Filter

                <div class="categories-filter text-center site-navbar radius30">

                  <nav class="site-navigation  ml-auto text-uppercase" role="navigation">
                    <ul class="site-menu">
                      <li class="has-children">
                        <a href="#" class="header-link">Categorias</a>
                        <ul class="dropdown arrow-top radius10">

                        </ul>
                      </li>
                    </ul>
                  </nav>

                </div>-->

            </div>
          </div>

        </div>
      </div>
      <hr >
    </header>
    <!-- Separador -->
    <div class="block-divider text-uppercase">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-12">
            <h5>Destaque</h5>
          </div>
        </div>
      </div>
    </div>
    <!-- News Block 1 -->
    <section class="block-posts">
      <div class="container" data-aos="fade-up">
        <div class="row">


            @foreach ($projHeadings as $heading)
            <div class="col-12 col-md-6">

                        <a href="{{ route('site.pages.project', $heading->slug) }}" class="link-access">
                            <figure class="lead"><div class="cover-radius"></div>
                                <img src="{{ url("storage/{$heading->thumb}") }}" class="radius5"
                                    alt="{{ $heading->title }}">
                                <figcaption>
                                    <h2>{{ $heading->title }}</h2>
                                    {!! \Illuminate\Support\Str::limit($heading->head_line, 130, $end = '...') !!}
                                </figcaption>
                            </figure>
                        </a>

                  </div>
            @endforeach

        </div>
      </div>
    </section>

    <section class="block-posts home-block-posts">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12">
                  <h2><strong>Últimas notícias</strong></h2>
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
