@extends('layouts.master')
@section('title', 'Órgãos e Entidades')
@section('content')

    <!-- Single Post Block -->
    <section class="single-post" data-aos="fade-up">

        <header class="single-post-header container" style="margin-bottom: 60px">
            <div class="row">
                <div class="col-12">

                    <div class="single-page-header radius20"><div class="single-page-header-overlay"></div>

                        <div class="nav-title">
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Início</a></li>
                                <li class="breadcrumb-item " aria-current="page">Órgãos e Entidades</li>
                            </ol>
                            </nav>
                            <h1>Órgãos e Entidades</h1>
                        </div>

                    </div>
                </div>
            </div>

        </header>

        <section class="quick-access our-land" style="padding-top: 0">
            <div class="container" data-aos="fade-up">
                <div class="row" data-masonry='{"percentPosition": true }'>

                    @foreach ($entities as $item)

                        <div class="col-12 col-md-12 col-lg-6 ">
                            <a href="{{ route('site.pages.entity', $item->slug) }}">
                                <div class="access-box container radius10 search-result-list">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon"><i class="fa-solid fa-building"></i></div>
                                        </div>
                                        <div class="col-10">

                                            <h3>{{ $item->title }}</h3>
                                            {!! \Illuminate\Support\Str::limit($item->head_line, 150, $end = '...') !!}
                                            <hr class="row-divider">
                                            <div class="manager-avatar">
                                                @if ($item->avatar)
                                                    <img src="{{ url("storage/{$item->avatar}") }}" class="radius100 float-start" alt="{{ $item->name }}">
                                                @else
                                                    <img src="{{ asset('theme/assets/images/face-temp.jpg') }}"
                                                        class="radius100 float-start" alt="Imagem padrão" title="{{ $item->name }}" >
                                                @endif

                                                @if($item->type == 'Administração')<span>Administrador</span>
                                                @elseif($item->type == 'Delegação')<span>Delegado</span>
                                                @elseif($item->type == 'Secretaria')<span>Secretário</span> @endif <br>
                                                    <strong>{{ $item->manager }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach´

                </div>
            </div>
        </section>

        {{-- <div class="container">
            <div class="row ">

            <div class="col-12 ">
                @foreach ($entities as $item)
                    <div class="search-result-list">
                        <div class="row">
                            <div class="col-3 col-md-1 text-center">
                                <span class="page-icon"> <i class="fa-solid fa-building"></i></span>
                            </div>
                            <div class="col-9 col-md-11">
                            <span class="page-type">{{ $item->type }}</span>
                                <h3><a href="{{ route('site.pages.entity', $item->slug) }}">{{ $item->title }}</a></h3>

                                {!! \Illuminate\Support\Str::limit($item->head_line, 150, $end = '...') !!}
                                <hr class="row-divider">
                                <div class="manager-avatar">
                                    @if ($item->avatar)
                                        <img src="{{ url("storage/{$item->avatar}") }}" class="radius100 float-start" alt="{{ $item->name }}">
                                    @else
                                        <img src="{{ asset('theme/assets/images/face-temp.jpg') }}"
                                            class="radius100 float-start" alt="Imagem padrão" title="{{ $item->name }}" >
                                    @endif

                                    @if($item->type == 'Administração')<span>Administrador</span>
                                    @elseif($item->type == 'Delegação')<span>Delegado</span>
                                    @elseif($item->type == 'Secretaria')<span>Secretário</span> @endif <br>
                                        <strong>{{ $item->manager }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="page-navigation">
                    <br><br>
                    {{ $entities->onEachSide(1)->links('pagination::bootstrap-5') }}

                </div>
            </div>
          </div>

        </div> --}}
      </section>

@endsection
