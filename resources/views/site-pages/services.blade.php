@extends('layouts.master')
@section('title', 'Serviços')
@section('content')

    <!-- Single Post Block -->
    <section class="single-post" data-aos="fade-up">
        <header class="single-post-header container">
            <div class="row">
                <div class="col-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Início</a></li>
                        <li class="breadcrumb-item " aria-current="page">Serviços</li>
                    </ol>
                </nav>
                <h1>Serviços</h1>
                <hr><br>
                </div>
            </div>

        </header>

        <div class="container">
            <div class="row ">

            <div class="col-12 col-md-8 ">
                @foreach ($services as $item)
                    <div class="search-result-list">
                        <div class="row">
                            <div class="col-3 col-md-1 text-center">
                                <span class="page-icon"> <i class="fa-solid fa-puzzle-piece"></i></span>
                            </div>
                            <div class="col-9 col-md-11">
                            <span class="page-type">{{ $item->type }}</span>

                                <h3><a href="{{ route('site.pages.service', $item->slug) }}">{{ $item->title }}</a></h3>

                                {!! \Illuminate\Support\Str::limit($item->head_line, 150, $end = '...') !!}
                                <hr class="row-divider">
                                <div class="manager-avatar">
                                    @if($item->avatar)<img src="{{ url("storage/{$item->avatar}") }}" class="radius100 float-start"
                                        alt="{{ $item->manager }}">@endif
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
                    {{ $services->onEachSide(1)->links('pagination::bootstrap-5') }}

                </div>
            </div>

            <!--Page sidebar -->
            <div class="col-12 col-md-4 ">
              <div class="single-post-sidebar">

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat id amet nostrum architecto reiciendis non quia adipisci facere ratione doloremque molestias, aut quasi numquam beatae dolores esse error saepe exercitationem?

              </div>
            </div>
          </div>

        </div>
      </section>

@endsection
