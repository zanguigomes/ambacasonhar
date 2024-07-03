@extends('layouts.master')
@section('title', $page->title)
@section('content')

    <!-- Single Post Block -->
    <section class="single-post" data-aos="fade-up">
        <header class="single-post-header container">
            <div class="row">
                <div class="col-12">

                    @if($page->type == 'Página')<div class="single-page-header radius20"><div class="single-page-header-overlay"></div>@endif

                        <div class="nav-title">
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Início</a></li>
                                @if($page->type == 'Notícia')<li class="breadcrumb-item"><a href="{{ route('site.pages.blog') }}">Notícias</a></li>@endif
                                <li class="breadcrumb-item " aria-current="page">{{ $page->title }}</li>
                            </ol>
                            </nav>
                            <h1>{{ $page->title }}</h1>
                        </div>

                        @if($page->type == 'Página')</div>@endif
                </div>
            </div>
            <!--IF PAGE IS A POST -->
            @if($page->type == 'Notícia')
                <div class="post-date-pub-category">
                    <div class="container">
                        <div class="row">

                            <div class="col-12">
                                <span class="icon radius100"><i class="fa-regular fa-calendar"></i></span>
                                <span class="date-pub">
                                {{-- {{ $single->published_at->locale('PT')->diffForHumans() }} --}}

                                {{ date('d M Y', strtotime($page->published_at)) }}
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="icon radius100"><i class="fa-regular fa-clock"></i></span>
                                <span class="date-pub">{{ date('d M Y H:s', strtotime($page->updated_at)) }}</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon radius100"><i class="fa-regular fa-user"></i></span> CDI Ambaca
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('site.pages.category', $page->category->slug) }}"><span
                                    class="badge post-category-badge text-uppercase radius30">
                                    {{ $page->category->title }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </header>

        <div class="container">
            <div class="row ">

            <div class="col-12 col-md-12 col-lg-8">
              <div class="single-post-body">
                <div class="single-post-content radius10">
                    <!--IF PAGE IS A POST -->
                    <div class="lead">
                        {!! $page->head_line !!}
                    </div>

                    @if($page->type == 'Notícia')
                        <figure>
                            <!-- Single post image -->
                            <img src="{{ url("storage/{$page->thumb}") }}" alt="{{ $page->title }}">
                            @if($page->thumb_legend)
                                <figcaption>{{ $page->thumb_legend }}</figcaption>
                            @endif
                        </figure>
                    @endif
                    <!-- END IF PAGE IS A POST -->
                    <div class="header-content">
                        {!! $page->content !!}

                         @if($page->type == 'Notícia')

                         <div class="post-tags">Tags:
                            <a href="#"><span class="badge badge-tag radius30">Primeira Tag</span></a>
                            <a href="#"><span class="badge badge-tag radius30">Segunda Tag</span></a>
                            <a href="#"><span class="badge badge-tag radius30">Terceira Tag</span></a>
                          </div>

                        @else
<br><hr>
                        <div class="post-tags"><i class="fa-solid fa-circle-exclamation"></i> Encontrou algum erro ou falha no texto?
                            <a href="{{ route('site.contact')}}"><span class="badge badge-tag radius30">Reporte: ajuda a enriquecer o conteúdo!</span></a>
                        </div>

                        @endif
                    </div>
                </div>
              </div>
            </div>

            <!--Page sidebar -->
            <div class="col-12 col-md-12 col-lg-4 ">
              <aside class="sticky-top">

                <div class="single-post-sidebar">


                @if($page->type == 'Página')

                    @if($page->key == 'politica-privacidade')
                        @include('page-sections.about-sidebar')
                    @else
                        @include('page-sections.page-sidebar')
                    @endif

                @elseif($page->type == 'Notícia')

                    @include('page-sections.post-sidebar')

                @endif


              </div>
            </aside>
            </div>
          </div>

        </div>
      </section>

      @if($page->type == 'Notícia')
        @include('page-sections.next-prev-posts')
      @endif

@endsection
