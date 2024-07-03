@extends('layouts.master')
@section('title', 'Administradores Municipais')
@section('content')

    <!-- Single Post Block -->
    <section class="single-post" data-aos="fade-up">
        <header class="single-post-header container">
            <div class="row">
                <div class="col-12">

                    <div class="single-page-header radius20"><div class="single-page-header-overlay"></div>

                        <div class="nav-title">
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Início</a></li>
                                <li class="breadcrumb-item " aria-current="page">Administradores Municipais</li>
                            </ol>
                            </nav>
                            <h1>Galeria dos Administradores Municipais</h1>
                        </div>
                </div>
            </div>

        </header>

        <div class="container">
            <div class="row ">

            <div class="col-12 col-md-12 col-lg-8">
              <div class="single-post-body">
                <div class="single-post-content radius10">
                    <!--IF PAGE IS A POST -->
                    <div class="lead">
                        <div class="current-manager row">
                            <div class="col-3">
                                    @if ($currentManager->avatar)
                                        <img src="{{ url("storage/{$currentManager->avatar}") }}" alt="{{ $currentManager->name }}" class="radius100">
                                    @else
                                        <img src="{{ asset('theme/assets/images/face-temp.jpg') }}"
                                    alt="Imagem padrão" title="{{ $currentManager->name }}" class="radius100">
                                    @endif
                                </div>
                                <div class="col-9">
                                    <h2>{{ $currentManager->name }}</h2>
                                    {!! $currentManager->description !!}
                                </div>

                        </div><br><hr>
                        <p>Lista de todos os Administradores que passaram pela gestão do município de Ambaca:</p>
                    </div>

                    <!-- END IF PAGE IS A POST -->
                    <div class="header-content">
                        <div class="managers-gallery-list row">
                            @foreach ($exManagers as $manager)

                                <div class="quick-access">

                                        <div class="container quick-access-button document-file radius10">
                                            <div class="row">
                                                <div class="col-2">
                                                    @if ($manager->avatar)
                                                        <img src="{{ url("storage/{$manager->avatar}") }}" alt="{{ $manager->name }}">
                                                    @else
                                                        <img src="{{ asset('theme/assets/images/face-temp.jpg') }}"
                                                    alt="Imagem padrão" title="{{ $manager->name }}" >
                                                    @endif
                                                </div>
                                                <div class="col-10">
                                                    <h3> {{ $manager->name }}</h3>
                                                    {!! $manager->description !!}
                                                </div>
                                            </div>
                                        </div>

                                </div>

                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-navigation">

                                    {{ $exManagers->onEachSide(1)->links('pagination::bootstrap-5') }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <!--Page sidebar -->
            <div class="col-12 col-md-12 col-lg-4 ">
              <aside class="sticky-top">

                <div class="single-post-sidebar">

                    @include('page-sections.page-sidebar')

              </div>
            </aside>
            </div>
          </div>

        </div>
      </section>

@endsection
