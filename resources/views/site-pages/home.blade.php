@extends('layouts.master')
@section('title', 'Portal do município de Ambaca')
@section('content')

    <!-- ======= hero Section ======= -->

    <section class="header-content block-posts">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">

                    <div class="main-entry radius20">

                        <!-- main entry -->
                        <a href="{{ route('site.pages.post', $mainHeading->slug) }}" class="link-access">
                            <figure class="lead">
                                <div class="main-entry-cover"></div>
                                <img src="{{ url("storage/{$mainHeading->thumb}") }}" alt="{{ $mainHeading->title }}">
                                <figcaption>
                                    <h1>{{ $mainHeading->title }}</h1>
                                    {!! \Illuminate\Support\Str::limit($mainHeading->head_line, 130, $end = '...') !!}
                                </figcaption>
                            </figure>
                        </a>

                        <!-- secondary entries -->
                        <div class="secondary-entries">
                            <div class="row">
                                {{-- @foreach ($secondaryEntries as $entry) --}}
                                <div class="col-12 col-md-6">
                                    <a href="{{ route('site.pages.post', $secondaryEntry->slug) }}" class="link-news">
                                        <div class="card">
                                            <div class="img-box">
                                                <img src="{{ url("storage/{$secondaryEntry->thumb}") }}" class="radius5"
                                                    alt="{{ $secondaryEntry->title }}">
                                            </div>
                                            <div class="card-body">
                                                <h2 class="card-text">{{ $secondaryEntry->title }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-12 col-md-6">
                                    <a href="{{ route('site.pages.post', $thirdEntry->slug) }}" class="link-news">
                                        <div class="card">
                                            <div class="img-box">
                                                <img src="{{ url("storage/{$thirdEntry->thumb}") }}" class="radius5"
                                                    alt="{{ $thirdEntry->title }}">
                                            </div>
                                            <div class="card-body">
                                                <h2 class="card-text">{{ $thirdEntry->title }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">

                    <div class="page-sections-box radius20">

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <a href="{{ route('site.pages.entities') }}">
                                    <div class="page-area-section">
                                        <div class="icon">
                                            <i class="fa-solid fa-landmark-dome"></i>
                                        </div>
                                        <h3>Secretarias e Instituições</h3>
                                    </div>
                                </a>
                            </div>

                            <div class="col-12 col-md-4">
                                <a href="{{ route('site.pages.services') }}">
                                    <div class="page-area-section">
                                        <div class="icon">
                                            <i class="fa-solid fa-swatchbook"></i>
                                        </div>
                                        <h3>Central de Serviços</h3>
                                    </div>
                                </a>
                            </div>

                            <div class="col-12 col-md-4">
                                <a href="{{ route('site.pages.blog') }}">
                                    <div class="page-area-section">
                                        <div class="icon">
                                            <i class="fa-regular fa-newspaper"></i>
                                        </div>
                                        <h3>Artigos de Notícias</h3>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="nav-tab-content quick-access radius20">

                            <ul class="nav nav-pills mb-3 radius30" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Munícipe</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Visitante</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Outras Informações</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab" tabindex="0">


                                    <div class="row">
                                        <!-- Administração Municipal -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.entity', 'administracao-municipal') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-building-columns"></i></div>
                                                    <h3>Administração Municipal</h3>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- Assistência Social -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.page', 'cartao-de-visitas') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-people-roof"></i></div>
                                                    <h3>Assistência Social</h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Serviços de Emergência -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.page', 'cartao-de-visitas') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-kit-medical"></i></div>
                                                    <h3>Serviços de Emergência</h3>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- Serviços Bancários -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.service', 'emissao-de-bilhete-de-identidade-1a-ou-2a-via') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-address-card"></i></div>
                                                    <h3>Cartório e Notariado</h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <!-- Serviços Bancários -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.entity', 'administracao-municipal') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-piggy-bank"></i></div>
                                                    <h3>Serviços Bancários</h3>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- Projectos -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.projects') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
                                                    <h3>Projectos e Acções</h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>


                                </div>
                                <!-- Tab Turistas -->
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab" tabindex="0">
                                    <div class="row">
                                        <!-- Potencialidades -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.page', 'potencialidades-turisticas') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-mountain-sun"></i></div>
                                                    <h3>Potencialidades</h3>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- Cartao Visitas -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.page', 'cartao-de-visitas') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-regular fa-images"></i></div>
                                                    <h3>Cartão de Visitas</h3>
                                                </div>
                                            </a>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <!-- Como Chegar-->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.page', 'como-chegar') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-car-side"></i></div>
                                                    <h3>Como Chegar?</h3>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- Rede Hoteleira -->
                                        <div class="col-12 col-md-6">
                                            <a href="#">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-house-user"></i></div>
                                                    <h3>Rede Hoteleira</h3>
                                                </div>
                                            </a>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <!-- Cartao Visitas -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.service', 'feira-municipal-de-camabatela') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-basket-shopping"></i></div>
                                                    <h3>Feiras e Compras</h3>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- Como Chegar -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.page', 'cultura-e-lazer') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-campground"></i></div>
                                                    <h3>Cultura e Lazer</h3>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- Rede Hoteleira
                                            <div class="col-12 col-md-6">
                                                <a href="">
                                                    <div class="access-box text-center radius10">
                                                        <div class="icon"><i class="fa-solid fa-hotel"></i></div>
                                                        <h3>Nossos Sabores</h3>
                                                    </div>
                                                </a>
                                            </div>-->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab" tabindex="0">
                                    <div class="row">
                                        <!-- Potencialidades -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.pages.page', 'potencialidades-turisticas') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-solid fa-mountain-sun"></i></div>
                                                    <h3>Documentos e Arquivos</h3>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- Cartao Visitas -->
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('site.galleries') }}">
                                                <div class="access-box text-center radius10">
                                                    <div class="icon"><i class="fa-regular fa-images"></i></div>
                                                    <h3>Banco de Imagens</h3>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- Nossa Terra nosso Sonho -->
    <section class="photo-gallery our-land" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4 intro">
                    <h2><span class="photo-gallery-name">Ambaca: </span><span
                            class="photo-gallery-slogan"><strong>nossa
                                Terra, nosso Sonho</strong></span></h2>
                    <p>Ambaca é um dos 5 municípios da província do Kwanza-Norte, situada no extremo norte da província,
                        fazendo
                        fronteira com as províncias do Bengo, Uíje e Malanje. Tem uma extensão de 3.080Km2 e contra com uma
                        população estimada em 82 mil habitantes.</p>
                    <a href="{{ route('site.pages.page', 'informacao-geral') }}"> <h5><strong>Ler conteúdo completo...</strong></h5></a>
                </div>
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="img-box">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($sliders as $item)
                                    <div class="carousel-item active">
                                        <div class="carousel-text">
                                            <h2>{{ $item->title }}</h2>
                                            {!! $item->description !!}
                                        </div>

                                        <img src="{{ url("storage/{$item->cover}") }}" class="d-block w-100" alt="{{ $item->title }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="quick-access our-land">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <!-- History -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('site.pages.page', 'historia-do-municipio') }}">
                        <div class="access-box container radius10">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon"><i class="fa-solid fa-landmark-dome"></i></div>
                                </div>
                                <div class="col-10">
                                    <span>História</span>
                                    <h3>O Município de Ambaca</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Sede Municipal -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('site.pages.page', 'vila-de-camabatela') }}">
                        <div class="access-box container radius10">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon"><i class="fa-solid fa-tree-city"></i></div>
                                </div>
                                <div class="col-10">
                                    <span>Administração</span>
                                    <h3>A Vila de Camabatela</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            {{-- </div>

            <div class="row" style="margin-top: 25px"> --}}

                <!-- Mercados e Feiras -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('site.pages.service', 'feira-municipal-de-camabatela') }}">
                        <div class="access-box container radius10">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon"><i class="fa-solid fa-basket-shopping"></i></div>
                                </div>
                                <div class="col-10">
                                    <span>Economia</span>
                                    <h3>Mercados e Feiras</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Governo -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('site.pages.page', 'cultura-e-lazer') }}">
                        <div class="access-box container radius10">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon"><i class="fa-solid fa-bell-concierge"></i></div>
                                </div>
                                <div class="col-10">
                                    <span>Gastronomia</span>
                                    <h3>Os Nosssos Sabores</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Sede Municipal -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('site.pages.page', 'cultura-e-lazer') }}">
                        <div class="access-box container radius10">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon"><i class="fa-solid fa-umbrella-beach"></i></div>
                                </div>
                                <div class="col-10">
                                    <span>Lazer</span>
                                    <h3>Parques e Bosques</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            {{-- </div>

            <div class="row" style="margin-top: 25px"> --}}

                <!-- Cartão de Visitas -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('site.pages.page', 'cartao-de-visitas') }}">
                        <div class="access-box container radius10">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon"><i class="fa-solid fa-church"></i></div>
                                </div>
                                <div class="col-10">
                                    <span>Cartão de Visitas</span>
                                    <h3>Igreja Matriz de Camabatela</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Governo -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('site.pages.managers-gallery') }}">
                        <div class="access-box container radius10">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon"><i class="fa-solid fa-users"></i></div>
                                </div>
                                <div class="col-10">
                                    <span>Governo</span>
                                    <h3>Galeria de Administradores</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Sede Municipal -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('site.pages.documents') }}">
                        <div class="access-box container radius10">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon"><i class="fa-regular fa-file-pdf"></i></div>
                                </div>
                                <div class="col-10">
                                    <span>Informação</span>
                                    <h3>Documentos e Arquivos</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Curiosidade -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('site.pages.page', 'curiosidades') }}">
                        <div class="access-box container radius10">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon"><i class="fa-regular fa-lightbulb"></i></div>
                                </div>
                                <div class="col-10">
                                    <span>Factos</span>
                                    <h3>Algumas Curiosidades</h3>
                                </div>
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
                    <h2>Outras Notícias</h2>
                </div>
                <div class="col-6 text-right">
                    <div class="link">
                        <a href="{{ route('site.pages.blog') }}" class="text-right">Ver + Notícias</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">

                    @if ($fourthEntry)
                        <a href="{{ route('site.pages.post', $fourthEntry->slug) }}" class="link-access">
                            <figure class="lead">
                                <div class="cover-radius"></div>
                                <img src="{{ url("storage/{$fourthEntry->thumb}") }}" class="radius5"
                                    alt="{{ $fourthEntry->title }}">
                                <figcaption>
                                    <h2>{{ $fourthEntry->title }}</h2>
                                    {!! \Illuminate\Support\Str::limit($fourthEntry->head_line, 130, $end = '...') !!}
                                </figcaption>
                            </figure>
                        </a>
                    @endif

                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="{{ route('site.pages.post', $fifthEntry->slug) }}" class="link-news">
                        <div class="card">
                            <div class="img-box">
                                <img src="{{ url("storage/{$fifthEntry->thumb}") }}" class="radius5"
                                    alt="{{ $fifthEntry->title }}">
                            </div>
                            <div class="card-body">
                                <h2 class="card-text">{{ $fifthEntry->title }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="{{ route('site.pages.post', $sixth->slug) }}" class="link-news">
                        <div class="card">
                            <div class="img-box">
                                <img src="{{ url("storage/{$sixth->thumb}") }}" class="radius5"
                                    alt="{{ $sixth->title }}">
                            </div>
                            <div class="card-body">
                                <h2 class="card-text">{{ $sixth->title }}</h2>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 blog-list">
                    @foreach ($blog as $list)
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
                    @endforeach
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="row projects" style="margin-top: 28px">
                        @foreach ($projects as $projecto)
                            <div class="col-12 col-md-6">
                                <a href="{{ route('site.pages.project', $projecto->slug) }}" class="link-access">
                                    <figure class="lead">
                                        <div class="cover-radius"></div>
                                        <img src="{{ url("storage/{$projecto->thumb}") }}" class="radius5"
                                            alt="{{ $projecto->title }}">
                                        <figcaption>
                                            <h2>{{ $projecto->title }}</h2>
                                            {{-- <p>{!! $projecto->head_line !!}</p> --}}
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- List files and documents to download -->
                    <br>

                    <div class="row home-documents-list">
                        <div class="col-md-6">
                            <h5><strong>Documentos e Arquivos</strong></h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="link">
                                <a href="{{ route('site.pages.documents') }}">+ Documentos</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    @foreach ($documents as $doc)
                        <div class="col-12 col-md-6 col-lg-6 quick-access">
                            <a href="{{ Storage::url($doc->file) }}" target="_black">
                                <div class="container quick-access-button document-file radius10">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="pdf-icon">
                                                <i class="fa-regular fa-file-pdf"></i>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <h3> {{ $doc->title }} </h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="doc-file-date radius30"><i class="bi bi-calendar-week"></i>
                                                {{ date('d/m/Y', strtotime($doc->date_pub)) }}</span><span
                                                class="doc-file-size radius30"><i
                                                    class="bi bi-file-earmark-arrow-down"></i>
                                                {{ $doc->size }}</span>
                                            <span class="doc-file-size radius30">{{ $doc->type }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= galleries-list Section ======= -->
    <section class="galleries-list block-posts ">
        <div class="container" data-aos="fade-up">

            <div class="row blog-link">
                <div class="col-6">
                    <h2>Banco de Imagens</h2>
                </div>
                <div class="col-6 text-right">
                    <div class="link">
                        <a href="{{ route('site.galleries') }}" class="text-right">Ver + Galerias</a>
                    </div>
                </div>
            </div>

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
                                {!! \Illuminate\Support\Str::limit($lastGalery->head_line, 130, $end = '...') !!}
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
                                {!! \Illuminate\Support\Str::limit($afterLastGalery->head_line, 130, $end = '...') !!}
                            </figcaption>
                        </figure>
                    </a>
                </div>

            </div>
            <div class="row">
                @foreach ($galleryList as $feat)
                    <div class="col-12 col-md-6 col-lg-4">
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
    </section><!-- End galleries-list Section -->

@endsection
