@extends('layouts.master')
@section('title', $page->title)
@section('content')

<!-- Single Post Block -->
<section class="single-post">

    <!--- Single Post header-->
    <header class="single-post-header container">
      <div class="row">
        <div class="col-12">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Início</a></li>
                <li class="breadcrumb-item"><a href="#">Publicações</a></li>
                <li class="breadcrumb-item " aria-current="page">Documentos</li>
                @foreach ($categories as $item)
                            @if ($item->id == $page->category)
                                <li class="breadcrumb-item">{{ $item->name }}</li>
                            @endif
                        @endforeach
                        <li class="breadcrumb-item">{{ $page->title }}</li>
            </ol>
        </nav>
        <h1>{{ $page->title }}</h1>
        </div>
      </div> 
      <hr>
    </header>

    <div class="container the-document">
      <div class="row ">       
        
        <div class="col-12 col-md-8 " style="padding-top: 30px; ">
            <div class="row">
          
                <div class="row">
                    <div class="col-12 col-md-3">
                        <label for="">Tipo</label>
                        <input type="text" value="{{ $page->type }}" disabled>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="">Número</label>
                        <input type="text" value="{{ $page->number }}" disabled>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="">Ano</label>
                        <input type="text" value="{{ date('Y', strtotime($page->date_pub)) }}" disabled>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="">Data publicação</label>
                        <input type="text" value="{{ date('d/m/Y', strtotime($page->date_pub)) }}" disabled>
                    </div>
                </div><br>
                <div class="row">

                    <div class="col-12 col-md-3">
                        <label for="">Esfera governamental</label>
                        <input type="text" value="{{ $page->section }}" disabled>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="">Série</label>
                        <input type="text" value="{{ $page->series }}" disabled>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="">Páginas</label>
                        <input type="text" value="{{ $page->pages }}" disabled>
                    </div>
                </div>
                <br><hr/>

                <div class="head_line">
                    <label for="">Ementa</label><br>
                    {!! $page->description !!}
                </div>
                <br><hr/>

                <p><strong>Texto integral</strong>: <a href="{{ env('APP_URL') }}/storage/docs/{{ $page->file }}" target="_blank">{{ $page->title }}</a></p>
            </div>
          
        </div>

        <!--Page sidebar -->
        <div class="col-12 col-md-4 ">
            <div class="single-post-sidebar">
              <!-- Page Info -->
              
              <header class="last-posts-list" style="margin-top: -20px">
                <h2>Outras Páginas</h2>
            </header>
  
              <ul>
                  
                        
              </ul>
            </div>
          </div>

        
      </div>
    </div>
  </section>



@endsection
